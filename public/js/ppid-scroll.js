/**
 * PPID Accordion Scroll Helper
 * Used by 4 PPID pages (berkala, serta-merta, setiap-saat, dikecualikan)
 * Smoothly scrolls to accordion items after opening, accounting for fixed header.
 */
(function () {
    'use strict';

    window.scrollToItem = function (element) {
        const offset = 80;
        const container = document.getElementById('main-content-section');

        const bodyRect = document.body.getBoundingClientRect().top;
        const elementRect = element.getBoundingClientRect().top;
        const elementPosition = elementRect - bodyRect;
        const offsetPosition = elementPosition - offset;

        const windowHeight = window.innerHeight;
        const docHeight = document.documentElement.scrollHeight;
        const maxScroll = docHeight - windowHeight;

        const deficit = offsetPosition - maxScroll;

        if (deficit > 0) {
            const currentPadding = parseFloat(window.getComputedStyle(container).paddingBottom || 0);
            container.style.paddingBottom = (currentPadding + deficit + 50) + 'px';
        }

        window.scrollTo({
            top: offsetPosition,
            behavior: 'smooth'
        });
    };
})();
