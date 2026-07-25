<x-layouts.app>
    <x-slot:title>Rooms &amp; Suites</x-slot:title>
    <x-slot:description>{{ $pageContent->value('header_description', 'Browse our boutique rooms and suites in Kampala. Every night funds 24/7 endometriosis care for women in Uganda through PAHEWO.') }}</x-slot:description>
    <x-slot:ogImage>{{ $pageContent->imageUrl('header_image') ?: 'https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=1200&auto=format&fit=crop' }}</x-slot:ogImage>

    <x-page-header
        :label="$pageContent->value('header_label')"
        :title="$pageContent->value('header_title')"
        :description="$pageContent->value('header_description')"
        :image="$pageContent->imageUrl('header_image')" />

    <section class="bg-beige py-20">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($rooms as $room)
                    <x-room-card :room="$room" />
                @endforeach
            </div>
        </div>
    </section>

</x-layouts.app>
