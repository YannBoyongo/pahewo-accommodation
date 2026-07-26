@php
    $contentLinks = [
        ['route' => 'dashboard.pages.index', 'label' => 'Website Pages', 'icon' => 'pages', 'patterns' => ['dashboard.pages.*']],
        ['route' => 'dashboard.rooms.index', 'label' => 'Rooms', 'icon' => 'rooms', 'patterns' => ['dashboard.rooms.*']],
        ['route' => 'dashboard.partners.index', 'label' => 'Partners', 'icon' => 'partners', 'patterns' => ['dashboard.partners.*']],
        ['route' => 'dashboard.testimonials.index', 'label' => 'Testimonials', 'icon' => 'testimonials', 'patterns' => ['dashboard.testimonials.*']],
    ];

    $operationsLinks = [
        ['route' => 'dashboard.bookings.index', 'label' => 'Bookings', 'icon' => 'bookings', 'patterns' => ['dashboard.bookings.*']],
    ];

    $systemLinks = [
        ['route' => 'dashboard.hero-section.edit', 'label' => 'Hero Section', 'icon' => 'hero', 'patterns' => ['dashboard.hero-section.*']],
        ['route' => 'dashboard.settings.edit', 'label' => 'Settings', 'icon' => 'settings', 'patterns' => ['dashboard.settings.*']],
    ];
@endphp

<aside
    class="fixed inset-y-0 left-0 z-50 flex w-72 flex-col bg-chocolate-900 text-white transition-transform duration-200 lg:translate-x-0"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
>
    <div class="flex items-center justify-between border-b border-white/10 px-6 py-5">
        <a href="{{ route('dashboard') }}" class="block">
            <x-site-logo class="h-14 w-auto max-w-[180px] object-contain" />
        </a>
        <button type="button" class="rounded-lg p-1 text-white/70 hover:bg-white/10 lg:hidden" @click="sidebarOpen = false" aria-label="Close sidebar">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" d="M6 18 18 6M6 6l12 12"/></svg>
        </button>
    </div>

    <nav class="flex-1 space-y-8 overflow-y-auto px-4 py-6">
        <div>
            <a
                href="{{ route('dashboard') }}"
                class="admin-sidebar-link {{ request()->routeIs('dashboard') && ! request()->routeIs('dashboard.*') ? 'admin-sidebar-link-active' : '' }}"
            >
                <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM10.5 15.75A2.25 2.25 0 0 1 12.75 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25h-2.25a2.25 2.25 0 0 1-2.25-2.25v-2.25ZM18.75 6A2.25 2.25 0 0 1 21 3.75h2.25A2.25 2.25 0 0 1 25.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H21a2.25 2.25 0 0 1-2.25-2.25V6ZM18.75 15.75A2.25 2.25 0 0 1 21 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H21a2.25 2.25 0 0 1-2.25-2.25v-2.25Z"/></svg>
                Overview
            </a>
        </div>

        <div>
            <p class="mb-3 px-4 text-[10px] font-semibold uppercase tracking-[0.2em] text-white/40">Operations</p>
            <div class="space-y-1">
                @foreach ($operationsLinks as $link)
                    <a
                        href="{{ route($link['route']) }}"
                        class="admin-sidebar-link {{ request()->routeIs($link['patterns']) ? 'admin-sidebar-link-active' : '' }}"
                    >
                        @include('admin.partials.sidebar-icon', ['icon' => $link['icon']])
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </div>
        </div>

        <div>
            <p class="mb-3 px-4 text-[10px] font-semibold uppercase tracking-[0.2em] text-white/40">Content</p>
            <div class="space-y-1">
                @foreach ($contentLinks as $link)
                    <a
                        href="{{ route($link['route']) }}"
                        class="admin-sidebar-link {{ request()->routeIs($link['patterns']) ? 'admin-sidebar-link-active' : '' }}"
                    >
                        @include('admin.partials.sidebar-icon', ['icon' => $link['icon']])
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </div>
        </div>

        <div>
            <p class="mb-3 px-4 text-[10px] font-semibold uppercase tracking-[0.2em] text-white/40">System</p>
            <div class="space-y-1">
                @foreach ($systemLinks as $link)
                    <a
                        href="{{ route($link['route']) }}"
                        class="admin-sidebar-link {{ request()->routeIs($link['patterns']) ? 'admin-sidebar-link-active' : '' }}"
                    >
                        @include('admin.partials.sidebar-icon', ['icon' => $link['icon']])
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </div>
        </div>

        <div>
            <p class="mb-3 px-4 text-[10px] font-semibold uppercase tracking-[0.2em] text-white/40">Account</p>
            <div class="space-y-1">
                <a href="{{ route('profile.edit') }}" class="admin-sidebar-link {{ request()->routeIs('profile.*') ? 'admin-sidebar-link-active' : '' }}">
                    <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/></svg>
                    Profile
                </a>
                <a href="{{ route('home') }}" class="admin-sidebar-link">
                    <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/></svg>
                    View website
                </a>
            </div>
        </div>
    </nav>

    <div class="border-t border-white/10 px-6 py-5">
        <p class="text-xs text-white/50">Signed in as</p>
        <p class="mt-1 truncate text-sm font-medium text-white">{{ Auth::user()->email }}</p>
    </div>
</aside>
