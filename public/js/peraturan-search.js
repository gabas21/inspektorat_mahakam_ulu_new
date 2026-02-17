/**
 * Peraturan Card Search + Pagination
 * Used by all 7 peraturan pages (undang-undang, peraturan-menteri, etc.)
 * Expects: #searchInput, #clearSearch, #documentContainer, .document-card,
 *          #noResults, #noData, #paginationContainer, #prevBtn, #nextBtn, #pageIndicator
 */
(function () {
    'use strict';

    const searchInput = document.getElementById('searchInput');
    const clearSearchBtn = document.getElementById('clearSearch');
    const documentContainer = document.getElementById('documentContainer');
    const noResults = document.getElementById('noResults');
    const noData = document.getElementById('noData');

    // Pagination Elements
    const paginationContainer = document.getElementById('paginationContainer');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const pageIndicator = document.getElementById('pageIndicator');

    if (!searchInput || !documentContainer) return;

    const allCards = Array.from(documentContainer.querySelectorAll('.document-card'));
    const ITEMS_PER_PAGE = 4;
    let currentPage = 1;
    let filteredCards = [...allCards];

    function updatePagination() {
        const totalPages = Math.ceil(filteredCards.length / ITEMS_PER_PAGE);

        if (totalPages <= 1) {
            paginationContainer.classList.add('hidden');
        } else {
            paginationContainer.classList.remove('hidden');
        }

        pageIndicator.textContent = `Halaman ${currentPage} dari ${totalPages > 0 ? totalPages : 1}`;
        prevBtn.disabled = currentPage === 1;
        nextBtn.disabled = currentPage === totalPages || totalPages === 0;
    }

    function renderItems() {
        // First hide all cards
        allCards.forEach(card => card.classList.add('hidden'));

        // Calculate start and end index for current page
        const startIndex = (currentPage - 1) * ITEMS_PER_PAGE;
        const endIndex = startIndex + ITEMS_PER_PAGE;
        const itemsToShow = filteredCards.slice(startIndex, endIndex);

        // Show items for current page
        itemsToShow.forEach(card => card.classList.remove('hidden'));

        // Handle No Results State
        if (filteredCards.length === 0 && searchInput.value.length > 0) {
            noResults.classList.remove('hidden');
            if (noData) noData.classList.add('hidden');
        } else {
            noResults.classList.add('hidden');
            if (filteredCards.length === 0 && searchInput.value.length === 0 && noData) {
                noData.classList.remove('hidden');
            } else if (noData) {
                noData.classList.add('hidden');
            }
        }

        updatePagination();
    }

    if (searchInput) {
        searchInput.addEventListener('input', function (e) {
            const query = e.target.value.toLowerCase();

            // Toggle clear button
            if (query.length > 0) {
                clearSearchBtn.classList.remove('hidden');
            } else {
                clearSearchBtn.classList.add('hidden');
            }

            // Filter logic
            filteredCards = allCards.filter(card => {
                const title = card.querySelector('.document-title').textContent.toLowerCase();
                const number = card.querySelector('.absolute.-top-3').textContent.toLowerCase();
                return title.includes(query) || number.includes(query);
            });

            // Reset to page 1 on search
            currentPage = 1;
            renderItems();
        });

        clearSearchBtn.addEventListener('click', function (e) {
            e.preventDefault();
            searchInput.value = '';
            searchInput.dispatchEvent(new Event('input'));
            searchInput.focus();
        });
    }

    // Pagination Listeners
    prevBtn.addEventListener('click', () => {
        if (currentPage > 1) {
            currentPage--;
            renderItems();
            const y = documentContainer.getBoundingClientRect().top + window.scrollY - 120;
            window.scrollTo({ top: y, behavior: 'smooth' });
        }
    });

    nextBtn.addEventListener('click', () => {
        const totalPages = Math.ceil(filteredCards.length / ITEMS_PER_PAGE);
        if (currentPage < totalPages) {
            currentPage++;
            renderItems();
            const y = documentContainer.getBoundingClientRect().top + window.scrollY - 120;
            window.scrollTo({ top: y, behavior: 'smooth' });
        }
    });

    // Initial Render
    renderItems();
})();
