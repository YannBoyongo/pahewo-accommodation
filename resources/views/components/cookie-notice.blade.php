<div
    x-data="{
        show: false,
        init() {
            if (! localStorage.getItem('cookie_consent')) {
                setTimeout(() => this.show = true, 800);
            }
        },
        accept() {
            localStorage.setItem('cookie_consent', 'accepted');
            this.show = false;
        },
        decline() {
            localStorage.setItem('cookie_consent', 'declined');
            this.show = false;
        }
    }"
    x-show="show"
    x-cloak
    x-transition:enter="transition ease-out duration-500"
    x-transition:enter-start="opacity-0 translate-y-4"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 translate-y-4"
    class="fixed bottom-6 left-1/2 z-50 w-[calc(100%-3rem)] max-w-2xl -translate-x-1/2 sm:bottom-8"
    role="dialog"
    aria-live="polite"
    aria-label="Cookie consent"
>
    <div class="flex flex-col gap-5 rounded-2xl border border-white/10 bg-chocolate-900 p-6 shadow-2xl shadow-black/50 ring-1 ring-inset ring-white/5 sm:flex-row sm:items-center sm:gap-6">

        {{-- Cookie icon --}}
        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-terracotta-500/15 ring-1 ring-terracotta-500/30">
            <svg class="h-6 w-6 text-terracotta-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"/>
            </svg>
        </div>

        {{-- Text --}}
        <div class="flex-1 min-w-0">
            <p class="text-sm font-semibold text-white">We use cookies</p>
            <p class="mt-1 text-xs leading-relaxed text-white/55">
                We use essential cookies to keep the site running and, with your consent, analytics cookies to understand how visitors use it.
                Read our
                <a href="/privacy" class="underline underline-offset-2 hover:text-white/80 transition">Privacy Policy</a>
                for details.
            </p>
        </div>

        {{-- Actions --}}
        <div class="flex shrink-0 flex-col gap-2 sm:flex-row">
            <button
                @click="decline"
                class="rounded-xl border border-white/15 px-4 py-2 text-xs font-semibold text-white/60 transition hover:border-white/30 hover:text-white/90"
            >
                Decline
            </button>
            <button
                @click="accept"
                class="rounded-xl bg-terracotta-500 px-5 py-2 text-xs font-semibold text-white transition hover:bg-terracotta-600"
            >
                Accept All
            </button>
        </div>
    </div>
</div>
