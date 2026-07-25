<x-layouts.app>
    <x-slot:title>{{ $experience->name }}</x-slot:title>
    <x-slot:description>{{ Str::limit(strip_tags($experience->description), 155) }}</x-slot:description>
    <x-slot:ogImage>{{ $experience->coverImageUrl() }}</x-slot:ogImage>

    <section class="relative h-[55vh] min-h-[400px] overflow-hidden bg-chocolate-900">
        <img src="{{ $experience->coverImageUrl() }}" alt="{{ $experience->name }}" class="absolute inset-0 h-full w-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-chocolate-950/90 via-chocolate-950/20 to-chocolate-950/40"></div>
        <div class="absolute inset-x-0 bottom-0">
            <div class="mx-auto max-w-7xl px-6 pb-12 lg:px-8">
                <span class="rounded-full bg-gold-500 px-3 py-1 text-xs font-semibold text-chocolate-900">{{ $experience->category }}</span>
                <h1 class="mt-4 text-4xl font-semibold text-white sm:text-5xl">{{ $experience->name }}</h1>
            </div>
        </div>
    </section>

    <section class="bg-white py-16">
        <div class="mx-auto grid max-w-7xl gap-14 px-6 lg:grid-cols-3 lg:px-8">
            <div class="lg:col-span-2">
                <div class="reveal space-y-5 text-base leading-relaxed text-neutral-600">
                    @foreach (explode("\n\n", $experience->description) as $paragraph)
                        <p>{{ $paragraph }}</p>
                    @endforeach
                </div>
            </div>
            <aside class="reveal">
                <div class="card-luxe p-8 hover:translate-y-0">
                    <p class="text-xs font-semibold uppercase tracking-[0.25em] text-gold-600">Details</p>
                    <dl class="mt-5 space-y-4 text-sm">
                        <div class="flex justify-between">
                            <dt class="text-neutral-500">Duration</dt>
                            <dd class="font-medium text-chocolate-800">{{ $experience->duration }}</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt class="text-neutral-500">Price</dt>
                            <dd class="font-medium text-chocolate-800">
                                {{ $experience->price !== null ? \App\Support\Currency::format($experience->price).' per person' : 'Complimentary' }}
                            </dd>
                        </div>
                        <div class="flex justify-between">
                            <dt class="text-neutral-500">Category</dt>
                            <dd class="font-medium text-chocolate-800">{{ $experience->category }}</dd>
                        </div>
                    </dl>
                    <p class="mt-6 rounded-xl bg-beige p-4 text-xs leading-relaxed text-neutral-500">
                        Experiences are arranged by our concierge during your stay — just mention it at
                        booking or ask any time, day or night.
                    </p>
                    <a href="{{ route('rooms.index') }}" class="btn-primary mt-6 w-full">Book a Stay</a>
                </div>
            </aside>
        </div>
    </section>

    @if ($otherExperiences->isNotEmpty())
        <section class="bg-beige py-20">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <x-section-heading label="Keep exploring" title="More Ways into the Culture" />
                <div class="mt-12 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($otherExperiences as $otherExperience)
                        <x-experience-card :experience="$otherExperience" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</x-layouts.app>
