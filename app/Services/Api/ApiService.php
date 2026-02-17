<?php

namespace App\Services\Api;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Client\RequestException;

/**
 * Base API Service untuk komunikasi dengan CMS Backend
 * 
 * Semua domain-specific services (News, Peraturan, dll) 
 * harus extend class ini.
 */
class ApiService
{
    protected string $baseUrl;
    protected string $apiKey;
    protected int $timeout;
    protected int $cacheTtl;

    public function __construct()
    {
        $this->baseUrl = config('services.cms.base_url', 'http://localhost:8000/api');
        $this->apiKey = config('services.cms.api_key', '');
        $this->timeout = config('services.cms.timeout', 10);
        $this->cacheTtl = config('services.cms.cache_ttl', 300); // 5 menit default
    }

    /**
     * GET request ke API dengan caching
     */
    protected function get(string $endpoint, array $params = [], ?int $cacheTtl = null): array
    {
        $ttl = $cacheTtl ?? $this->cacheTtl;
        $cacheKey = $this->getCacheKey($endpoint, $params);

        return Cache::remember($cacheKey, $ttl, function () use ($endpoint, $params) {
            return $this->request('GET', $endpoint, $params);
        });
    }

    /**
     * POST request ke API (tidak di-cache)
     */
    protected function post(string $endpoint, array $data = []): array
    {
        return $this->request('POST', $endpoint, $data);
    }

    /**
     * PUT request ke API
     */
    protected function put(string $endpoint, array $data = []): array
    {
        return $this->request('PUT', $endpoint, $data);
    }

    /**
     * DELETE request ke API
     */
    protected function delete(string $endpoint): array
    {
        return $this->request('DELETE', $endpoint);
    }

    /**
     * Core HTTP request handler
     */
    protected function request(string $method, string $endpoint, array $data = []): array
    {
        try {
            $client = Http::timeout($this->timeout)
                ->retry(2, 100)
                ->withHeaders($this->getHeaders());

            $url = $this->baseUrl . $endpoint;

            $response = match (strtoupper($method)) {
                'GET' => $client->get($url, $data),
                'POST' => $client->post($url, $data),
                'PUT' => $client->put($url, $data),
                'DELETE' => $client->delete($url),
                default => throw new \InvalidArgumentException("Unsupported HTTP method: {$method}")
            };

            if ($response->failed()) {
                $this->handleError($response, $endpoint);
            }

            return $response->json() ?? [];

        } catch (RequestException $e) {
            Log::error("API Request Failed: {$endpoint}", [
                'method' => $method,
                'error' => $e->getMessage()
            ]);
            
            throw $e;
        }
    }

    /**
     * Headers default untuk setiap request
     */
    protected function getHeaders(): array
    {
        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        if (!empty($this->apiKey)) {
            $headers['Authorization'] = 'Bearer ' . $this->apiKey;
        }

        return $headers;
    }

    /**
     * Generate cache key unik
     */
    protected function getCacheKey(string $endpoint, array $params = []): string
    {
        return 'cms_api_' . md5($endpoint . json_encode($params));
    }

    /**
     * Clear cache untuk endpoint tertentu
     */
    public function clearCache(string $endpoint, array $params = []): void
    {
        $cacheKey = $this->getCacheKey($endpoint, $params);
        Cache::forget($cacheKey);
    }

    /**
     * Handle API error responses
     */
    protected function handleError($response, string $endpoint): void
    {
        $status = $response->status();
        $body = $response->body();

        Log::error("CMS API Error", [
            'endpoint' => $endpoint,
            'status' => $status,
            'body' => $body
        ]);

        match ($status) {
            401 => throw new \Exception('Unauthorized: Invalid API credentials'),
            403 => throw new \Exception('Forbidden: Access denied'),
            404 => throw new \Exception("Not Found: Endpoint {$endpoint} does not exist"),
            422 => throw new \Exception('Validation Error: ' . $body),
            500 => throw new \Exception('Server Error: CMS backend is experiencing issues'),
            default => throw new \Exception("API Error ({$status}): {$body}")
        };
    }

    /**
     * Mendapatkan data dengan fallback jika API gagal
     */
    protected function getWithFallback(string $endpoint, array $params = [], array $fallback = []): array
    {
        try {
            return $this->get($endpoint, $params);
        } catch (\Exception $e) {
            Log::warning("API fallback used for: {$endpoint}", ['error' => $e->getMessage()]);
            return $fallback;
        }
    }
}
