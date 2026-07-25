<x-layouts.app>
    <x-slot:title>About PAHEWO</x-slot:title>
    <x-slot:description>{{ $pageContent->value('header_description', 'Learn about PAHEWO — the Pan African Holistic Endometriosis Wellness Organisation — and how your stay funds 24/7 care for women in Uganda.') }}</x-slot:description>
    <x-slot:ogImage>{{ $pageContent->imageUrl('header_image') ?: 'https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?q=80&w=1200&auto=format&fit=crop' }}</x-slot:ogImage>

    <x-page-header
        :label="$pageContent->value('header_label')"
        :title="$pageContent->value('header_title')"
        :description="$pageContent->value('header_description')"
        :image="$pageContent->imageUrl('header_image')" />

    {{-- Section 1: text left, photo right --}}
    <section class="bg-white py-24">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="grid items-center gap-14 lg:grid-cols-2">
                <div class="reveal">
                    <p class="section-label">{{ $pageContent->value('section_one_label') }}</p>
                    <h2 class="mt-3 text-3xl font-semibold text-chocolate-800 sm:text-4xl">
                        {{ $pageContent->value('section_one_title') }}
                    </h2>
                    <div class="mt-6 space-y-5 text-base leading-relaxed text-neutral-600 whitespace-pre-line">
                        {{ $pageContent->value('section_one_body') }}
                    </div>
                </div>
                <div class="reveal">
                    <div class="aspect-[4/3] overflow-hidden rounded-2xl shadow-lg">
                        <img
                            src="{{ $pageContent->imageUrl('section_one_image') ?: 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?q=80&w=1200&auto=format&fit=crop' }}"
                            alt="{{ $pageContent->value('section_one_title') }}"
                            class="h-full w-full object-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Section 2: photo left, text right --}}
    <section class="bg-beige py-24">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="grid items-center gap-14 lg:grid-cols-2">
                <div class="reveal order-2 lg:order-1">
                    <div class="aspect-[4/3] overflow-hidden rounded-2xl shadow-lg">
                        <img
                            src="{{ $pageContent->imageUrl('section_two_image') ?: 'https://images.unsplash.com/photo-1559757148-5c350d0d3c56?q=80&w=1200&auto=format&fit=crop' }}"
                            alt="{{ $pageContent->value('section_two_title') }}"
                            class="h-full w-full object-cover">
                    </div>
                </div>
                <div class="reveal order-1 lg:order-2">
                    <p class="section-label">{{ $pageContent->value('section_two_label') }}</p>
                    <h2 class="mt-3 text-3xl font-semibold text-chocolate-800 sm:text-4xl">
                        {{ $pageContent->value('section_two_title') }}
                    </h2>
                    <div class="mt-6 space-y-5 text-base leading-relaxed text-neutral-600 whitespace-pre-line">
                        {{ $pageContent->value('section_two_body') }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Section 3: text left, photo right --}}
    <section class="bg-white py-24">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="grid items-center gap-14 lg:grid-cols-2">
                <div class="reveal">
                    <p class="section-label">{{ $pageContent->value('section_three_label') }}</p>
                    <h2 class="mt-3 text-3xl font-semibold text-chocolate-800 sm:text-4xl">
                        {{ $pageContent->value('section_three_title') }}
                    </h2>
                    <div class="mt-6 space-y-5 text-base leading-relaxed text-neutral-600 whitespace-pre-line">
                        {{ $pageContent->value('section_three_body') }}
                    </div>
                    <a href="https://www.pahewo.org" target="_blank" rel="noopener"
                        class="btn-primary reveal mt-9 inline-flex items-center gap-2">
                        Visit pahewo.org
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/></svg>
                    </a>
                </div>
                <div class="reveal">
                    <div class="aspect-[4/3] overflow-hidden rounded-2xl shadow-lg">
                        <img
                            src="{{ $pageContent->imageUrl('section_three_image') ?: 'https://images.unsplash.com/photo-1590490360182-c33d57733427?q=80&w=1200&auto=format&fit=crop' }}"
                            alt="{{ $pageContent->value('section_three_title') }}"
                            class="h-full w-full object-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layouts.app>
