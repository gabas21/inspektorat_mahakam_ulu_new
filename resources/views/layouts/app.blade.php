<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Inspektorat Mahakam Ulu')</title>
    
    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/spa-init.js'])
    @livewireStyles
    @stack('styles')
</head>
<body class="bg-white flex flex-col min-h-screen font-inter antialiased selection:bg-emerald-500 selection:text-white">
    
    {{-- Header Component --}}
    @include('components.header')

    {{-- Area Konten Dinamis --}}
    <main class="flex-grow">
        @yield('content')
    </main>

    {{-- Footer Component --}}
    @include('components.footer')
    @include('components.floating-navbar')
    @include('components.pdf-modal')
    
    <script src="{{ asset('js/reveal.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    @stack('scripts')
    
    {{-- UserWay Accessibility Widget --}}
    <script src="https://cdn.userway.org/widget.js" data-account="YOUR_ACCOUNT_ID" async></script>
    <style>
        /* Adjust UserWay widget position and make it draggable */
        .userway_buttons_wrapper {
            bottom: 100px !important;
            cursor: grab !important;
            transition: none !important;
        }
        .userway_buttons_wrapper:active {
            cursor: grabbing !important;
        }
        @media (max-width: 768px) {
            .userway_buttons_wrapper {
                bottom: 70px !important;
                right: 10px !important;
            }
        }
    </style>
    <script>
        // Make UserWay widget draggable
        function makeUserWayDraggable() {
            // Try multiple possible selectors
            const selectors = [
                '.userway_buttons_wrapper',
                '#userwayAccessibilityWidget',
                '[data-uw-container]',
                '.userway',
                'div[class*="userway"]'
            ];
            
            let widget = null;
            for (const sel of selectors) {
                widget = document.querySelector(sel);
                if (widget) break;
            }
            
            if (!widget) {
                // Widget not loaded yet, retry (max 20 attempts = 10 seconds)
                if (makeUserWayDraggable.attempts === undefined) makeUserWayDraggable.attempts = 0;
                makeUserWayDraggable.attempts++;
                if (makeUserWayDraggable.attempts < 20) {
                    setTimeout(makeUserWayDraggable, 500);
                }
                return;
            }
            
            console.log('UserWay widget found:', widget);
            
            // Force fixed positioning and initial position
            widget.style.position = 'fixed';
            widget.style.zIndex = '999999';
            
            let isDragging = false;
            let offsetX, offsetY;
            
            // Mouse events
            widget.addEventListener('mousedown', function(e) {
                isDragging = true;
                offsetX = e.clientX - widget.getBoundingClientRect().left;
                offsetY = e.clientY - widget.getBoundingClientRect().top;
                widget.style.cursor = 'grabbing';
                widget.style.transition = 'none';
                e.preventDefault();
            });
            
            // Touch events
            widget.addEventListener('touchstart', function(e) {
                isDragging = true;
                const touch = e.touches[0];
                offsetX = touch.clientX - widget.getBoundingClientRect().left;
                offsetY = touch.clientY - widget.getBoundingClientRect().top;
                widget.style.transition = 'none';
            }, { passive: true });
            
            document.addEventListener('mousemove', function(e) {
                if (!isDragging) return;
                
                const x = e.clientX - offsetX;
                const y = e.clientY - offsetY;
                
                // Keep within viewport
                const maxX = window.innerWidth - widget.offsetWidth;
                const maxY = window.innerHeight - widget.offsetHeight;
                
                widget.style.left = Math.max(0, Math.min(x, maxX)) + 'px';
                widget.style.top = Math.max(0, Math.min(y, maxY)) + 'px';
                widget.style.right = 'auto';
                widget.style.bottom = 'auto';
            });
            
            document.addEventListener('touchmove', function(e) {
                if (!isDragging) return;
                
                const touch = e.touches[0];
                const x = touch.clientX - offsetX;
                const y = touch.clientY - offsetY;
                
                const maxX = window.innerWidth - widget.offsetWidth;
                const maxY = window.innerHeight - widget.offsetHeight;
                
                widget.style.left = Math.max(0, Math.min(x, maxX)) + 'px';
                widget.style.top = Math.max(0, Math.min(y, maxY)) + 'px';
                widget.style.right = 'auto';
                widget.style.bottom = 'auto';
            }, { passive: true });
            
            document.addEventListener('mouseup', function() {
                if (isDragging) {
                    isDragging = false;
                    widget.style.cursor = 'grab';
                }
            });
            
            document.addEventListener('touchend', function() {
                isDragging = false;
            });
            
            // Set initial cursor
            widget.style.cursor = 'grab';
        }
        
        // Start after page fully loaded
        if (document.readyState === 'complete') {
            setTimeout(makeUserWayDraggable, 1500);
        } else {
            window.addEventListener('load', () => setTimeout(makeUserWayDraggable, 1500));
        }
    </script>
    @livewireScripts
</body>
</html>