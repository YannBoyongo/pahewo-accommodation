<x-layouts.app>
    <x-slot:title>Our Story</x-slot:title>
    <x-slot:description>{{ $pageContent->value('header_description', 'Hospitality with purpose - a boutique stay in Kampala where every booking sustains 24/7 endometriosis care through PAHEWO.') }}</x-slot:description>
    <x-slot:ogImage>{{ $pageContent->imageUrl('header_image') ?: 'https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=1200&auto=format&fit=crop' }}</x-slot:ogImage>

    <x-page-header
        :label="$pageContent->value('header_label')"
        :title="$pageContent->value('header_title')"
        :description="$pageContent->value('header_description')"
        :image="$pageContent->imageUrl('header_image')" />

    <section class="bg-white py-24">
        <div class="mx-auto max-w-3xl px-6 lg:px-8">
            <div class="reveal">
                <p class="section-label">{{ $pageContent->value('section_label') }}</p>
                <h2 class="mt-3 text-3xl font-semibold text-chocolate-800 sm:text-4xl">
                    {{ $pageContent->value('section_title') }}
                </h2>
                <div class="prose prose-chocolate mt-8 max-w-none text-base leading-relaxed text-neutral-600 [&_a]:text-terracotta-500 [&_h2]:text-chocolate-800 [&_h3]:text-chocolate-800 [&_li]:marker:text-terracotta-500 [&_strong]:text-chocolate-800">
                    {!! $pageContent->value('section_body') !!}
                </div>
                <div class="mt-10 flex flex-wrap gap-4">
                    <a href="{{ route('about-pahewo') }}" class="btn-primary">Who We Are</a>
                    <a href="{{ route('rooms.index') }}" class="btn-secondary">Explore Rooms</a>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
