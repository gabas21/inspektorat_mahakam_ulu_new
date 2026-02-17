/**
 * SPA Initialization Script
 * Handles re-initialization of UI components when navigating with Livewire
 */

document.addEventListener('livewire:navigated', () => {
    initSpaComponents();
});

// Initial run for first page load
document.addEventListener('DOMContentLoaded', () => {
    initSpaComponents();
});

function initSpaComponents() {
    console.log('SPA Init: Initializing Components...');

    // 1. Re-initialize Scroll Reveal
    if (typeof ScrollReveal !== 'undefined') {
        ScrollReveal().clean('section'); // Clean existing reveals

        // Re-apply reveal animations
        const revealElements = document.querySelectorAll('.reveal');
        if (revealElements.length > 0) {
            ScrollReveal().reveal('.reveal', {
                delay: 200,
                distance: '50px',
                duration: 1000,
                easing: 'cubic-bezier(0.5, 0, 0, 1)',
                interval: 100,
                origin: 'bottom',
                viewFactor: 0.1
            });
        }
    }

    // 2. Re-initialize Mobile Menu
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuBtn && mobileMenu) {
        // Remove old listeners to prevent duplicates
        const newBtn = mobileMenuBtn.cloneNode(true);
        mobileMenuBtn.parentNode.replaceChild(newBtn, mobileMenuBtn);

        newBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    }

    // 3. Initialize Landing Page Components (if present)
    initLandingComponents();

    // 4. Reset Scroll Position (optional, Livewire usually handles this)
    // window.scrollTo({ top: 0, behavior: 'instant' });
}

function initLandingComponents() {
    // Check if we are on the landing page by looking for a unique element
    // Swiper
    initLandingSwipers();

    // Calendar
    if (document.getElementById('calendarDays')) {
        initCalendar();
    }

    // News Carousel
    if (document.querySelector('.carousel-news')) {
        initNewsCarousel();
    }

    // Tab Indicator
    initNewsTabs();
}

