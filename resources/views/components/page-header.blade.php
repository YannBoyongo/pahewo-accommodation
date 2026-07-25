@props(['label', 'title', 'description' => null, 'image' => null])

<section class="relative overflow-hidden bg-chocolate-900 pb-20 pt-40">
    @if ($image)
        <img src="{{ $image }}" alt="" class="absolute inset-0 h-full w-full object-cover opacity-25">
        <div class="absolute inset-0 bg-gradient-to-b from-chocolate-950/60 to-chocolate-900"></div>
    @endif
    <div class="relative mx-auto max-w-7xl px-6 lg:px-8">
        <p class="section-label">{{ $label }}</p>
        <h1 class="mt-3 max-w-3xl text-4xl font-semibold leading-tight text-white sm:text-5xl">{{ $title }}</h1>
        @if ($description)
            <p class="mt-5 max-w-2xl text-base leading-relaxed text-white/70">{{ $description }}</p>
        @endif
    </div>
</section>
