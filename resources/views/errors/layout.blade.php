<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Something went wrong') | Endo Wellness Accommodation</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=cormorant-garamond:400,500,600,700|poppins:300,400,500,600,700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- Inline critical styles ensure the page looks correct even before CSS compiles --}}
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html, body { height: 100%; }
        body {
            background-color: #29101d;
            color: #fff;
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
    </style>
</head>
<body class="flex min-h-screen flex-col bg-chocolate-900 font-sans antialiased">

    {{-- Subtle grid pattern overlay --}}
    <div class="pointer-events-none fixed inset-0 opacity-[0.03]"
         style="background-image: linear-gradient(#d43a7b 1px, transparent 1px), linear-gradient(90deg, #d43a7b 1px, transparent 1px); background-size: 40px 40px;">
    </div>

    {{-- Top accent bar --}}
    <div class="h-1 w-full" style="background: linear-gradient(90deg, #d43a7b, #a0245a, transparent);"></div>

    <div class="relative flex flex-1 flex-col items-center justify-center px-6 py-20 text-center">

        {{-- Large faded code --}}
        <div class="pointer-events-none absolute inset-x-0 top-1/2 -translate-y-1/2 select-none"
             aria-hidden="true">
            <p class="font-serif text-[22vw] font-bold leading-none text-white opacity-[0.04] sm:text-[18vw] lg:text-[15vw]">
                @yield('code', '?')
            </p>
        </div>

        {{-- Icon badge --}}
        <div class="relative z-10 flex h-24 w-24 items-center justify-center rounded-2xl"
             style="background: linear-gradient(135deg, rgba(212,58,123,0.2), rgba(212,58,123,0.05)); border: 1px solid rgba(212,58,123,0.3); box-shadow: 0 0 40px rgba(212,58,123,0.1);">
            @yield('icon')
        </div>

        {{-- Code label --}}
        <p class="relative z-10 mt-6 text-xs font-semibold uppercase tracking-[0.3em] text-white/30">
            Error @yield('code', '?')
        </p>

        {{-- Title --}}
        <h1 class="relative z-10 mt-3 font-serif text-4xl font-semibold text-white sm:text-5xl">
            @yield('title', 'Something went wrong')
        </h1>

        {{-- Divider --}}
        <div class="relative z-10 my-6 h-px w-16" style="background: linear-gradient(90deg, transparent, #d43a7b, transparent);"></div>

        {{-- Message --}}
        <p class="relative z-10 mx-auto max-w-lg text-base leading-relaxed text-white/60">
            @yield('message', 'An unexpected error occurred. Please try again or return home.')
        </p>

        {{-- Actions --}}
        <div class="relative z-10 mt-10 flex flex-wrap justify-center gap-4">
            @yield('actions')
        </div>
    </div>

    {{-- Footer --}}
    <div class="relative border-t border-white/10 px-6 py-5 text-center text-xs text-white/30">
        &copy; {{ date('Y') }} Endo Wellness Accommodation &middot; In partnership with
        <a href="https://www.pahewo.org" target="_blank" rel="noopener" style="color: rgba(255,255,255,0.45);">PAHEWO</a>
    </div>

</body>
</html>
