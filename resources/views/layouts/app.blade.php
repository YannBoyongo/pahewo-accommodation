<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <x-favicon />
    <title>{{ isset($title) ? $title.' — Stay with Purpose' : 'Dashboard — Stay with Purpose' }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=cormorant-garamond:400,500,600,700|poppins:300,400,500,600,700&display=swap" rel="stylesheet">
    <x-vite-assets />
</head>
<body class="min-h-screen bg-beige font-sans text-ink antialiased">
    @include('layouts.navigation')

    @isset($header)
        <header class="border-b border-chocolate-100 bg-white/80 backdrop-blur">
            <div class="mx-auto max-w-7xl px-6 py-8 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

    <main class="py-10 sm:py-14">
        {{ $slot }}
    </main>

    <footer class="border-t border-chocolate-100 bg-chocolate-900 py-8 text-center text-xs text-white/50">
        <p>&copy; {{ date('Y') }} Stay with Purpose · <a href="{{ route('home') }}" class="text-gold-400 hover:text-gold-300">Return to website</a></p>
    </footer>
</body>
</html>
