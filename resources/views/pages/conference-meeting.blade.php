<x-layouts.app>
    <x-slot:title>Conference &amp; Meeting</x-slot:title>
    <x-slot:description>{{ $pageContent->value('header_description', 'Flexible meeting and conference facilities in Kampala with reliable Wi-Fi, refreshments, and attentive on-site support.') }}</x-slot:description>
    <x-slot:ogImage>{{ $pageContent->imageUrl('header_image') ?: 'https://images.unsplash.com/photo-1497366754035-f200968a6e72?q=80&w=1200&auto=format&fit=crop' }}</x-slot:ogImage>

    <x-page-header
        :label="$pageContent->value('header_label')"
        :title="$pageContent->value('header_title')"
        :description="$pageContent->value('header_description')"
        :image="$pageContent->imageUrl('header_image')" />

    <section class="bg-white py-20 sm:py-24">
        <div class="mx-auto grid max-w-7xl items-center gap-12 px-6 lg:grid-cols-2 lg:gap-20 lg:px-8">
            <div class="reveal overflow-hidden rounded-2xl shadow-xl shadow-chocolate-900/10">
                <img src="{{ $pageContent->imageUrl('section_image') }}"
                    alt="Bright and comfortable meeting room" class="aspect-[4/3] h-full w-full object-cover">
            </div>

            <div class="reveal">
                <p class="section-label">{{ $pageContent->value('section_label') }}</p>
                <h2 class="mt-4 font-serif text-4xl font-semibold text-chocolate-900 sm:text-5xl">{{ $pageContent->value('section_title') }}</h2>
                <p class="mt-6 text-base leading-8 text-neutral-600">
                    {{ $pageContent->value('section_body') }}
                </p>

                <div class="mt-8 grid gap-4 sm:grid-cols-2">
                    <div class="rounded-xl bg-beige p-5 ring-1 ring-chocolate-100">
                        <p class="font-semibold text-chocolate-800">{{ $pageContent->value('feature_one_title') }}</p>
                        <p class="mt-2 text-sm leading-6 text-neutral-500">{{ $pageContent->value('feature_one_description') }}</p>
                    </div>
                    <div class="rounded-xl bg-beige p-5 ring-1 ring-chocolate-100">
                        <p class="font-semibold text-chocolate-800">{{ $pageContent->value('feature_two_title') }}</p>
                        <p class="mt-2 text-sm leading-6 text-neutral-500">{{ $pageContent->value('feature_two_description') }}</p>
                    </div>
                    <div class="rounded-xl bg-beige p-5 ring-1 ring-chocolate-100">
                        <p class="font-semibold text-chocolate-800">{{ $pageContent->value('feature_three_title') }}</p>
                        <p class="mt-2 text-sm leading-6 text-neutral-500">{{ $pageContent->value('feature_three_description') }}</p>
                    </div>
                    <div class="rounded-xl bg-beige p-5 ring-1 ring-chocolate-100">
                        <p class="font-semibold text-chocolate-800">{{ $pageContent->value('feature_four_title') }}</p>
                        <p class="mt-2 text-sm leading-6 text-neutral-500">{{ $pageContent->value('feature_four_description') }}</p>
                    </div>
                </div>

                <a href="{{ route('contact') }}" class="btn-primary mt-9 uppercase tracking-[0.12em]">
                    Make an Enquiry
                </a>
            </div>
        </div>
    </section>
</x-layouts.app>
