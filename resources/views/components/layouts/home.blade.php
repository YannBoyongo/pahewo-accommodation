<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <x-favicon />

    @php
        $metaTitle       = isset($title) ? $title.' | Endo Wellness Accommodation' : 'Endo Wellness Accommodation | Boutique Hotel Kampala, Uganda';
        $metaDescription = isset($description) ? (string) $description : 'A boutique hotel in Kampala, Uganda where every booking funds 24/7 medical wellness, sanctuary, and dignity for women and girls living with endometriosis, in partnership with PAHEWO.';
        $metaImage       = isset($ogImage) ? (string) $ogImage : 'https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=1200&auto=format&fit=crop';
        $metaUrl         = url()->current();
    @endphp

    {{-- Primary --}}
    <title>{{ $metaTitle }}</title>
    <meta name="description" content="{{ $metaDescription }}">
    <link rel="canonical" href="{{ $metaUrl }}">
    <meta name="robots" content="index,follow,max-snippet:-1,max-image-preview:large,max-video-preview:-1">

    {{-- Open Graph --}}
    <meta property="og:type"         content="website">
    <meta property="og:site_name"    content="Endo Wellness Accommodation">
    <meta property="og:locale"       content="en_GB">
    <meta property="og:title"        content="{{ $metaTitle }}">
    <meta property="og:description"  content="{{ $metaDescription }}">
    <meta property="og:url"          content="{{ $metaUrl }}">
    <meta property="og:image"        content="{{ $metaImage }}">
    <meta property="og:image:width"  content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt"    content="{{ $metaTitle }}">

    {{-- Twitter Card --}}
    <meta name="twitter:card"        content="summary_large_image">
    <meta name="twitter:title"       content="{{ $metaTitle }}">
    <meta name="twitter:description" content="{{ $metaDescription }}">
    <meta name="twitter:image"       content="{{ $metaImage }}">

    {{-- JSON-LD: LodgingBusiness --}}
    @php
        $businessSchema = [
            '@context'    => 'https://schema.org',
            '@type'       => 'LodgingBusiness',
            'name'        => 'Endo Wellness Accommodation',
            'description' => 'A boutique hotel in Kampala, Uganda where every booking funds 24/7 medical wellness and sanctuary for women living with endometriosis, in partnership with PAHEWO.',
            'url'         => config('app.url'),
            'logo'        => config('app.url').'/images/favicon.png',
            'image'       => $metaImage,
            'address'     => ['@type' => 'PostalAddress', 'addressLocality' => 'Kampala', 'addressCountry' => 'UG'],
            'telephone'   => $siteSettings->phone ?? '',
            'email'       => $siteSettings->email ?? '',
            'priceRange'  => '$$',
            'starRating'  => ['@type' => 'Rating', 'ratingValue' => '4'],
            'amenityFeature' => [
                ['@type' => 'LocationFeatureSpecification', 'name' => 'Free WiFi',             'value' => true],
                ['@type' => 'LocationFeatureSpecification', 'name' => 'Parking',               'value' => true],
                ['@type' => 'LocationFeatureSpecification', 'name' => '24/7 Check-in',         'value' => true],
                ['@type' => 'LocationFeatureSpecification', 'name' => 'Restaurant',            'value' => true],
                ['@type' => 'LocationFeatureSpecification', 'name' => 'Conference facilities', 'value' => true],
            ],
            'sameAs' => array_filter([$siteSettings->facebook ?? '', $siteSettings->instagram ?? '']),
        ];
    @endphp
    <script type="application/ld+json">{!! json_encode($businessSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}</script>

    @stack('schema')

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=cormorant-garamond:400,500,600,700|poppins:300,400,500,600,700&display=swap" rel="stylesheet">
    <x-vite-assets />
</head>
<body class="min-h-screen bg-white">
    <x-public-header />

    <main>
        {{ $slot }}
    </main>

    <footer class="bg-chocolate-900 text-white">
        <div class="mx-auto grid max-w-7xl gap-12 px-6 py-16 lg:grid-cols-4 lg:px-8">
            <div class="lg:col-span-2">
                <div class="flex items-center gap-3">
                    <x-site-logo class="h-12 w-auto max-w-[130px] object-contain" />
                    <span class="text-sm font-semibold uppercase tracking-widest">{{ $siteSettings->footer_brand_name }}</span>
                </div>
                <p class="mt-5 max-w-md text-sm leading-relaxed text-white/70">
                    {{ $siteSettings->footer_description }}
                </p>
                <p class="mt-5 text-sm text-gold-400">
                    In partnership with <a href="{{ $siteSettings->footer_partner_url }}" target="_blank" rel="noopener" class="underline underline-offset-4 hover:text-gold-300">{{ $siteSettings->footer_partner_text }}</a>
                </p>

                @if ($siteSettings->google_reviews_url)
                <a href="{{ $siteSettings->google_reviews_url }}" target="_blank" rel="noopener" class="mt-6 inline-flex items-center gap-3 rounded-xl border border-white/10 bg-white/5 px-4 py-3 transition hover:bg-white/10">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="h-6 w-6 shrink-0" aria-hidden="true">
                        <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"/>
                        <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"/>
                        <path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"/>
                        <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.18 1.48-4.97 2.31-8.16 2.31-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"/>
                        <path fill="none" d="M0 0h48v48H0z"/>
                    </svg>
                    <div>
                        <p class="text-[10px] font-semibold uppercase tracking-[0.15em] text-white/50">Review us on</p>
                        <p class="text-sm font-semibold text-white">Google Reviews</p>
                    </div>
                    <div class="ml-auto flex items-center gap-0.5 text-amber-400">
                        @for ($i = 0; $i < 5; $i++)
                            <svg class="h-3.5 w-3.5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        @endfor
                    </div>
                </a>
                @endif
            </div>
            <div>
                <h3 class="text-xs font-semibold uppercase tracking-[0.25em] text-gold-500">Explore</h3>
                <ul class="mt-5 space-y-3 text-sm text-white/70">
                    <li><a href="{{ route('rooms.index') }}" class="transition hover:text-gold-400">Rooms &amp; Suites</a></li>
                    <li><a href="{{ route('dining') }}" class="transition hover:text-gold-400">Dining</a></li>
                    <li><a href="{{ route('conference-meeting') }}" class="transition hover:text-gold-400">Meeting &amp; Events</a></li>
                    <li><a href="{{ route('our-story') }}" class="transition hover:text-gold-400">Our Story</a></li>
                    <li><a href="{{ route('about-pahewo') }}" class="transition hover:text-gold-400">Who We Are</a></li>
                </ul>
            </div>
            <div id="contact" class="scroll-mt-8">
                <h3 class="text-xs font-semibold uppercase tracking-[0.25em] text-gold-500">Contact</h3>
                <x-site-contact :settings="$siteSettings" />
                <p class="mt-5 rounded-xl bg-white/5 p-4 text-xs leading-relaxed text-white/60">
                    {{ $siteSettings->footer_wellness_message }}
                </p>
            </div>
        </div>
        <div class="border-t border-white/10">
            <div class="mx-auto flex max-w-7xl flex-col items-center justify-between gap-3 px-6 py-6 text-xs text-white/50 sm:flex-row lg:px-8">
                <p>&copy; {{ date('Y') }} Stay with Purpose. All rights reserved.</p>
                <div class="flex gap-4">
                    <a href="{{ route('privacy') }}" class="hover:text-white/70 transition">Privacy Policy</a>
                    <span>·</span>
                    <p>15% of every booking funds 24/7 endometriosis care.</p>
                </div>
            </div>
        </div>
    </footer>

    <livewire:support-chat-widget />
    <x-cookie-notice />
</body>
</html>
