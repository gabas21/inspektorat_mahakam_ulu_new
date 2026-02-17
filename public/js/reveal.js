/**
 * Reveal Animation Observer
 * Adds 'active' class to elements with '.reveal' when they enter the viewport.
 * Supports staggered animations via data-stagger attribute on parent.
 */
(function () {
    'use strict';

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                // Check if parent has stagger delay
                const stagger = entry.target.closest('[data-stagger]');
                if (stagger) {
                    const delay = parseInt(stagger.dataset.stagger) || 150;
                    setTimeout(() => entry.target.classList.add('active'), index * delay);
                } else {
                    entry.target.classList.add('active');
                }
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
})();
