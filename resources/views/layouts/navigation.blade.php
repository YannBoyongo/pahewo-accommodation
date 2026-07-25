<nav x-data="{ open: false }" class="glass-nav sticky top-0 z-50 border-b border-white/10">
    <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-6 py-3 lg:px-8 lg:py-4">
        <a href="{{ route('home') }}" class="hero-nav-logo shrink-0">
            <x-site-logo class="h-16 w-auto max-w-[190px] object-contain sm:h-[4.5rem] sm:max-w-[220px]" />
        </a>

        <div class="hidden items-center gap-6 lg:flex">
            <x-nav-link :href="route('home')">Website</x-nav-link>
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">Dashboard</x-nav-link>
            <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.*')">Profile</x-nav-link>
        </div>

        <div class="flex items-center gap-3">
            <button @click="open = !open" class="text-white lg:hidden" aria-label="Toggle menu">
                <svg x-show="!open" class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" d="M3.75 6.75h16.5M3.75 12h16.5M3.75 17.25h16.5"/></svg>
                <svg x-show="open" x-cloak class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" d="M6 18 18 6M6 6l12 12"/></svg>
            </button>

            <x-dropdown align="right" width="48" contentClasses="rounded-xl bg-white py-2 shadow-xl ring-1 ring-chocolate-100">
                <x-slot name="trigger">
                    <button class="hidden items-center gap-2 rounded-xl border border-white/30 px-4 py-2 text-sm font-medium text-white transition hover:border-gold-400 hover:text-gold-300 lg:inline-flex">
                        <span>{{ Auth::user()->name }}</span>
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">{{ __('Profile') }}</x-dropdown-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
    </div>

    <div x-show="open" x-cloak x-transition class="border-t border-white/10 bg-chocolate-900/95 backdrop-blur-sm lg:hidden">
        <div class="mx-auto max-w-7xl px-6 py-6">
            <div class="mb-4 text-sm text-white/70">{{ Auth::user()->email }}</div>
            <div class="flex flex-col divide-y divide-white/10">
                <x-responsive-nav-link :href="route('home')">Website</x-responsive-nav-link>
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">Dashboard</x-responsive-nav-link>
                <x-responsive-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.*')">Profile</x-responsive-nav-link>
            </div>
            <form method="POST" action="{{ route('logout') }}" class="mt-6">
                @csrf
                <button type="submit" class="btn-secondary w-full border-white/40 bg-transparent text-white hover:bg-white hover:text-chocolate-800">Log Out</button>
            </form>
        </div>
    </div>
</nav>
