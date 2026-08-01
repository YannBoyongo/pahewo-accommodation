<x-layouts.home>
    <x-slot:description>A boutique hotel in Kampala, Uganda where every booking funds 24/7 medical wellness, sanctuary, and dignity for women and girls living with endometriosis — in partnership with PAHEWO.</x-slot:description>
    <x-slot:ogImage>https://images.unsplash.com/photo-1590490360182-c33d57733427?q=80&w=1200&auto=format&fit=crop</x-slot:ogImage>

    <x-hero />

    <x-credibility-bar :page-content="$pageContent" />

    {{-- Our story --}}
    <section class="overflow-hidden bg-white py-20 sm:py-24 lg:py-28">
        <div class="mx-auto grid max-w-7xl items-center gap-14 px-6 lg:grid-cols-[0.85fr_1.15fr] lg:gap-20 lg:px-8">
            <div class="reveal text-center lg:text-left">
                <p class="section-label">{{ $pageContent->value('story_label') }}</p>
                <h2 class="mt-4 font-serif text-4xl font-semibold uppercase tracking-[0.04em] text-chocolate-900 sm:text-5xl">
                    {{ $pageContent->value('story_heading') }}
                </h2>

                <blockquote class="relative mx-auto mt-8 max-w-lg px-8 font-serif text-xl font-semibold leading-relaxed text-chocolate-800 lg:mx-0 lg:px-10">
                    <span class="absolute left-0 top-0 font-serif text-5xl leading-none text-chocolate-200" aria-hidden="true">&ldquo;</span>
                    {{ $pageContent->value('story_quote') }}
                    <span class="absolute bottom-[-1rem] right-0 font-serif text-5xl leading-none text-chocolate-200" aria-hidden="true">&rdquo;</span>
                </blockquote>

                <a href="{{ route('our-story') }}" class="btn-secondary mt-10 uppercase tracking-[0.14em]">
                    Discover More
                </a>
            </div>

            @php
                $storyRooms = $featuredRooms->take(3)->values();
            @endphp

            @if ($storyRooms->isNotEmpty())
                <div class="reveal relative mx-auto h-[27rem] w-full max-w-2xl sm:h-[34rem]" aria-label="A glimpse inside Stay with Purpose">
                    @if ($storyRooms->has(0))
                        <figure class="absolute left-0 top-0 h-[58%] w-[62%] overflow-hidden rounded-2xl bg-chocolate-100 shadow-xl shadow-chocolate-900/10">
                            <img src="{{ $pageContent->imageUrl('story_image_one') ?: $storyRooms[0]->coverImageUrl() }}" alt="{{ $storyRooms[0]->name }}" class="h-full w-full object-cover transition duration-700 hover:scale-105">
                        </figure>
                    @endif

                    @if ($storyRooms->has(1))
                        <figure class="absolute right-0 top-[8%] z-10 h-[62%] w-[45%] overflow-hidden rounded-2xl border-8 border-white bg-chocolate-100 shadow-xl shadow-chocolate-900/10 sm:border-[10px]">
                            <img src="{{ $pageContent->imageUrl('story_image_two') ?: $storyRooms[1]->coverImageUrl() }}" alt="{{ $storyRooms[1]->name }}" class="h-full w-full object-cover transition duration-700 hover:scale-105">
                        </figure>
                    @endif

                    @if ($storyRooms->has(2))
                        <figure class="absolute bottom-0 left-[8%] z-20 h-[43%] w-[58%] overflow-hidden rounded-2xl border-8 border-white bg-chocolate-100 shadow-xl shadow-chocolate-900/10 sm:border-[10px]">
                            <img src="{{ $pageContent->imageUrl('story_image_three') ?: $storyRooms[2]->coverImageUrl() }}" alt="{{ $storyRooms[2]->name }}" class="h-full w-full object-cover transition duration-700 hover:scale-105">
                        </figure>
                    @endif

                    <div class="absolute bottom-[4%] right-[4%] h-24 w-24 rounded-full bg-gold-400/20 blur-2xl" aria-hidden="true"></div>
                </div>
            @endif
        </div>
    </section>

    {{-- Partners --}}
    @if ($partners->isNotEmpty())
        <section class="border-y border-chocolate-100 bg-beige/40 py-16 sm:py-20">
            <div class="reveal text-center">
                <p class="section-label">Our Partners</p>
                <h2 class="mt-3 font-serif text-3xl font-semibold text-chocolate-900 sm:text-4xl">Trusted Partnerships</h2>
            </div>

            <div class="partner-marquee relative mt-12 overflow-hidden" aria-label="Our partners">
                <div class="pointer-events-none absolute inset-y-0 left-0 z-10 w-16 bg-gradient-to-r from-beige to-transparent sm:w-28"></div>
                <div class="pointer-events-none absolute inset-y-0 right-0 z-10 w-16 bg-gradient-to-l from-beige to-transparent sm:w-28"></div>

                <div class="partner-marquee-track flex w-max">
                    @foreach ([false, true] as $isDuplicate)
                        <div class="flex shrink-0 items-center gap-14 px-7 sm:gap-20 sm:px-10" @if ($isDuplicate) aria-hidden="true" @endif>
                            @foreach ($partners as $partner)
                                @php
                                    $partnerLogo = $partner->logoUrl();
                                @endphp
                                <div class="flex h-24 w-52 shrink-0 items-center justify-center px-5 sm:w-60">
                                    @if ($partnerLogo)
                                        <img src="{{ $partnerLogo }}" alt="{{ $isDuplicate ? '' : $partner->name.' logo' }}" class="max-h-16 max-w-full object-contain">
                                    @else
                                        <span class="text-center font-serif text-xl font-semibold uppercase tracking-[0.08em] text-chocolate-700/70">
                                            {{ $partner->name }}
                                        </span>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Guest reviews --}}
    @if ($testimonials->isNotEmpty())
        <section class="border-y border-chocolate-100 bg-beige py-20 sm:py-24" x-data="{ activeReview: 0 }">
            <div class="mx-auto max-w-5xl px-6 text-center lg:px-8">
                <div class="reveal">
                    <p class="section-label">{{ $pageContent->value('reviews_label') }}</p>
                    <h2 class="mt-4 font-serif text-4xl font-semibold uppercase tracking-[0.04em] text-chocolate-900 sm:text-5xl lg:text-6xl">
                        {{ $pageContent->value('reviews_heading') }}
                    </h2>
                    <div class="mx-auto mt-7 max-w-3xl border-t border-chocolate-700/50"></div>
                </div>

                <div class="relative mx-auto mt-12 min-h-[17rem] max-w-4xl sm:mt-16 sm:min-h-[15rem]" aria-live="polite">
                    @foreach ($testimonials as $testimonial)
                        <figure x-show="activeReview === {{ $loop->index }}" x-cloak x-transition.opacity.duration.300ms class="absolute inset-0 flex flex-col items-center justify-center">
                            <blockquote class="relative px-10 font-serif text-xl font-semibold leading-9 text-chocolate-800 sm:px-16 sm:text-2xl sm:leading-10">
                                <span class="absolute left-0 top-0 text-5xl leading-none text-chocolate-200 sm:text-6xl" aria-hidden="true">&ldquo;</span>
                                {{ $testimonial->quote }}
                                <span class="absolute bottom-[-1rem] right-0 text-5xl leading-none text-chocolate-200 sm:text-6xl" aria-hidden="true">&rdquo;</span>
                            </blockquote>
                            <div class="mt-6 flex items-center justify-center gap-1" role="img" aria-label="Rated {{ $testimonial->rating }} out of 5 stars">
                                @foreach (range(1, 5) as $star)
                                    <svg class="h-5 w-5 {{ $star <= $testimonial->rating ? 'text-terracotta-500' : 'text-chocolate-200' }}" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                @endforeach
                            </div>
                            <figcaption class="mt-4 text-sm text-neutral-500">
                                <span class="font-semibold text-chocolate-800">{{ $testimonial->guest_name }}</span>
                                @if ($testimonial->stay_type)
                                    <span aria-hidden="true"> · </span>
                                    {{ $testimonial->stay_type }}
                                @endif
                            </figcaption>
                        </figure>
                    @endforeach
                </div>

                <div class="mt-8 flex items-center justify-center gap-3" role="group" aria-label="Choose a guest review">
                    @foreach ($testimonials as $testimonial)
                        <button type="button" x-on:click="activeReview = {{ $loop->index }}"
                            class="h-3 w-3 rounded-full border border-chocolate-700 transition hover:bg-chocolate-300 focus:outline-none focus:ring-2 focus:ring-chocolate-700 focus:ring-offset-2"
                            :class="activeReview === {{ $loop->index }} ? 'bg-chocolate-800' : 'bg-transparent'"
                            :aria-current="activeReview === {{ $loop->index }} ? 'true' : 'false'"
                            aria-label="Show review {{ $loop->iteration }}"></button>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Location --}}
    @php
        $locationBackground = $pageContent->imageUrl('location_background')
            ?: $featuredRooms->first()?->coverImageUrl();
        $mapLatitude = '0.092760';
        $mapLongitude = '32.528016';
        $mapPlaceName = 'Endo Wellness Accommodation';
        $mapQuery = $mapLatitude.','.$mapLongitude;
        $directionsHref = 'https://www.google.com/maps/dir/?api=1&destination='.rawurlencode($mapQuery);
        $googleMapsHref = 'https://www.google.com/maps?q='.rawurlencode($mapQuery);
    @endphp

    <section id="contact-location" class="relative isolate overflow-hidden bg-chocolate-950 py-20 sm:py-24 lg:py-28">
        <img src="{{ $locationBackground }}" alt="" class="absolute inset-0 -z-20 h-full w-full object-cover">
        <div class="absolute inset-0 -z-10 bg-chocolate-950/75 backdrop-blur-[2px]"></div>

        <div class="mx-auto grid max-w-7xl items-stretch gap-6 px-6 lg:grid-cols-[0.8fr_1.2fr] lg:px-8">
            <div class="reveal flex flex-col justify-center rounded-2xl bg-white p-8 shadow-2xl shadow-black/20 sm:p-10 lg:p-12">
                <p class="section-label">{{ $pageContent->value('location_label') }}</p>
                <h2 class="mt-4 font-serif text-4xl font-semibold uppercase tracking-[0.04em] text-chocolate-900 sm:text-5xl">
                    {{ $pageContent->value('location_heading') }}
                </h2>
                <div class="mt-6 flex items-start gap-3 text-chocolate-700">
                    <svg class="mt-0.5 h-6 w-6 shrink-0 text-terracotta-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21s6.75-5.25 6.75-11.25a6.75 6.75 0 1 0-13.5 0C5.25 15.75 12 21 12 21Z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.25 9.75a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"/>
                    </svg>
                    <p class="font-serif text-xl font-semibold">{{ $siteSettings->address }}</p>
                </div>
                <p class="mt-6 text-base leading-8 text-neutral-600">
                    {{ $pageContent->value('location_description') }}
                </p>
                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="{{ $directionsHref }}" target="_blank" rel="noopener" class="btn-primary uppercase tracking-[0.12em]">
                        Get Directions
                    </a>
                    <a href="mailto:{{ $siteSettings->email }}" class="btn-secondary uppercase tracking-[0.12em]">
                        Contact Us
                    </a>
                </div>
            </div>

            <div class="reveal relative min-h-[24rem] overflow-hidden rounded-2xl border-8 border-white/90 bg-white shadow-2xl shadow-black/20 sm:min-h-[30rem]">
                <div
                    id="home-location-map"
                    class="h-full min-h-[24rem] w-full sm:min-h-[30rem]"
                    role="region"
                    aria-label="Map showing Endo Wellness Accommodation"
                    data-lat="{{ $mapLatitude }}"
                    data-lng="{{ $mapLongitude }}"
                    data-name="{{ $mapPlaceName }}"
                    data-google-url="{{ $googleMapsHref }}"
                ></div>
            </div>
        </div>
    </section>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="">
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const mapElement = document.getElementById('home-location-map');

            if (! mapElement || typeof L === 'undefined') {
                return;
            }

            const lat = Number(mapElement.dataset.lat);
            const lng = Number(mapElement.dataset.lng);
            const placeName = mapElement.dataset.name;
            const googleUrl = mapElement.dataset.googleUrl;

            const map = L.map(mapElement, {
                scrollWheelZoom: false,
            }).setView([lat, lng], 12);

            L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                attribution: 'Tiles &copy; Esri',
                maxZoom: 19,
            }).addTo(map);

            L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/Reference/World_Boundaries_and_Places/MapServer/tile/{z}/{y}/{x}', {
                attribution: 'Labels &copy; Esri',
                maxZoom: 19,
            }).addTo(map);

            const marker = L.marker([lat, lng]).addTo(map);
            marker.bindPopup(
                `<div style="min-width:180px;text-align:center;font-family:Poppins,sans-serif;">
                    <strong style="display:block;font-size:14px;color:#29101d;">${placeName}</strong>
                    <a href="${googleUrl}" target="_blank" rel="noopener" style="display:inline-block;margin-top:8px;font-size:12px;color:#be1e63;text-decoration:underline;">Open in Google Maps</a>
                </div>`,
                { closeButton: true }
            ).openPopup();
        });
    </script>
</x-layouts.home>