// --- Swiper Logic ---
function initLandingSwipers() {
    if (typeof Swiper === 'undefined') return;

    // Banner Swiper
    const bannerSwiperEl = document.querySelector('.banner-swiper');
    if (bannerSwiperEl) {
        if (bannerSwiperEl.swiper) bannerSwiperEl.swiper.destroy(true, true);

        new Swiper(".banner-swiper", {
            slidesPerView: "auto",
            centeredSlides: true,
            spaceBetween: 16,
            autoHeight: true,
            loop: true,
            breakpoints: { 768: { spaceBetween: 30 } },
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    }

    // External Links Swiper
    const externalSwiperEl = document.querySelector('.external-links-swiper');
    if (externalSwiperEl) {
        if (externalSwiperEl.swiper) {
            externalSwiperEl.swiper.destroy(true, true);
            externalSwiperEl.swiper = null; // Ensure reference is cleared
        }

        const externalSwiper = new Swiper(".external-links-swiper", {
            slidesPerView: 1,
            spaceBetween: 16,
            loop: true,
            loopAdditionalSlides: 3,
            slidesPerGroup: 1,
            speed: 600,
            allowTouchMove: true,
            grabCursor: true,
            centeredSlides: false,
            breakpoints: {
                640: { slidesPerView: 2, spaceBetween: 20 },
                1024: { slidesPerView: 3, spaceBetween: 24 },
            },
        });

        window.scrollExternalLinks = function (direction) {
            if (direction === 1) externalSwiper.slideNext();
            else externalSwiper.slidePrev();
        };
    }
}

// --- Calendar Logic ---
let currentCalendarMonth, currentCalendarYear;
const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
const agendaEvents = {
    '2-2-2026': [{ title: 'Upacara Bendera Bulanan', time: '07:30 - 08:30', location: 'Halaman Kantor Inspektorat' }, { title: 'Rapat Pimpinan Mingguan', time: '09:00 - 11:00', location: 'Ruang Inspektur' }],
    '4-2-2026': [{ title: 'Rapat Koordinasi Internal Pagi', time: '08:00 - 09:30', location: 'Ruang Rapat Utama' }, { title: 'Review Laporan Keuangan Semester II', time: '10:00 - 12:00', location: 'Ruang Inspektur' }],
    '9-2-2026': [{ title: 'Audit Kinerja Dinas Kesehatan', time: '08:00 - 16:00', location: 'Dinas Kesehatan' }],
    '16-2-2026': [{ title: 'Upacara Bendera Mingguan', time: '07:30 - 08:00', location: 'Halaman Kantor Inspektorat' }],
    '23-2-2026': [{ title: 'Apel Pagi & Briefing Mingguan', time: '07:30 - 08:30', location: 'Halaman Kantor Inspektorat' }],
    // Add more mock data as needed from the original source if required, kept brief for this file
};

function initCalendar() {
    const currentDate = new Date();
    currentCalendarMonth = currentDate.getMonth();
    currentCalendarYear = currentDate.getFullYear();
    renderCalendar();

    // Global functions for buttons
    window.previousMonth = function () {
        currentCalendarMonth--;
        if (currentCalendarMonth < 0) {
            currentCalendarMonth = 11;
            currentCalendarYear--;
        }
        renderCalendar();
    };

    window.nextMonth = function () {
        currentCalendarMonth++;
        if (currentCalendarMonth > 11) {
            currentCalendarMonth = 0;
            currentCalendarYear++;
        }
        renderCalendar();
    };
}

function renderCalendar() {
    const calendarDays = document.getElementById('calendarDays');
    const calendarMonthYear = document.getElementById('calendarMonthYear');
    const eventDisplay = document.getElementById('eventDisplay');

    if (!calendarDays || !calendarMonthYear) return;

    calendarDays.innerHTML = '';
    const firstDay = new Date(currentCalendarYear, currentCalendarMonth, 1).getDay();
    const daysInMonth = new Date(currentCalendarYear, currentCalendarMonth + 1, 0).getDate();

    calendarMonthYear.textContent = `${monthNames[currentCalendarMonth]} ${currentCalendarYear}`;

    // Empty boxes
    for (let i = 0; i < firstDay; i++) {
        const emptyDiv = document.createElement('div');
        emptyDiv.className = "h-8";
        calendarDays.appendChild(emptyDiv);
    }

    // Days
    const today = new Date();
    for (let day = 1; day <= daysInMonth; day++) {
        const dayDiv = document.createElement('div');
        const dateKey = `${day}-${currentCalendarMonth + 1}-${currentCalendarYear}`;
        const hasEvent = agendaEvents[dateKey];
        const isToday = day === today.getDate() && currentCalendarMonth === today.getMonth() && currentCalendarYear === today.getFullYear();

        dayDiv.className = `relative h-7 md:h-8 flex items-center justify-center text-[10px] md:text-xs font-bold rounded-md md:rounded-lg cursor-pointer transition-all ${isToday ? 'bg-emerald-600 text-white shadow-lg' : 'text-slate-600 hover:bg-emerald-50 hover:text-emerald-700'
            } ${hasEvent ? 'ring-2 ring-emerald-100 ring-inset' : ''}`;

        dayDiv.innerHTML = `<span>${day}</span>`;

        if (hasEvent) {
            const badge = document.createElement('div');
            badge.className = "absolute -top-1.5 -right-1.5 bg-red-500 text-white text-[7px] font-black min-w-[14px] h-[14px] px-0.5 rounded-full flex items-center justify-center border border-white shadow-sm transition-transform group-hover:scale-110";
            badge.textContent = hasEvent.length > 9 ? '9+' : hasEvent.length;
            dayDiv.appendChild(badge);
        }

        // Use arrow function wrapper to preserve scope or just direct call if simpler
        dayDiv.onclick = () => showEvent(day, hasEvent);
        calendarDays.appendChild(dayDiv);
    }
}

function showEvent(day, events) {
    const eventDisplay = document.getElementById('eventDisplay');
    if (!eventDisplay) return;

    if (events) {
        eventDisplay.innerHTML = `
            <div class="text-left">
                <div class="flex items-center gap-3 mb-4">
                    <div class="bg-emerald-600 text-white rounded-xl w-10 h-10 flex items-center justify-center font-black text-sm">
                        ${day}
                    </div>
                    <div>
                        <div class="text-[10px] font-black text-emerald-800 uppercase tracking-widest">${monthNames[currentCalendarMonth]} ${currentCalendarYear}</div>
                        <div class="text-[9px] text-emerald-600/70 font-bold uppercase tracking-widest">${events.length} KEGIATAN</div>
                    </div>
                </div>
                <div class="space-y-3 max-h-[180px] overflow-y-auto pr-2 custom-scrollbar">
                    ${events.map(event => `
                        <div class="bg-white border border-emerald-100 p-3 rounded-xl shadow-sm hover:border-emerald-300 transition-colors">
                            <div class="flex items-start gap-2 mb-2">
                                <div class="w-1.5 h-1.5 bg-emerald-500 rounded-full mt-1.5 flex-shrink-0"></div>
                                <p class="text-[11px] text-slate-800 font-bold leading-tight font-inter">${event.title}</p>
                            </div>
                            <div class="flex flex-wrap gap-3 pl-3.5">
                                <div class="flex items-center gap-1">
                                    <svg class="w-3 h-3 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-[9px] text-slate-500 font-medium">${event.time}</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg class="w-3 h-3 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span class="text-[9px] text-slate-500 font-medium">${event.location}</span>
                                </div>
                            </div>
                        </div>
                    `).join('')}
                </div>
            </div>
        `;
    } else {
        eventDisplay.innerHTML = `
            <svg class="w-12 h-12 mx-auto mb-3 text-emerald-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <h5 class="text-xs font-black text-emerald-900 mb-1 uppercase tracking-tighter">Tidak Ada Agenda</h5>
            <p class="text-[10px] text-emerald-700/60 font-medium">Klik pada tanggal untuk melihat agenda penting.</p>
        `;
    }
}

// --- News Carousel Logic ---
let newsInterval;
function initNewsCarousel() {
    const newsCarousel = document.querySelector('.carousel-news');
    if (!newsCarousel) return;

    if (newsInterval) clearInterval(newsInterval);

    let currentNewsSlide = 0;
    const totalNewsItems = 5;

    const showNews = (index) => {
        if (index >= totalNewsItems) index = 0;
        if (index < 0) index = totalNewsItems - 1;
        currentNewsSlide = index;
        newsCarousel.style.transform = `translateX(-${index * 100}%)`;

        document.querySelectorAll('.news-current-index').forEach(el => {
            el.textContent = currentNewsSlide + 1;
        });
    };

    const nextNews = () => {
        showNews(currentNewsSlide + 1);
    };

    const prevNews = () => {
        showNews(currentNewsSlide - 1);
    };

    // Attach listeners to navigation buttons
    document.querySelectorAll('.btn-prev-news').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            prevNews();
            // Reset interval on manual interaction
            clearInterval(newsInterval);
            newsInterval = setInterval(nextNews, 6000);
        });
    });

    document.querySelectorAll('.btn-next-news').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            nextNews();
            // Reset interval on manual interaction
            clearInterval(newsInterval);
            newsInterval = setInterval(nextNews, 6000);
        });
    });

    newsInterval = setInterval(nextNews, 6000);

    newsCarousel.parentElement.addEventListener('mouseenter', () => clearInterval(newsInterval));
    newsCarousel.parentElement.addEventListener('mouseleave', () => newsInterval = setInterval(nextNews, 6000));
}

