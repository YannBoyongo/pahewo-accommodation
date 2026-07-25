<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <x-favicon />
    <title>Account — Stay with Purpose</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=cormorant-garamond:400,500,600,700|poppins:300,400,500,600,700&display=swap" rel="stylesheet">
    <x-vite-assets />
</head>
<body class="min-h-screen bg-chocolate-950 text-white antialiased">
    <div class="relative flex min-h-screen flex-col">
        <img src="https://images.unsplash.com/photo-1571896349842-33c89424de2d?q=80&w=2000&auto=format&fit=crop"
            alt="" class="absolute inset-0 h-full w-full object-cover opacity-30" aria-hidden="true">
        <div class="absolute inset-0 bg-gradient-to-b from-chocolate-950/90 via-chocolate-950/75 to-chocolate-950/95"></div>

        <header class="relative z-10 border-b border-white/10">
            <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4 lg:px-10">
                <a href="{{ route('home') }}" class="hero-nav-logo shrink-0">
                    <x-site-logo class="h-16 w-auto max-w-[200px] object-contain sm:h-[4.5rem] sm:max-w-[230px]" />
                </a>
                <a href="{{ route('home') }}" class="hero-nav-link hidden sm:inline-flex">← Back to website</a>
            </div>
        </header>

        <main class="relative z-10 flex flex-1 items-center justify-center px-6 py-10">
            <div class="w-full max-w-md">
                <div class="card-luxe overflow-hidden p-8 text-ink shadow-2xl shadow-chocolate-950/40 hover:translate-y-0 sm:p-10">
                    {{ $slot }}
                </div>

                <p class="mt-8 text-center text-xs leading-relaxed text-white/50">
                    Every stay funds 24/7 endometriosis care through our partnership with PAHEWO.
                </p>
            </div>
        </main>
    </div>
</body>
</html>
