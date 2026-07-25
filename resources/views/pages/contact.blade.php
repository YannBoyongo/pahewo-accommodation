<x-layouts.app>
    <x-slot:title>Contact</x-slot:title>
    <x-slot:description>{{ $pageContent->value('header_description', 'Get in touch with Endo Wellness Accommodation in Kampala, Uganda. We are happy to assist with reservations, dining, conferences, and directions.') }}</x-slot:description>
    <x-slot:ogImage>{{ $pageContent->imageUrl('header_image') ?: 'https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=1200&auto=format&fit=crop' }}</x-slot:ogImage>

    <x-page-header
        :label="$pageContent->value('header_label')"
        :title="$pageContent->value('header_title')"
        :description="$pageContent->value('header_description')"
        :image="$pageContent->imageUrl('header_image')" />

    @php
        $phoneLink      = preg_replace('/[^0-9+]/', '', $siteSettings->phone);
        $encodedAddress = rawurlencode($siteSettings->address);
        $directionsHref = $siteSettings->directions_url
            ?: 'https://www.google.com/maps/search/?api=1&query='.$encodedAddress;
    @endphp

    <section class="bg-white py-20 sm:py-24">
        <div class="mx-auto grid max-w-7xl gap-12 px-6 lg:grid-cols-[0.8fr_1.2fr] lg:gap-16 lg:px-8">
            <div class="reveal">
                <p class="section-label">{{ $pageContent->value('section_label') }}</p>
                <h2 class="mt-4 font-serif text-4xl font-semibold text-chocolate-900 sm:text-5xl">{{ $pageContent->value('section_title') }}</h2>
                <p class="mt-5 max-w-xl text-base leading-8 text-neutral-600">
                    {{ $pageContent->value('section_description') }}
                </p>

                <div class="mt-9 space-y-4">
                    <a href="tel:{{ $phoneLink }}" class="group flex items-center gap-5 rounded-2xl bg-beige p-5 ring-1 ring-chocolate-100 transition hover:-translate-y-0.5 hover:shadow-lg">
                        <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-chocolate-700 text-white">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"/></svg>
                        </span>
                        <span>
                            <span class="block text-xs font-semibold uppercase tracking-[0.16em] text-neutral-400">Call Us</span>
                            <span class="mt-1 block font-semibold text-chocolate-800 group-hover:text-gold-600">{{ $siteSettings->phone }}</span>
                        </span>
                    </a>

                    <a href="mailto:{{ $siteSettings->email }}" class="group flex items-center gap-5 rounded-2xl bg-beige p-5 ring-1 ring-chocolate-100 transition hover:-translate-y-0.5 hover:shadow-lg">
                        <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-chocolate-700 text-white">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5A2.25 2.25 0 0 1 19.5 19.5h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0-8.19 5.118a3 3 0 0 1-3.12 0L2.25 6.75"/></svg>
                        </span>
                        <span class="min-w-0">
                            <span class="block text-xs font-semibold uppercase tracking-[0.16em] text-neutral-400">Email Us</span>
                            <span class="mt-1 block truncate font-semibold text-chocolate-800 group-hover:text-gold-600">{{ $siteSettings->email }}</span>
                        </span>
                    </a>

                    <a href="{{ $directionsHref }}" target="_blank" rel="noopener" class="group flex items-center gap-5 rounded-2xl bg-beige p-5 ring-1 ring-chocolate-100 transition hover:-translate-y-0.5 hover:shadow-lg">
                        <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-chocolate-700 text-white">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21s6.75-5.25 6.75-11.25a6.75 6.75 0 1 0-13.5 0C5.25 15.75 12 21 12 21Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M14.25 9.75a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"/></svg>
                        </span>
                        <span>
                            <span class="block text-xs font-semibold uppercase tracking-[0.16em] text-neutral-400">Visit Us</span>
                            <span class="mt-1 block font-semibold text-chocolate-800 group-hover:text-gold-600">{{ $siteSettings->address }}</span>
                        </span>
                    </a>
                </div>
            </div>

            <div class="reveal min-h-[30rem] overflow-hidden rounded-2xl border-8 border-beige bg-white shadow-xl shadow-chocolate-900/10 [&>iframe]:h-full [&>iframe]:min-h-[30rem] [&>iframe]:w-full">
                @if ($siteSettings->map_embed)
                    {!! $siteSettings->map_embed !!}
                @else
                    <iframe
                        src="https://www.google.com/maps?q={{ $encodedAddress }}&amp;output=embed"
                        title="Map showing {{ $siteSettings->address }}"
                        class="h-full min-h-[30rem] w-full"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        allowfullscreen></iframe>
                @endif
            </div>
        </div>
    </section>
</x-layouts.app>
