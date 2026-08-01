@php
    $restaurantGallery = [
        [
            'url' => $pageContent->imageUrl('restaurant_gallery_one'),
            'alt' => 'Elegant restaurant dining room',
            'classes' => 'absolute left-0 top-0 z-10 h-[52%] w-[62%]',
        ],
        [
            'url' => $pageContent->imageUrl('restaurant_gallery_two'),
            'alt' => 'Warm and inviting restaurant interior',
            'classes' => 'absolute right-0 top-[4%] z-20 h-[50%] w-[58%] border-8 border-white sm:border-[10px]',
        ],
        [
            'url' => $pageContent->imageUrl('restaurant_gallery_three'),
            'alt' => 'Beautifully presented dining table',
            'classes' => 'absolute bottom-[2%] left-0 z-20 h-[48%] w-[58%] border-8 border-white sm:border-[10px]',
        ],
        [
            'url' => $pageContent->imageUrl('restaurant_gallery_four'),
            'alt' => 'Fine dining experience',
            'classes' => 'absolute bottom-0 right-0 z-30 h-[46%] w-[56%] border-8 border-white sm:border-[10px]',
        ],
    ];
@endphp

<x-layouts.app>
    <x-slot:title>Dining</x-slot:title>
    <x-slot:description>{{ $pageContent->value('header_description', 'Fresh Ugandan flavours and warm hospitality — our restaurant and cafeteria serve memorable meals from breakfast to dinner.') }}</x-slot:description>
    <x-slot:ogImage>{{ $pageContent->imageUrl('header_image') ?: 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?q=80&w=1200&auto=format&fit=crop' }}</x-slot:ogImage>

    <x-page-header
        :label="$pageContent->value('header_label')"
        :title="$pageContent->value('header_title')"
        :description="$pageContent->value('header_description')"
        :image="$pageContent->imageUrl('header_image')" />

    <section class="overflow-hidden bg-white py-20 sm:py-24">
        <div class="mx-auto grid max-w-7xl items-center gap-12 px-6 lg:grid-cols-2 lg:gap-20 lg:px-8">
            <div class="reveal relative mx-auto h-[34rem] w-full max-w-3xl sm:h-[40rem] lg:h-[44rem]" aria-label="Restaurant gallery">
                @foreach ($restaurantGallery as $image)
                    <a
                        href="{{ $image['url'] }}"
                        data-fancybox="dining-gallery"
                        data-caption="{{ $image['alt'] }}"
                        @class([
                            $image['classes'],
                            'group overflow-hidden rounded-2xl bg-chocolate-100 shadow-xl shadow-chocolate-900/15 focus:outline-none focus-visible:ring-2 focus-visible:ring-terracotta-500 focus-visible:ring-offset-2',
                        ])
                    >
                        <img
                            src="{{ $image['url'] }}"
                            alt="{{ $image['alt'] }}"
                            class="h-full w-full object-cover transition duration-700 group-hover:scale-105"
                        >
                        <span class="pointer-events-none absolute inset-0 bg-chocolate-950/0 transition duration-300 group-hover:bg-chocolate-950/25"></span>
                        <span class="pointer-events-none absolute inset-0 flex items-center justify-center opacity-0 transition duration-300 group-hover:opacity-100">
                            <span class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-white/40 bg-white/20 text-white backdrop-blur-md">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607ZM10.5 7.5v6m3-3h-6"/>
                                </svg>
                            </span>
                        </span>
                    </a>
                @endforeach
            </div>

            <div class="reveal">
                <p class="section-label">{{ $pageContent->value('restaurant_label') }}</p>
                <h2 class="mt-4 font-serif text-4xl font-semibold text-chocolate-900 sm:text-5xl">{{ $pageContent->value('restaurant_title') }}</h2>
                <p class="mt-6 text-base leading-8 text-neutral-600">
                    {{ $pageContent->value('restaurant_body') }}
                </p>
                <p class="mt-4 text-base leading-8 text-neutral-600">
                    {{ $pageContent->value('restaurant_body_two') }}
                </p>

                <div class="mt-8 grid gap-4 sm:grid-cols-2">
                    <div class="rounded-xl bg-beige p-5 ring-1 ring-chocolate-100">
                        <p class="font-semibold text-chocolate-800">{{ $pageContent->value('restaurant_feature_one_title') }}</p>
                        <p class="mt-2 text-sm leading-6 text-neutral-500">{{ $pageContent->value('restaurant_feature_one_description') }}</p>
                    </div>
                    <div class="rounded-xl bg-beige p-5 ring-1 ring-chocolate-100">
                        <p class="font-semibold text-chocolate-800">{{ $pageContent->value('restaurant_feature_two_title') }}</p>
                        <p class="mt-2 text-sm leading-6 text-neutral-500">{{ $pageContent->value('restaurant_feature_two_description') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="overflow-hidden bg-beige py-20 sm:py-24">
        <div class="mx-auto grid max-w-7xl items-center gap-12 px-6 lg:grid-cols-2 lg:gap-20 lg:px-8">
            <div class="reveal lg:order-2">
                <div class="grid grid-cols-2 gap-4">
                    <a
                        href="{{ $pageContent->imageUrl('cafeteria_image_one') }}"
                        data-fancybox="dining-gallery"
                        data-caption="Freshly prepared coffee"
                        class="group relative overflow-hidden rounded-2xl shadow-lg focus:outline-none focus-visible:ring-2 focus-visible:ring-terracotta-500 focus-visible:ring-offset-2"
                    >
                        <img src="{{ $pageContent->imageUrl('cafeteria_image_one') }}"
                            alt="Freshly prepared coffee" class="h-80 w-full object-cover transition duration-700 group-hover:scale-105 sm:h-96">
                        <span class="pointer-events-none absolute inset-0 bg-chocolate-950/0 transition duration-300 group-hover:bg-chocolate-950/25"></span>
                    </a>
                    <a
                        href="{{ $pageContent->imageUrl('cafeteria_image_two') }}"
                        data-fancybox="dining-gallery"
                        data-caption="Comfortable cafeteria seating"
                        class="group relative mt-10 overflow-hidden rounded-2xl shadow-lg focus:outline-none focus-visible:ring-2 focus-visible:ring-terracotta-500 focus-visible:ring-offset-2"
                    >
                        <img src="{{ $pageContent->imageUrl('cafeteria_image_two') }}"
                            alt="Comfortable cafeteria seating" class="h-80 w-full object-cover transition duration-700 group-hover:scale-105 sm:h-96">
                        <span class="pointer-events-none absolute inset-0 bg-chocolate-950/0 transition duration-300 group-hover:bg-chocolate-950/25"></span>
                    </a>
                </div>
            </div>

            <div class="reveal lg:order-1">
                <p class="section-label">{{ $pageContent->value('cafeteria_label') }}</p>
                <h2 class="mt-4 font-serif text-4xl font-semibold text-chocolate-900 sm:text-5xl">{{ $pageContent->value('cafeteria_title') }}</h2>
                <p class="mt-6 text-base leading-8 text-neutral-600">
                    {{ $pageContent->value('cafeteria_body') }}
                </p>
                <ul class="mt-7 space-y-4 text-sm text-chocolate-800 sm:text-base">
                    <li class="flex items-center gap-3">
                        <span class="h-2 w-2 rounded-full bg-gold-500"></span>
                        {{ $pageContent->value('cafeteria_item_one') }}
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="h-2 w-2 rounded-full bg-gold-500"></span>
                        {{ $pageContent->value('cafeteria_item_two') }}
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="h-2 w-2 rounded-full bg-gold-500"></span>
                        {{ $pageContent->value('cafeteria_item_three') }}
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (typeof Fancybox !== 'undefined') {
                Fancybox.bind('[data-fancybox="dining-gallery"]', {
                    animated: true,
                    showClass: 'fancybox-zoomIn',
                    hideClass: 'fancybox-zoomOut',
                    Carousel: {
                        infinite: true,
                    },
                });
            }
        });
    </script>
</x-layouts.app>
