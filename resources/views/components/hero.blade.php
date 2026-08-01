@php
    $slides = $heroSlides ?? collect();
    $slideCount = $slides->count();
@endphp

<section
    class="relative flex min-h-[92vh] flex-col items-center justify-center overflow-hidden bg-chocolate-950"
    @if ($slideCount > 1)
        x-data="{
            active: 0,
            count: {{ $slideCount }},
            timer: null,
            start() {
                this.stop();
                this.timer = setInterval(() => {
                    this.active = (this.active + 1) % this.count;
                }, 7000);
            },
            stop() {
                if (this.timer) {
                    clearInterval(this.timer);
                    this.timer = null;
                }
            },
            go(index) {
                this.active = index;
                this.start();
            },
            next() {
                this.go((this.active + 1) % this.count);
            },
            prev() {
                this.go((this.active - 1 + this.count) % this.count);
            },
        }"
        x-init="start()"
        @mouseenter="stop()"
        @mouseleave="start()"
    @endif
>
    @forelse ($slides as $slide)
        <div
            class="absolute inset-0"
            @if ($slideCount > 1)
                x-show="active === {{ $loop->index }}"
                x-transition:enter="transition ease-out duration-700"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-500"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                @if (! $loop->first) x-cloak @endif
            @endif
        >
            <img
                src="{{ $slide->backgroundImageUrl() }}"
                alt="{{ $slide->image_alt ?? 'Homepage hero background' }}"
                class="absolute inset-0 h-full w-full object-cover"
            >
            <div class="absolute inset-0 bg-gradient-to-b from-chocolate-950/20 via-chocolate-950/5 to-chocolate-950/35"></div>

            <div class="relative z-10 flex min-h-[92vh] flex-col items-center justify-center px-6 pb-20 pt-16 text-center lg:px-10">
                <div class="pointer-events-none absolute inset-x-0 top-1/2 h-[70%] max-h-[32rem] -translate-y-1/2 bg-[radial-gradient(ellipse_at_center,rgba(40,49,34,0.45)_0%,transparent_72%)]"></div>

                <p class="relative mt-4 text-sm font-bold uppercase tracking-[0.28em] text-gold-300 hero-text-shadow sm:text-base">
                    {{ $slide->label }}
                </p>
                <h1 class="relative mt-4 max-w-4xl font-serif text-4xl font-bold leading-none text-white hero-text-shadow sm:text-5xl md:text-6xl lg:text-7xl">
                    {{ $slide->heading }}
                </h1>
                <p class="relative mx-auto mt-8 max-w-3xl text-base font-semibold leading-relaxed text-white/95 hero-text-shadow sm:text-lg">
                    {{ $slide->description }}
                </p>
                <a href="{{ route('booking-inquiry.create') }}" class="btn-gold relative mt-9 px-8 py-4 uppercase tracking-[0.16em]">
                    Book Now
                </a>
            </div>
        </div>
    @empty
        <div class="relative z-10 flex min-h-[92vh] flex-col items-center justify-center px-6 text-center">
            <h1 class="font-serif text-4xl font-bold text-white">Help Heal with Us</h1>
            <a href="{{ route('booking-inquiry.create') }}" class="btn-gold mt-9 px-8 py-4 uppercase tracking-[0.16em]">Book Now</a>
        </div>
    @endforelse

    @if ($slideCount > 1)
        <button
            type="button"
            class="absolute left-4 top-1/2 z-20 hidden -translate-y-1/2 rounded-full border border-white/30 bg-chocolate-950/40 p-3 text-white backdrop-blur transition hover:bg-chocolate-950/60 focus:outline-none focus:ring-2 focus:ring-gold-400 sm:inline-flex"
            x-on:click="prev()"
            aria-label="Previous hero slide"
        >
            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5"/></svg>
        </button>
        <button
            type="button"
            class="absolute right-4 top-1/2 z-20 hidden -translate-y-1/2 rounded-full border border-white/30 bg-chocolate-950/40 p-3 text-white backdrop-blur transition hover:bg-chocolate-950/60 focus:outline-none focus:ring-2 focus:ring-gold-400 sm:inline-flex"
            x-on:click="next()"
            aria-label="Next hero slide"
        >
            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/></svg>
        </button>

        <div class="absolute bottom-8 left-0 right-0 z-20 flex items-center justify-center gap-3" role="group" aria-label="Choose a hero slide">
            @foreach ($slides as $slide)
                <button
                    type="button"
                    x-on:click="go({{ $loop->index }})"
                    class="h-2.5 w-2.5 rounded-full border border-white/70 transition focus:outline-none focus:ring-2 focus:ring-gold-400 focus:ring-offset-2 focus:ring-offset-chocolate-950"
                    :class="active === {{ $loop->index }} ? 'bg-gold-400 border-gold-400' : 'bg-transparent hover:bg-white/40'"
                    :aria-current="active === {{ $loop->index }} ? 'true' : 'false'"
                    aria-label="Show hero slide {{ $loop->iteration }}"
                ></button>
            @endforeach
        </div>
    @endif
</section>
