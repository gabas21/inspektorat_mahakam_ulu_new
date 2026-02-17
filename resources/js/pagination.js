document.addEventListener('DOMContentLoaded', function () {
    // Function to initialize pagination listeners
    function initPagination() {
        // Target pagination links within the table container including custom pagination class
        const paginationLinks = document.querySelectorAll('#table-container .pagination a, #table-container nav a, #table-container .pagination-container a');


        paginationLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();

                const url = this.getAttribute('href');
                if (!url || url === '#') return;

                // Show loading state (optional, can be improved)
                const tableContainer = document.getElementById('table-container');
                tableContainer.style.opacity = '0.5';

                fetch(url, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                    .then(response => response.text())
                    .then(html => {
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(html, 'text/html');
                        const newTableContainer = doc.getElementById('table-container');

                        if (newTableContainer && tableContainer) {
                            tableContainer.innerHTML = newTableContainer.innerHTML;

                            // Update URL without reloading
                            window.history.pushState({}, '', url);

                            // Re-initialize any plugins or events if necessary
                            // Re-attach pagination listeners to the new links
                            initPagination();

                            // Re-initialize sorting state for the new page
                            if (window.initSorting) {
                                window.initSorting();
                            }

                            // Restore opacity
                            tableContainer.style.opacity = '1';

                            // Scroll to top of table if needed
                            tableContainer.scrollIntoView({ behavior: 'smooth' });
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching pagination:', error);
                        tableContainer.style.opacity = '1';
                        window.location.href = url; // Fallback to normal navigation
                    });
            });
        });
    }

    // Initial call
    initPagination();
});
