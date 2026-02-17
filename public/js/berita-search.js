/**
 * Berita Search + Pagination + Category Filtering
 * Used by berita.blade.php
 * Expects: #searchInput, #clearSearch, #newsContainer, .news-card,
 *          #categorySuggestions, #noResults, #pagination, #pageInfo,
 *          #pageNumbers, #prevBtn, #nextBtn, #showingFrom, #showingTo, #totalItems
 */
(function () {
    'use strict';

    const searchInput = document.getElementById('searchInput');
    const clearSearchBtn = document.getElementById('clearSearch');
    const newsContainer = document.getElementById('newsContainer');
    const categorySuggestions = document.getElementById('categorySuggestions');
    const noResults = document.getElementById('noResults');
    const pagination = document.getElementById('pagination');
    const pageInfo = document.getElementById('pageInfo');
    const pageNumbersContainer = document.getElementById('pageNumbers');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

    if (!searchInput || !newsContainer) return;

    const allCards = Array.from(newsContainer.querySelectorAll('.news-card'));

    // Config
    const ITEMS_PER_PAGE = 6;
    let currentPage = 1;
    let filteredCards = [...allCards];

    // Initialize
    updatePaginationInfo();
    showPage(1);

    // Show suggestions on focus
    searchInput.addEventListener('focus', () => {
        if (categorySuggestions) categorySuggestions.classList.remove('hidden');
    });

    // Hide suggestions on click outside
    document.addEventListener('click', (e) => {
        if (categorySuggestions && !searchInput.contains(e.target) && !categorySuggestions.contains(e.target)) {
            categorySuggestions.classList.add('hidden');
        }
    });

    // Select category function
    window.selectCategory = function (category) {
        searchInput.value = category;
        if (categorySuggestions) categorySuggestions.classList.add('hidden');
        searchInput.dispatchEvent(new Event('input'));
    };

    function showPage(page) {
        currentPage = page;
        const start = (page - 1) * ITEMS_PER_PAGE;
        const end = start + ITEMS_PER_PAGE;

        // Hide all cards first
        allCards.forEach(card => card.classList.add('hidden'));

        // Show only cards for current page from filtered list
        filteredCards.forEach((card, index) => {
            if (index >= start && index < end) {
                card.classList.remove('hidden');
            }
        });

        updatePaginationInfo();

        // Scroll to top of news list if not first load
        if (newsContainer.getBoundingClientRect().top < 0) {
            newsContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }

    function updatePaginationInfo() {
        const totalItems = filteredCards.length;
        const totalPages = Math.ceil(totalItems / ITEMS_PER_PAGE);

        if (totalItems > ITEMS_PER_PAGE) {
            pagination.classList.remove('hidden');
            pagination.classList.add('flex');
            pageInfo.classList.remove('hidden');
        } else {
            pagination.classList.add('hidden');
            pagination.classList.remove('flex');
            pageInfo.classList.add('hidden');
        }

        if (totalItems === 0) {
            noResults.classList.remove('hidden');
            pageInfo.classList.add('hidden');
        } else {
            noResults.classList.add('hidden');
        }

        // Update info text
        const start = (currentPage - 1) * ITEMS_PER_PAGE + 1;
        const end = Math.min(currentPage * ITEMS_PER_PAGE, totalItems);

        document.getElementById('showingFrom').textContent = totalItems > 0 ? start : 0;
        document.getElementById('showingTo').textContent = end;
        document.getElementById('totalItems').textContent = totalItems;

        // Update buttons state
        prevBtn.disabled = currentPage === 1;
        nextBtn.disabled = currentPage === totalPages || totalPages === 0;

        // Generate page numbers
        pageNumbersContainer.innerHTML = '';

        let startPage = Math.max(1, currentPage - 2);
        let endPage = Math.min(totalPages, startPage + 4);

        if (endPage - startPage < 4) {
            startPage = Math.max(1, endPage - 4);
        }

        for (let i = startPage; i <= endPage; i++) {
            const btn = document.createElement('button');
            const isActive = i === currentPage;

            btn.className = `w-10 h-10 rounded-xl font-bold text-sm transition-all flex items-center justify-center ${isActive
                    ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-500/30'
                    : 'bg-white border border-gray-200 text-gray-600 hover:bg-emerald-50 hover:border-emerald-300 hover:text-emerald-600'
                }`;

            btn.textContent = i;
            btn.onclick = () => showPage(i);
            pageNumbersContainer.appendChild(btn);
        }
    }

    // Export function for HTML buttons
    window.changePage = function (direction) {
        const totalPages = Math.ceil(filteredCards.length / ITEMS_PER_PAGE);
        if (direction === 'prev' && currentPage > 1) {
            showPage(currentPage - 1);
        } else if (direction === 'next' && currentPage < totalPages) {
            showPage(currentPage + 1);
        }
    };

    searchInput.addEventListener('input', function () {
        const query = this.value.toLowerCase().trim();

        // Toggle clear button
        if (query.length > 0) {
            clearSearchBtn.classList.remove('hidden');
            clearSearchBtn.classList.add('flex');
        } else {
            clearSearchBtn.classList.add('hidden');
            clearSearchBtn.classList.remove('flex');
        }

        // Filter cards
        filteredCards = allCards.filter(card => {
            const title = card.dataset.title || '';
            const category = card.dataset.category || '';
            return title.includes(query) || category.includes(query);
        });

        // Reset to page 1
        showPage(1);
    });

    clearSearchBtn.addEventListener('click', function () {
        searchInput.value = '';
        this.classList.add('hidden');
        this.classList.remove('flex');

        filteredCards = [...allCards];
        showPage(1);

        searchInput.focus();
    });
})();
