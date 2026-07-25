@props(['experience'])

<article class="card-luxe reveal overflow-hidden">
    <a href="{{ route('experiences.show', $experience) }}" class="block">
        <div class="relative h-56 overflow-hidden">
            <img src="{{ $experience->coverImageUrl() }}" alt="{{ $experience->name }}"
                class="h-full w-full object-cover transition duration-500 hover:scale-105">
            <span class="absolute left-4 top-4 rounded-full bg-chocolate-900/80 px-3 py-1 text-xs font-medium text-gold-400 backdrop-blur">{{ $experience->category }}</span>
        </div>
        <div class="p-7">
            <h3 class="text-lg font-semibold text-chocolate-800">{{ $experience->name }}</h3>
            <p class="mt-2 line-clamp-2 text-sm leading-relaxed text-neutral-500">{{ Str::limit($experience->description, 130) }}</p>
            <div class="mt-4 flex items-center justify-between text-sm">
                <span class="text-neutral-500">{{ $experience->duration }}</span>
                <span class="font-semibold text-chocolate-700">
                    {{ $experience->price !== null ? \App\Support\Currency::format($experience->price).' pp' : 'Complimentary' }}
                </span>
            </div>
        </div>
    </a>
</article>
