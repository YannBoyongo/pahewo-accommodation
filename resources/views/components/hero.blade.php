{{-- Full-width hero (nav is now in the shared public-header) --}}
<section class="relative flex min-h-[92vh] flex-col items-center justify-center bg-chocolate-950">
    <img src="{{ $heroSection->backgroundImageUrl() }}"
        alt="{{ $heroSection->image_alt ?? 'Homepage hero background' }}" class="absolute inset-0 h-full w-full object-cover">
    <div class="absolute inset-0 bg-gradient-to-b from-chocolate-950/20 via-chocolate-950/5 to-chocolate-950/35"></div>

    {{-- Centered hero content --}}
    <div class="relative z-10 flex flex-1 flex-col items-center justify-center px-6 pb-16 pt-16 text-center lg:px-10">
        <div class="pointer-events-none absolute inset-x-0 top-1/2 h-[70%] max-h-[32rem] -translate-y-1/2 bg-[radial-gradient(ellipse_at_center,rgba(40,49,34,0.45)_0%,transparent_72%)]"></div>

        <p class="reveal relative mt-4 text-sm font-bold uppercase tracking-[0.28em] text-gold-300 hero-text-shadow sm:text-base">
            {{ $heroSection->label }}
        </p>
        <h1 class="reveal relative mt-4 max-w-4xl font-serif text-4xl font-bold leading-none text-white hero-text-shadow sm:text-5xl md:text-6xl lg:text-7xl">
            {{ $heroSection->heading }}
        </h1>
        <p class="reveal relative mx-auto mt-8 max-w-3xl text-base font-semibold leading-relaxed text-white/95 hero-text-shadow sm:text-lg">
            {{ $heroSection->description }}
        </p>
        <a href="{{ route('booking-inquiry.create') }}" class="btn-gold reveal relative mt-9 px-8 py-4 uppercase tracking-[0.16em]">
            Book Now
        </a>
    </div>
</section>
