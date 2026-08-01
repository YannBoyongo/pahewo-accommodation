{{-- Shared public header: terracotta topbar + white sticky nav --}}
<div class="sticky top-0 z-50 shadow-sm" x-data="{ open: false, aboutOpen: false }">

    {{-- Terracotta contact topbar --}}
    <div class="bg-terracotta-500">
        <div class="mx-auto flex max-w-7xl items-center justify-between gap-3 px-6 py-1.5 text-[10px] font-semibold uppercase tracking-[0.16em] text-white lg:px-10">
            <p class="hidden sm:block">Kampala · Uganda · In partnership with PAHEWO</p>
            <div class="flex w-full items-center justify-center gap-x-3 sm:w-auto sm:justify-end">
                @if ($siteSettings->phone)
                    <span class="flex items-center gap-1.5">
                        <svg class="h-3 w-3 shrink-0 opacity-75" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"/></svg>
                        {{ $siteSettings->phone }}
                    </span>
                @endif
                @if ($siteSettings->phone && $siteSettings->email)
                    <span class="text-white/40">|</span>
                @endif
                @if ($siteSettings->email)
                    <span class="flex items-center gap-1.5">
                        <svg class="h-3 w-3 shrink-0 opacity-75" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/></svg>
                        {{ $siteSettings->email }}
                    </span>
                @endif
            </div>
        </div>
    </div>

    {{-- White main nav --}}
    <header class="border-b border-chocolate-100 bg-white">
        <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-6 py-3 lg:px-10 lg:py-4">

            <a href="{{ route('home') }}" class="shrink-0 transition duration-300 hover:opacity-90">
                <x-site-logo class="h-[5rem] w-auto max-w-[240px] object-contain sm:h-[5.5rem] sm:max-w-[280px] lg:h-24 lg:max-w-[320px]" />
            </a>

            <nav class="hidden flex-1 items-center justify-center gap-5 xl:flex 2xl:gap-7">
                <a href="{{ route('home') }}" @class(['public-nav-link', 'public-nav-link-active' => request()->routeIs('home')]) @if(request()->routeIs('home')) aria-current="page" @endif>Home</a>
                <a href="{{ route('rooms.index') }}" @class(['public-nav-link', 'public-nav-link-active' => request()->routeIs('rooms.*')]) @if(request()->routeIs('rooms.*')) aria-current="page" @endif>Accommodation</a>
                <a href="{{ route('dining') }}" @class(['public-nav-link', 'public-nav-link-active' => request()->routeIs('dining')]) @if(request()->routeIs('dining')) aria-current="page" @endif>Restaurant &amp; Cafe</a>
                <a href="{{ route('conference-meeting') }}" @class(['public-nav-link', 'public-nav-link-active' => request()->routeIs('conference-meeting')]) @if(request()->routeIs('conference-meeting')) aria-current="page" @endif>Meeting &amp; Events</a>
                <a href="{{ route('contact') }}" @class(['public-nav-link', 'public-nav-link-active' => request()->routeIs('contact')]) @if(request()->routeIs('contact')) aria-current="page" @endif>Contact</a>

                <div class="relative" @mouseenter="aboutOpen = true" @mouseleave="aboutOpen = false">
                    <button
                        type="button"
                        @click="aboutOpen = !aboutOpen"
                        @class(['public-nav-link inline-flex items-center gap-1.5', 'public-nav-link-active' => request()->routeIs('our-story', 'about-pahewo')])
                        :aria-expanded="aboutOpen.toString()"
                        aria-haspopup="true"
                    >
                        About
                        <svg class="h-3.5 w-3.5 transition" :class="aboutOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/></svg>
                    </button>

                    <div
                        x-show="aboutOpen"
                        x-cloak
                        x-transition:enter="transition ease-out duration-150"
                        x-transition:enter-start="opacity-0 translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-100"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 translate-y-1"
                        class="absolute left-1/2 top-full z-50 mt-3 w-52 -translate-x-1/2 rounded-xl border border-chocolate-100 bg-white py-2 shadow-xl shadow-chocolate-900/10"
                        role="menu"
                    >
                        <a href="{{ route('our-story') }}" role="menuitem" @class(['block px-4 py-2.5 text-sm font-semibold text-chocolate-700 transition hover:bg-beige hover:text-terracotta-500', 'bg-beige text-terracotta-500' => request()->routeIs('our-story')]) @if(request()->routeIs('our-story')) aria-current="page" @endif>Our Story</a>
                        <a href="{{ route('about-pahewo') }}" role="menuitem" @class(['block px-4 py-2.5 text-sm font-semibold text-chocolate-700 transition hover:bg-beige hover:text-terracotta-500', 'bg-beige text-terracotta-500' => request()->routeIs('about-pahewo')]) @if(request()->routeIs('about-pahewo')) aria-current="page" @endif>Who We Are</a>
                    </div>
                </div>
            </nav>

            <div class="flex shrink-0 items-center gap-3">
                <button @click="open = !open" class="text-chocolate-800 xl:hidden" aria-label="Toggle menu">
                    <svg x-show="!open" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" d="M3.75 6.75h16.5M3.75 12h16.5M3.75 17.25h16.5"/></svg>
                    <svg x-show="open" x-cloak class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" d="M6 18 18 6M6 6l12 12"/></svg>
                </button>
                <a href="{{ route('booking-inquiry.create') }}" class="btn-primary hidden px-5 py-2.5 text-xs font-extrabold uppercase tracking-[0.14em] sm:inline-flex">Book Now</a>
            </div>
        </div>

        {{-- Mobile menu --}}
        <nav x-show="open" x-cloak x-transition class="border-t border-chocolate-100 bg-white xl:hidden">
            <div class="mx-auto max-w-7xl px-6 py-5">
                <div class="flex flex-col divide-y divide-chocolate-100">
                    <a href="{{ route('home') }}" @click="open = false" @class(['public-mobile-nav-link', 'public-mobile-nav-link-active' => request()->routeIs('home')]) @if(request()->routeIs('home')) aria-current="page" @endif>Home</a>
                    <a href="{{ route('rooms.index') }}" @click="open = false" @class(['public-mobile-nav-link', 'public-mobile-nav-link-active' => request()->routeIs('rooms.*')]) @if(request()->routeIs('rooms.*')) aria-current="page" @endif>Accommodation</a>
                    <a href="{{ route('dining') }}" @click="open = false" @class(['public-mobile-nav-link', 'public-mobile-nav-link-active' => request()->routeIs('dining')]) @if(request()->routeIs('dining')) aria-current="page" @endif>Restaurant &amp; Cafe</a>
                    <a href="{{ route('conference-meeting') }}" @click="open = false" @class(['public-mobile-nav-link', 'public-mobile-nav-link-active' => request()->routeIs('conference-meeting')]) @if(request()->routeIs('conference-meeting')) aria-current="page" @endif>Meeting &amp; Events</a>
                    <a href="{{ route('contact') }}" @click="open = false" @class(['public-mobile-nav-link', 'public-mobile-nav-link-active' => request()->routeIs('contact')]) @if(request()->routeIs('contact')) aria-current="page" @endif>Contact</a>

                    <div>
                        <button
                            type="button"
                            @click="aboutOpen = !aboutOpen"
                            @class(['public-mobile-nav-link flex w-full items-center justify-between', 'public-mobile-nav-link-active' => request()->routeIs('our-story', 'about-pahewo')])
                            :aria-expanded="aboutOpen.toString()"
                        >
                            About
                            <svg class="h-4 w-4 transition" :class="aboutOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/></svg>
                        </button>
                        <div x-show="aboutOpen" x-cloak class="space-y-1 pb-3 pl-4">
                            <a href="{{ route('our-story') }}" @click="open = false" @class(['block py-2 text-sm font-medium text-chocolate-700 transition hover:text-terracotta-500', 'text-terracotta-500' => request()->routeIs('our-story')]) @if(request()->routeIs('our-story')) aria-current="page" @endif>Our Story</a>
                            <a href="{{ route('about-pahewo') }}" @click="open = false" @class(['block py-2 text-sm font-medium text-chocolate-700 transition hover:text-terracotta-500', 'text-terracotta-500' => request()->routeIs('about-pahewo')]) @if(request()->routeIs('about-pahewo')) aria-current="page" @endif>Who We Are</a>
                        </div>
                    </div>
                </div>
                <a href="{{ route('booking-inquiry.create') }}" @click="open = false" class="btn-primary mt-5 w-full justify-center text-sm font-extrabold uppercase tracking-[0.14em]">Book Now</a>
            </div>
        </nav>
    </header>

</div>
