document.addEventListener('alpine:init', () => {
    Alpine.data('paginatedTable', (items) => ({
        search: '',
        currentPage: 1,
        itemsPerPage: 10,
        sourceItems: items,

        get filteredItems() {
            if (this.search === '') return this.sourceItems;
            return this.sourceItems.filter(item => {
                return item.name.toLowerCase().includes(this.search.toLowerCase());
            });
        },

        get totalPages() {
            return Math.ceil(this.filteredItems.length / this.itemsPerPage);
        },

        get paginatedItems() {
            const start = (this.currentPage - 1) * this.itemsPerPage;
            const end = start + this.itemsPerPage;
            return this.filteredItems.slice(start, end);
        },

        nextPage() {
            if (this.currentPage < this.totalPages) {
                this.currentPage++;
            }
        },

        prevPage() {
            if (this.currentPage > 1) {
                this.currentPage--;
            }
        },

        // Modal helper (if needed globally or passed in)
        openPdfModal(url) {
            // Check if global modal function exists (from previous implementation)
            if (window.openPdfModal) {
                window.openPdfModal(url);
            } else {
                // Fallback or explicit implementation if the global one isn't available
                // Assuming the user has a separate logic for this, or we rely on the blade's logic
                // But wait, the blade called `openPdfModal` directly. 
                // If that was a global function, it's fine. 
                // If it was inside this component, it needs to be here.
                // Looking at the view, `openPdfModal` was called in `@click="openPdfModal..."`
                // It was NOT defined in the inline `paginatedTable` component in previous view_file output.
                // So it must be global. We don't need to define it here.
            }
        }
    }));
});
