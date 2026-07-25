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

                <a href="{{ route('about-pahewo') }}" class="btn-secondary mt-10 uppercase tracking-[0.14em]">
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

    {{-- Featured rooms --}}
    <section class="border-y border-chocolate-100 bg-beige/30 py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="reveal text-center">
                <p class="section-label">{{ $pageContent->value('rooms_label') }}</p>
                <h2 class="mt-4 font-serif text-4xl font-semibold uppercase tracking-[0.04em] text-chocolate-900 sm:text-5xl lg:text-6xl">
                    {{ $pageContent->value('rooms_heading') }}
                </h2>
            </div>

            <div class="mt-14 grid items-stretch gap-12 md:grid-cols-2 lg:grid-cols-3 lg:gap-10">
                @foreach ($featuredRooms as $room)
                    <x-room-card :room="$room" variant="featured" />
                @endforeach
            </div>

            <div class="reveal mt-14 text-center">
                <a href="{{ route('rooms.index') }}" class="btn-secondary uppercase tracking-[0.12em]">Explore All Rooms</a>
            </div>
        </div>
    </section>

    {{-- Dining experience --}}
    <section id="dining" class="scroll-mt-8 overflow-hidden bg-white py-20 sm:py-24 lg:py-28">
        <div class="mx-auto grid max-w-7xl items-center gap-14 px-6 lg:grid-cols-[1.15fr_0.85fr] lg:gap-20 lg:px-8">
            <div class="reveal relative mx-auto h-[28rem] w-full max-w-2xl sm:h-[34rem] lg:h-[38rem]">
                <figure class="absolute left-0 top-0 h-[52%] w-[68%] overflow-hidden rounded-2xl bg-chocolate-100 shadow-xl shadow-chocolate-900/10">
                    <img src="{{ $pageContent->imageUrl('dining_image_one') }}"
                        alt="Elegant restaurant dining room" class="h-full w-full object-cover transition duration-700 hover:scale-105">
                </figure>
                <figure class="absolute right-0 top-[21%] z-10 h-[48%] w-[58%] overflow-hidden rounded-2xl border-8 border-white bg-chocolate-100 shadow-xl shadow-chocolate-900/10 sm:border-[10px]">
                    <img src="{{ $pageContent->imageUrl('dining_image_two') }}"
                        alt="Warm and inviting restaurant interior" class="h-full w-full object-cover transition duration-700 hover:scale-105">
                </figure>
                <figure class="absolute bottom-0 left-[10%] z-20 h-[42%] w-[62%] overflow-hidden rounded-2xl border-8 border-white bg-chocolate-100 shadow-xl shadow-chocolate-900/10 sm:border-[10px]">
                    <img src="{{ $pageContent->imageUrl('dining_image_three') }}"
                        alt="Beautifully presented dining table" class="h-full w-full object-cover transition duration-700 hover:scale-105">
                </figure>
            </div>

            <div class="reveal text-center">
                <p class="section-label">{{ $pageContent->value('dining_label') }}</p>
                <h2 class="mt-4 font-serif text-4xl font-semibold uppercase leading-tight tracking-[0.04em] text-chocolate-900 sm:text-5xl lg:text-6xl">
                    {{ $pageContent->value('dining_heading') }}
                </h2>
                <p class="mx-auto mt-7 max-w-xl text-base leading-8 text-neutral-600 sm:text-lg">
                    {{ $pageContent->value('dining_description') }}
                </p>
                <a href="{{ route('dining') }}" class="btn-secondary mt-9 uppercase tracking-[0.14em]">
                    Learn More
                </a>
            </div>
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
                                        <img src="{{ $partnerLogo }}" alt="{{ $isDuplicate ? '' : $partner->name.' logo' }}" class="max-h-16 max-w-full object-contain grayscale opacity-70 transition duration-300 hover:grayscale-0 hover:opacity-100">
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
                            <figcaption class="mt-7 text-sm text-neutral-500">
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
        $encodedAddress = rawurlencode($siteSettings->address);
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
                    @php
                        $directionsHref = $siteSettings->directions_url
                            ?: 'https://www.google.com/maps/search/?api=1&query='.urlencode($siteSettings->address);
                    @endphp
                    <a href="{{ $directionsHref }}" target="_blank" rel="noopener" class="btn-primary uppercase tracking-[0.12em]">
                        Get Directions
                    </a>
                    <a href="mailto:{{ $siteSettings->email }}" class="btn-secondary uppercase tracking-[0.12em]">
                        Contact Us
                    </a>
                </div>
            </div>

            <div class="reveal min-h-[24rem] overflow-hidden rounded-2xl border-8 border-white/90 bg-white shadow-2xl shadow-black/20 sm:min-h-[30rem] [&>iframe]:h-full [&>iframe]:min-h-[24rem] [&>iframe]:w-full [&>iframe]:sm:min-h-[30rem]">
                @if ($siteSettings->map_embed)
                    {!! $siteSettings->map_embed !!}
                @else
                    <iframe
                        src="https://www.google.com/maps?q={{ $encodedAddress }}&amp;output=embed"
                        title="Map showing {{ $siteSettings->address }}"
                        class="h-full min-h-[24rem] w-full sm:min-h-[30rem]"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        allowfullscreen></iframe>
                @endif
            </div>
        </div>
    </section>
</x-layouts.home>
