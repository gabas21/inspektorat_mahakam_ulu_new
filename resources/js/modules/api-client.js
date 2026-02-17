/**
 * API Client Module
 * Untuk fetch data dari CMS backend secara async (AJAX)
 * 
 * Digunakan untuk:
 * - Infinite scroll
 * - Live search
 * - Dynamic content loading
 * - Form submissions (Pengaduan, WBS)
 */

class ApiClient {
    constructor(baseUrl = '/api') {
        this.baseUrl = baseUrl;
        this.defaultHeaders = {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        };
    }

    /**
     * GET request
     */
    async get(endpoint, params = {}) {
        const url = new URL(this.baseUrl + endpoint, window.location.origin);
        Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

        return this.request(url, {
            method: 'GET'
        });
    }

    /**
     * POST request
     */
    async post(endpoint, data = {}) {
        return this.request(this.baseUrl + endpoint, {
            method: 'POST',
            body: JSON.stringify(data)
        });
    }

    /**
     * POST with FormData (untuk file upload)
     */
    async postForm(endpoint, formData) {
        const headers = { ...this.defaultHeaders };
        delete headers['Content-Type']; // Let browser set multipart boundary

        return this.request(this.baseUrl + endpoint, {
            method: 'POST',
            headers,
            body: formData
        });
    }

    /**
     * Core request handler
     */
    async request(url, options = {}) {
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;

        const config = {
            ...options,
            headers: {
                ...this.defaultHeaders,
                ...options.headers,
                ...(csrfToken ? { 'X-CSRF-TOKEN': csrfToken } : {})
            }
        };

        try {
            const response = await fetch(url, config);

            if (!response.ok) {
                throw new ApiError(
                    `Request failed with status ${response.status}`,
                    response.status,
                    await response.json().catch(() => ({}))
                );
            }

            return await response.json();
        } catch (error) {
            if (error instanceof ApiError) {
                throw error;
            }
            throw new ApiError('Network error occurred', 0, { originalError: error.message });
        }
    }
}

/**
 * Custom API Error class
 */
class ApiError extends Error {
    constructor(message, status, data = {}) {
        super(message);
        this.name = 'ApiError';
        this.status = status;
        this.data = data;
    }
}

// ========================================
// Pre-built API Methods
// ========================================

const api = new ApiClient();

/**
 * News API
 */
const NewsApi = {
    getLatest: (limit = 10, page = 1) => api.get('/news', { limit, page }),
    getPopular: (limit = 5) => api.get('/news/popular', { limit }),
    getByCategory: (category, limit = 10) => api.get('/news', { category, limit }),
    getDetail: (slug) => api.get(`/news/${slug}`),
    search: (query) => api.get('/news/search', { q: query })
};

/**
 * Peraturan API
 */
const PeraturanApi = {
    getByType: (type, limit = 20, page = 1) => api.get('/peraturan', { type, limit, page }),
    getDetail: (id) => api.get(`/peraturan/${id}`),
    search: (query, type = null) => api.get('/peraturan/search', { q: query, type }),
    recordDownload: (id) => api.post(`/peraturan/${id}/download`)
};

/**
 * Dokumen API
 */
const DokumenApi = {
    getByType: (type, limit = 20, page = 1) => api.get('/dokumen', { type, limit, page }),
    getDetail: (id) => api.get(`/dokumen/${id}`),
    recordDownload: (id) => api.post(`/dokumen/${id}/download`)
};

/**
 * Agenda API
 */
const AgendaApi = {
    getByMonth: (month, year) => api.get('/agenda', { month, year }),
    getUpcoming: (limit = 5) => api.get('/agenda/upcoming', { limit })
};

/**
 * Layanan API (Pengaduan & WBS)
 */
const LayananApi = {
    submitPengaduan: (data) => api.post('/layanan/pengaduan', data),
    submitWbs: (data) => api.post('/layanan/wbs', data),
    cekPengaduan: (kode) => api.get(`/layanan/pengaduan/${kode}`),
    cekWbs: (kode) => api.get(`/layanan/wbs/${kode}`)
};

/**
 * PPID API
 */
const PpidApi = {
    getInformasi: (type, limit = 20) => api.get(`/ppid/informasi/${type}`, { limit }),
    submitPermohonan: (data) => api.post('/ppid/permohonan', data),
    cekPermohonan: (nomor) => api.get(`/ppid/permohonan/${nomor}`)
};

// ========================================
// Helper Functions
// ========================================

/**
 * Show skeleton loading state
 */
function showSkeleton(containerId, type = 'card', count = 3) {
    const container = document.getElementById(containerId);
    if (!container) return;

    container.innerHTML = '';
    container.classList.add('loading');

    // Generate skeleton HTML based on type (simplified)
    for (let i = 0; i < count; i++) {
        const skeleton = document.createElement('div');
        skeleton.className = 'animate-pulse bg-slate-100 rounded-2xl h-48';
        container.appendChild(skeleton);
    }
}

/**
 * Show error state
 */
function showError(containerId, message = 'Terjadi kesalahan saat memuat data') {
    const container = document.getElementById(containerId);
    if (!container) return;

    container.innerHTML = `
        <div class="flex flex-col items-center justify-center py-12 text-center">
            <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mb-4">
                <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>
            <p class="text-sm text-slate-500">${message}</p>
            <button onclick="window.location.reload()" class="mt-4 text-emerald-600 text-sm font-bold">Coba Lagi</button>
        </div>
    `;
}

/**
 * Show empty state
 */
function showEmpty(containerId, message = 'Data tidak ditemukan') {
    const container = document.getElementById(containerId);
    if (!container) return;

    container.innerHTML = `
        <div class="flex flex-col items-center justify-center py-12 text-center">
            <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mb-4">
                <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
            <p class="text-sm text-slate-500">${message}</p>
        </div>
    `;
}

// Export for use in other modules
export {
    ApiClient,
    ApiError,
    api,
    NewsApi,
    PeraturanApi,
    DokumenApi,
    AgendaApi,
    LayananApi,
    PpidApi,
    showSkeleton,
    showError,
    showEmpty
};
