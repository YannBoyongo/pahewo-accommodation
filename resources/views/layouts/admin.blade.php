<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <x-favicon />
    <title>{{ $title ? $title.' — Admin' : 'Dashboard — Stay with Purpose' }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=cormorant-garamond:400,500,600,700|poppins:300,400,500,600,700&display=swap" rel="stylesheet">
    <x-vite-assets />
</head>
<body class="min-h-screen bg-beige font-sans text-ink antialiased" x-data="{ sidebarOpen: false }">
    <div class="flex min-h-screen">
        @include('admin.partials.sidebar')

        <div class="flex min-w-0 flex-1 flex-col lg:pl-72">
            <header class="sticky top-0 z-30 border-b border-chocolate-100 bg-white/90 backdrop-blur">
                <div class="flex items-center justify-between gap-4 px-6 py-4 lg:px-8">
                    <div class="flex items-center gap-4">
                        <button
                            type="button"
                            class="rounded-lg p-2 text-chocolate-700 hover:bg-chocolate-50 lg:hidden"
                            @click="sidebarOpen = true"
                            aria-label="Open sidebar"
                        >
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" d="M3.75 6.75h16.5M3.75 12h16.5M3.75 17.25h16.5"/></svg>
                        </button>
                        <div>
                            @if ($heading)
                                <p class="section-label">{{ $description ?? 'Administration' }}</p>
                                <h1 class="mt-1 font-serif text-2xl text-chocolate-800 sm:text-3xl">{{ $heading }}</h1>
                            @endif
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <a href="{{ route('home') }}" class="hidden text-sm text-chocolate-600 transition hover:text-chocolate-800 sm:inline">View website</a>
                        <x-dropdown align="right" width="48" contentClasses="rounded-xl bg-white py-2 shadow-xl ring-1 ring-chocolate-100">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center gap-2 rounded-xl border border-chocolate-200 px-4 py-2 text-sm font-medium text-chocolate-800 transition hover:border-chocolate-400">
                                    <span class="hidden sm:inline">{{ Auth::user()->name }}</span>
                                    <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-chocolate-700 text-xs font-semibold text-white">
                                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                    </span>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">{{ __('Profile') }}</x-dropdown-link>
                                <x-dropdown-link :href="route('home')">{{ __('Website') }}</x-dropdown-link>
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
            </header>

            <main class="flex-1 px-6 py-8 lg:px-8">
                @include('admin.partials.flash')

                {{ $slot }}
            </main>
        </div>
    </div>

    <div
        x-show="sidebarOpen"
        x-cloak
        x-transition:enter="transition-opacity ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-40 bg-chocolate-950/60 lg:hidden"
        @click="sidebarOpen = false"
    ></div>
</body>
</html>
