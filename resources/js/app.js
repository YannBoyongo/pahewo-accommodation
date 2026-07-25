import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const revealObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                revealObserver.unobserve(entry.target);
            }
        });
    },
    { threshold: 0.12 }
);

const observeReveals = (root = document) => {
    root.querySelectorAll('.reveal:not(.is-visible)').forEach((el) => revealObserver.observe(el));
};

observeReveals();
document.addEventListener('livewire:navigated', () => observeReveals());

const animateCount = (el) => {
    const target = Number(el.dataset.countTo || 0);
    const duration = 1600;
    const start = performance.now();

    const tick = (now) => {
        const progress = Math.min((now - start) / duration, 1);
        const eased = 1 - Math.pow(1 - progress, 3);
        el.textContent = Math.round(target * eased).toLocaleString();
        if (progress < 1) {
            requestAnimationFrame(tick);
        }
    };

    requestAnimationFrame(tick);
};

const countObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                animateCount(entry.target);
                countObserver.unobserve(entry.target);
            }
        });
    },
    { threshold: 0.4 }
);

const observeCounts = (root = document) => {
    root.querySelectorAll('[data-count-to]:not(.counted)').forEach((el) => {
        el.classList.add('counted');
        countObserver.observe(el);
    });
};

observeCounts();
document.addEventListener('livewire:navigated', () => observeCounts());