function initNewsTabs() {
    const tabIndicator = document.getElementById('tab-indicator');
    const tabTerbaru = document.getElementById('tab-terbaru');

    // Initial position
    if (tabIndicator && tabTerbaru) {
        tabIndicator.style.width = tabTerbaru.offsetWidth + 'px';
    }

    // Global switch function
    window.switchNewsTab = function (tab) {
        const tabIndicator = document.getElementById('tab-indicator');
        const tabTerbaru = document.getElementById('tab-terbaru');
        const tabTerpopuler = document.getElementById('tab-terpopuler');
        const listTerbaru = document.getElementById('list-terbaru');
        const listTerpopuler = document.getElementById('list-terpopuler');

        if (!tabTerbaru || !tabTerpopuler) return;

        if (tab === 'terbaru') {
            tabTerbaru.classList.add('text-slate-900');
            tabTerbaru.classList.remove('text-gray-400');
            tabTerpopuler.classList.add('text-gray-400');
            tabTerpopuler.classList.remove('text-slate-900');

            tabIndicator.style.transform = 'translateX(0)';
            tabIndicator.style.width = tabTerbaru.offsetWidth + 'px';

            listTerbaru.classList.remove('hidden', 'opacity-0');
            listTerbaru.classList.add('opacity-100');
            listTerpopuler.classList.add('hidden', 'opacity-0');
            listTerpopuler.classList.remove('opacity-100');
        } else {
            tabTerpopuler.classList.add('text-slate-900');
            tabTerpopuler.classList.remove('text-gray-400');
            tabTerbaru.classList.add('text-gray-400');
            tabTerbaru.classList.remove('text-slate-900');

            // Calculate position
            const offset = tabTerpopuler.offsetLeft - tabTerbaru.offsetLeft;
            tabIndicator.style.transform = `translateX(${offset}px)`;
            tabIndicator.style.width = tabTerpopuler.offsetWidth + 'px';

            listTerpopuler.classList.remove('hidden', 'opacity-0');
            listTerpopuler.classList.add('opacity-100');
            listTerbaru.classList.add('hidden', 'opacity-0');
            listTerbaru.classList.remove('opacity-100');
        }
    }
}

