<!-- PDF Preview Modal -->
<div id="pdfModal" class="fixed inset-0 z-[100] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <!-- Backdrop -->
    <div class="fixed inset-0 bg-slate-900/90 backdrop-blur-sm transition-opacity opacity-0" id="pdfModalBackdrop"></div>

    <!-- Modal Container -->
    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
            <!-- Modal Panel -->
            <div class="relative transform overflow-hidden rounded-xl md:rounded-[2rem] bg-white text-left shadow-2xl transition-all sm:my-8 w-full max-w-6xl h-[95vh] md:h-[85vh] opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" id="pdfModalPanel">
                
                <!-- Header -->
                <div class="absolute top-0 left-0 right-0 z-20 flex items-center justify-between px-4 md:px-6 py-3 md:py-4 bg-white border-b border-slate-100">
                    <h3 class="text-xs md:text-sm font-black text-slate-800 uppercase tracking-wider md:tracking-widest flex items-center gap-2">
                        <svg class="w-4 h-4 md:w-5 md:h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        <span class="hidden sm:inline">Pratinjau</span> Dokumen
                    </h3>
                    <button type="button" onclick="closePdfModal()" class="rounded-full p-2 bg-slate-50 text-slate-400 hover:bg-red-50 hover:text-red-500 transition-colors focus:outline-none">
                        <span class="sr-only">Close</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- PDF Viewer (Iframe) -->
                <div class="h-full pt-12 md:pt-16 pb-0 bg-slate-50">
                    <iframe id="pdfFrame" src="" class="w-full h-full border-0" allowfullscreen></iframe>
                    
                    <!-- Loading State (Hidden by default) -->
                    <div id="pdfLoading" class="absolute inset-0 flex flex-col items-center justify-center bg-white z-10 hidden">
                        <div class="w-16 h-16 border-4 border-emerald-100 border-t-emerald-500 rounded-full animate-spin mb-4"></div>
                        <p class="text-slate-500 text-sm font-bold uppercase tracking-wider">Memuat Dokumen...</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    const modal = document.getElementById('pdfModal');
    const backdrop = document.getElementById('pdfModalBackdrop');
    const panel = document.getElementById('pdfModalPanel');
    const pdfFrame = document.getElementById('pdfFrame');
    const pdfLoading = document.getElementById('pdfLoading');

    function openPdfModal(url) {
        console.log('Opening PDF Modal for:', url);
        if (!url || url === '#') {
            alert('File dokumen belum tersedia.');
            return;
        }

        pdfFrame.src = url;
        modal.classList.remove('hidden');
        
        // Show loading
        pdfLoading.classList.remove('hidden');
        pdfFrame.onload = function() {
            pdfLoading.classList.add('hidden');
        };

        // Animate In
        setTimeout(() => {
            backdrop.classList.remove('opacity-0');
            panel.classList.remove('opacity-0', 'translate-y-4', 'sm:translate-y-0', 'sm:scale-95');
            panel.classList.add('opacity-100', 'translate-y-0', 'sm:scale-100');
        }, 10);
    }

    function closePdfModal() {
        // Animate Out
        backdrop.classList.add('opacity-0');
        panel.classList.remove('opacity-100', 'translate-y-0', 'sm:scale-100');
        panel.classList.add('opacity-0', 'translate-y-4', 'sm:translate-y-0', 'sm:scale-95');

        setTimeout(() => {
            modal.classList.add('hidden');
            pdfFrame.src = ''; // Stop loading/playing
        }, 300);
    }

    // Close on backdrop click
    backdrop?.addEventListener('click', closePdfModal);

    // Close on Escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === "Escape" && !modal.classList.contains('hidden')) {
            closePdfModal();
        }
    });
</script>
