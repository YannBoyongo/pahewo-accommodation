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
            <div class="reveal overflow-hidden rounded-2xl shadow-xl shadow-chocolate-900/10">
                <img src="{{ $pageContent->imageUrl('restaurant_image') }}"
                    alt="A beautifully presented restaurant table" class="aspect-[4/3] h-full w-full object-cover transition duration-700 hover:scale-105">
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
                    <img src="{{ $pageContent->imageUrl('cafeteria_image_one') }}"
                        alt="Freshly prepared coffee" class="h-80 w-full rounded-2xl object-cover shadow-lg sm:h-96">
                    <img src="{{ $pageContent->imageUrl('cafeteria_image_two') }}"
                        alt="Comfortable cafeteria seating" class="mt-10 h-80 w-full rounded-2xl object-cover shadow-lg sm:h-96">
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

</x-layouts.app>
