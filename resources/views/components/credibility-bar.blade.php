@props(['pageContent'])

@php
    $amenities = [
        ['label' => 'Accommodation',                    'icon' => 'bed'],
        ['label' => 'Conference &amp; Meeting',          'icon' => 'conference'],
        ['label' => 'Cafeteria',                        'icon' => 'cafe'],
        ['label' => 'Restaurant',                       'icon' => 'restaurant'],
        ['label' => '24/7 Check-in',                   'icon' => 'checkin'],
        ['label' => 'Free WiFi',                        'icon' => 'wifi'],
        ['label' => 'Parking',                          'icon' => 'parking'],
        ['label' => 'Secure Environment',               'icon' => 'secure'],
    ];
@endphp

<section class="bg-beige py-16">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">

        <div class="mb-10 text-center reveal">
            <p class="section-label">What We Offer</p>
            <h2 class="mt-3 font-serif text-3xl font-semibold text-chocolate-800">Our Facilities</h2>
        </div>

        <div class="grid grid-cols-2 gap-4 sm:grid-cols-4 lg:gap-5">
            @foreach ($amenities as $amenity)
                <div class="reveal group flex flex-col items-center rounded-2xl bg-white px-4 py-8 text-center shadow-sm ring-1 ring-chocolate-100 transition duration-300 hover:-translate-y-1 hover:shadow-md hover:shadow-terracotta-500/10 hover:ring-terracotta-400/30">

                    <span class="flex h-16 w-16 items-center justify-center rounded-full bg-terracotta-500/8 text-terracotta-500 transition duration-300 group-hover:bg-terracotta-500/15">
                        @switch($amenity['icon'])
                            @case('bed')
                                <svg class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 11.25V18h16.5v-6.75M3.75 11.25h16.5M3.75 11.25 5.25 7.5h13.5l1.5 3.75M7.5 11.25V7.5m9 3.75V7.5"/>
                                </svg>
                                @break
                            @case('conference')
                                <svg class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"/>
                                </svg>
                                @break
                            @case('cafe')
                                <svg class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 3.104v5.714a2.25 2.25 0 0 1-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 0 1 4.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0 1 12 16a9.065 9.065 0 0 1-6.23-.693L5 14.5m14.8.8 1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0 1 12 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5"/>
                                </svg>
                                @break
                            @case('restaurant')
                                <svg class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8.25v-1.5m0 1.5c-1.355 0-2.697.056-4.024.166C6.845 8.51 6 9.473 6 10.608v2.513m6-4.87c1.355 0 2.697.055 4.024.165C17.155 8.51 18 9.473 18 10.608v2.513M15 8.25v-1.5m-6 1.5v-1.5m12 9.75-1.5.75a3.354 3.354 0 0 1-3 0 3.354 3.354 0 0 0-3 0 3.354 3.354 0 0 1-3 0 3.354 3.354 0 0 0-3 0 3.354 3.354 0 0 1-3 0L3 16.5m15-3.38a48.474 48.474 0 0 0-6-.37c-2.032 0-4.034.125-6 .37m12 0c.39.049.777.102 1.163.16 1.07.16 1.837 1.094 1.837 2.175v5.169c0 .621-.504 1.125-1.125 1.125H4.125C3.504 22.5 3 22.005 3 21.384v-5.17c0-1.08.768-2.014 1.837-2.174A47.78 47.78 0 0 1 6 13.12M12.265 3.11a.375.375 0 1 1-.53 0 .375.375 0 0 1 .53 0Zm-.002 1.945h-.002"/>
                                </svg>
                                @break
                            @case('checkin')
                                <svg class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>
                                @break
                            @case('wifi')
                                <svg class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.288 15.038a5.25 5.25 0 0 1 7.424 0M5.106 11.856c3.807-3.808 9.98-3.808 13.788 0M1.924 8.674c5.565-5.565 14.587-5.565 20.152 0M12.53 18.22l-.53.53-.53-.53a.75.75 0 0 1 1.06 0Z"/>
                                </svg>
                                @break
                            @case('parking')
                                <svg class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 17V7h4.5a3 3 0 0 1 0 6H9"/>
                                    <rect x="5" y="5" width="14" height="14" rx="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                @break
                            @case('secure')
                                <svg class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z"/>
                                </svg>
                                @break
                        @endswitch
                    </span>

                    <p class="mt-5 text-[11px] font-bold uppercase leading-snug tracking-[0.14em] text-chocolate-700">
                        {!! $amenity['label'] !!}
                    </p>

                </div>
            @endforeach
        </div>
    </div>
</section>
