<x-layouts.app>
    <x-slot:title>Cultural Experiences</x-slot:title>
    <x-slot:description>{{ $pageContent->value('header_description', 'Artisan tours, wellness circles, adventures, and cultural evenings in Uganda curated with the communities who host them.') }}</x-slot:description>
    <x-slot:ogImage>{{ $pageContent->imageUrl('header_image') ?: 'https://images.unsplash.com/photo-1516280440614-37939bbacd81?q=80&w=1200&auto=format&fit=crop' }}</x-slot:ogImage>

    <x-page-header
        :label="$pageContent->value('header_label')"
        :title="$pageContent->value('header_title')"
        :description="$pageContent->value('header_description')"
        :image="$pageContent->imageUrl('header_image')" />

    <section class="bg-beige py-20">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($experiences as $experience)
                    <x-experience-card :experience="$experience" />
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-white py-20">
        <div class="mx-auto max-w-4xl px-6 text-center lg:px-8">
            <p class="section-label reveal">{{ $pageContent->value('cta_label') }}</p>
            <h2 class="reveal mt-3 text-3xl font-semibold text-chocolate-800">{{ $pageContent->value('cta_title') }}</h2>
            <p class="reveal mx-auto mt-4 max-w-xl text-neutral-500">
                {{ $pageContent->value('cta_description') }}
            </p>
            <a href="{{ route('rooms.index') }}" class="btn-primary reveal mt-8">Book a Stay to Join</a>
        </div>
    </section>
</x-layouts.app>
