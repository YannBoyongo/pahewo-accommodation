@props(['room', 'variant' => 'card'])

@if ($variant === 'featured')
    <article class="reveal flex h-full flex-col items-center text-center">
        <a href="{{ route('rooms.show', $room) }}" class="group block w-full overflow-hidden rounded-xl bg-chocolate-100 shadow-sm" aria-label="View {{ $room->name }}">
            <div class="aspect-[4/3] overflow-hidden">
                <img src="{{ $room->coverImageUrl() }}" alt="{{ $room->name }}"
                    class="h-full w-full object-cover transition duration-700 group-hover:scale-105">
            </div>
        </a>

        <div class="flex flex-1 flex-col items-center pt-6">
            <h3 class="font-serif text-2xl font-semibold uppercase tracking-[0.03em] text-chocolate-900">
                {{ $room->name }}
            </h3>
            <p class="mt-4 max-w-sm text-sm leading-7 text-neutral-600 sm:text-base">
                {{ Str::limit(Str::before($room->description, "\n"), 150) }}
            </p>
            <p class="mt-auto pt-5 font-serif text-2xl font-semibold text-chocolate-800">
                {{ \App\Support\Currency::format($room->price_per_night) }} <span class="text-lg">Per Night</span>
            </p>
            <a href="{{ route('rooms.show', $room) }}" class="btn-primary mt-7 px-8 uppercase tracking-[0.12em]">
                View Details
            </a>
        </div>
    </article>
@else
<article class="card-luxe reveal overflow-hidden">
    <a href="{{ route('rooms.show', $room) }}" class="block">
        <div class="relative h-64 overflow-hidden">
            <img src="{{ $room->coverImageUrl() }}" alt="{{ $room->name }}"
                class="h-full w-full object-cover transition duration-500 hover:scale-105">
            @if ($room->is_featured)
                <span class="absolute left-4 top-4 rounded-full bg-gold-500 px-3 py-1 text-xs font-semibold text-chocolate-900">Guest favourite</span>
            @endif
        </div>
        <div class="p-7">
            <div class="flex items-start justify-between gap-4">
                <div>
                    <h3 class="text-lg font-semibold text-chocolate-800">{{ $room->name }}</h3>
                    <p class="mt-1 text-sm text-neutral-500">{{ $room->tagline }}</p>
                </div>
                <p class="shrink-0 text-right">
                    <span class="text-xl font-semibold text-chocolate-700">{{ \App\Support\Currency::format($room->price_per_night) }}</span>
                    <span class="block text-xs text-neutral-400">per night</span>
                </p>
            </div>
            <div class="mt-4 flex flex-wrap gap-x-4 gap-y-1 text-xs text-neutral-500">
                <span>{{ $room->capacity }} {{ Str::plural('guest', $room->capacity) }}</span>
                @if ($room->size_sqm)<span>·</span><span>{{ $room->size_sqm }} m²</span>@endif
                @if ($room->bed_setup)<span>·</span><span>{{ $room->bed_setup }}</span>@endif
            </div>
        </div>
    </a>
</article>
@endif