// --- Lightbox Logic ---
window.openLightbox = function (src, caption) {
    const imageLightbox = document.getElementById('imageLightbox');
    const lightboxImage = document.getElementById('lightboxImage');
    const lightboxCaption = document.getElementById('lightboxCaption');

    if (!imageLightbox || !lightboxImage || !lightboxCaption) return;

    lightboxImage.src = src;
    lightboxImage.alt = caption;
    lightboxCaption.textContent = caption;
    imageLightbox.classList.remove('hidden');
    imageLightbox.classList.add('flex');
    document.body.style.overflow = 'hidden';

    // Add entrance animation
    setTimeout(() => {
        lightboxImage.style.transform = 'scale(1)';
    }, 10);
};

window.closeLightbox = function (event, forceClose = false) {
    const imageLightbox = document.getElementById('imageLightbox');
    const lightboxImage = document.getElementById('lightboxImage');

    if (!imageLightbox || !lightboxImage) return;

    if (forceClose || event.target === imageLightbox) {
        lightboxImage.style.transform = 'scale(0.9)';
        setTimeout(() => {
            imageLightbox.classList.add('hidden');
            imageLightbox.classList.remove('flex');
            document.body.style.overflow = '';
            lightboxImage.src = '';
        }, 200);
    }
};

// Global Escape key listener
document.addEventListener('keydown', (e) => {
    const imageLightbox = document.getElementById('imageLightbox');
    if (e.key === 'Escape' && imageLightbox && !imageLightbox.classList.contains('hidden')) {
        closeLightbox(null, true);
    }
});

// --- Scroll Progress & Back to Top Logic ---
window.addEventListener('scroll', () => {
    const scrollProgressBar = document.getElementById('scroll-progress-bar');
    const backToTopBtn = document.getElementById('back-to-top');

    if (scrollProgressBar) {
        const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
        const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled = (scrollTop / scrollHeight) * 100;
        scrollProgressBar.style.width = scrolled + "%";
    }

    if (backToTopBtn) {
        const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
        if (scrollTop > 500) {
            backToTopBtn.classList.remove('translate-y-20', 'opacity-0');
        } else {
            backToTopBtn.classList.add('translate-y-20', 'opacity-0');
        }
    }
});

window.scrollToTop = function () {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
};
