<x-layouts.app>
    <x-slot:title>{{ $room->name }}</x-slot:title>
    <x-slot:description>{{ Str::limit(strip_tags($room->description), 155) }}</x-slot:description>
    <x-slot:ogImage>{{ $room->coverImageUrl() }}</x-slot:ogImage>
    <x-slot:ogType>product</x-slot:ogType>

    @push('schema')
    @php
        $roomSchema = [
            '@context' => 'https://schema.org',
            '@type'    => 'HotelRoom',
            'name'     => $room->name,
            'description' => Str::limit(strip_tags($room->description), 300),
            'image'    => $room->coverImageUrl(),
            'url'      => url()->current(),
            'occupancy' => ['@type' => 'QuantitativeValue', 'maxValue' => $room->capacity],
            'floorSize' => ['@type' => 'QuantitativeValue', 'value' => $room->size_sqm, 'unitCode' => 'MTK'],
            'bed'       => [['@type' => 'BedDetails', 'typeOfBed' => $room->bed_setup]],
            'containedInPlace' => [
                '@type' => 'LodgingBusiness',
                'name'  => 'Endo Wellness Accommodation',
                'url'   => config('app.url'),
            ],
        ];
    @endphp
    <script type="application/ld+json">{!! json_encode($roomSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}</script>
    @endpush

    <section class="relative h-[60vh] min-h-[420px] overflow-hidden bg-chocolate-900">
        <img src="{{ $room->coverImageUrl() }}" alt="{{ $room->name }}" class="absolute inset-0 h-full w-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-chocolate-950/90 via-chocolate-950/20 to-chocolate-950/40"></div>
        <div class="absolute inset-x-0 bottom-0">
            <div class="mx-auto max-w-7xl px-6 pb-12 lg:px-8">
                <p class="section-label">{{ $room->tagline }}</p>
                <h1 class="mt-2 text-4xl font-semibold text-white sm:text-5xl">{{ $room->name }}</h1>
            </div>
        </div>
    </section>

    <section class="bg-white py-16">
        <div class="mx-auto grid max-w-7xl gap-14 px-6 lg:grid-cols-3 lg:px-8">
            <div class="lg:col-span-2">
                <div class="reveal flex flex-wrap gap-6 rounded-2xl bg-beige p-6 text-sm text-chocolate-800">
                    <span class="flex items-center gap-2">
                        <svg class="h-5 w-5 text-chocolate-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"/></svg>
                        Up to {{ $room->capacity }} {{ Str::plural('guest', $room->capacity) }}
                    </span>
                    @if ($room->size_sqm)
                        <span class="flex items-center gap-2">
                            <svg class="h-5 w-5 text-chocolate-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9M3.75 20.25v-4.5m0 4.5h4.5m-4.5 0L9 15M20.25 3.75h-4.5m4.5 0v4.5m0-4.5L15 9m5.25 11.25h-4.5m4.5 0v-4.5m0 4.5L15 15"/></svg>
                            {{ $room->size_sqm }} m²
                        </span>
                    @endif
                    @if ($room->bed_setup)
                        <span class="flex items-center gap-2">
                            <svg class="h-5 w-5 text-chocolate-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12v6.75m0-6.75h19.5m-19.5 0V6a1.5 1.5 0 0 1 1.5-1.5h16.5a1.5 1.5 0 0 1 1.5 1.5v6m0 0v6.75"/></svg>
                            {{ $room->bed_setup }}
                        </span>
                    @endif
                </div>

                <div class="reveal mt-10 space-y-5 text-base leading-relaxed text-neutral-600">
                    @foreach (explode("\n\n", $room->description) as $paragraph)
                        <p>{{ $paragraph }}</p>
                    @endforeach
                </div>

                @if ($room->amenities)
                    <h2 class="reveal mt-12 text-xl font-semibold text-chocolate-800">Amenities</h2>
                    <ul class="reveal mt-5 grid grid-cols-2 gap-3 sm:grid-cols-3">
                        @foreach ($room->amenities as $amenity)
                            <li class="flex items-center gap-2 text-sm text-neutral-600">
                                <svg class="h-4 w-4 shrink-0 text-gold-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                {{ $amenity }}
                            </li>
                        @endforeach
                    </ul>
                @endif

                <div class="reveal mt-12 rounded-2xl bg-chocolate-900 p-8 text-white">
                    <p class="section-label">Your stay's impact</p>
                    <p class="mt-3 text-lg font-medium leading-relaxed">
                        Each night in this room contributes
                        <span class="text-gold-400">{{ \App\Support\Currency::format($room->price_per_night * \App\Models\Booking::IMPACT_SHARE) }}</span>
                        to PAHEWO's 24/7 wellness sanctuary — before any other expense is considered.
                    </p>
                    <a href="{{ route('about-pahewo') }}" class="mt-4 inline-flex items-center gap-2 text-sm font-medium text-gold-400 hover:text-gold-300">
                        Learn about PAHEWO
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
                    </a>
                </div>
            </div>

            <aside class="lg:sticky lg:top-28 lg:self-start">
                <livewire:booking-widget :room="$room" />
            </aside>
        </div>
    </section>

    @if ($otherRooms->isNotEmpty())
        <section class="bg-beige py-20">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <x-section-heading label="Keep exploring" title="Other Rooms You May Love" />
                <div class="mt-12 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($otherRooms as $otherRoom)
                        <x-room-card :room="$otherRoom" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</x-layouts.app>
