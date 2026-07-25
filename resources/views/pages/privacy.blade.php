<x-layouts.app>
    <x-slot:title>Privacy Policy</x-slot:title>

    {{-- Header --}}
    <section class="bg-chocolate-900 py-20">
        <div class="mx-auto max-w-3xl px-6 text-center lg:px-8">
            <p class="section-label text-terracotta-400">{{ $pageContent->value('header_label') }}</p>
            <h1 class="mt-3 font-serif text-4xl font-semibold text-white sm:text-5xl">
                {{ $pageContent->value('header_title') }}
            </h1>
            <p class="mx-auto mt-5 max-w-xl text-base leading-relaxed text-white/60">
                {{ $pageContent->value('header_description') }}
            </p>
            <p class="mt-6 text-xs font-semibold uppercase tracking-[0.2em] text-white/30">
                Last updated: {{ $pageContent->value('last_updated') }}
            </p>
        </div>
    </section>

    {{-- Content --}}
    <section class="bg-white py-16 sm:py-20">
        <div class="mx-auto max-w-3xl px-6 lg:px-8">

            {{-- Table of contents --}}
            <nav class="mb-14 rounded-2xl border border-chocolate-100 bg-beige p-6">
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-chocolate-500">Contents</p>
                <ol class="mt-4 space-y-2 text-sm text-chocolate-700">
                    <li><a href="#introduction"            class="hover:text-terracotta-500 transition">1. Introduction</a></li>
                    <li><a href="#data-collected"          class="hover:text-terracotta-500 transition">2. What data we collect</a></li>
                    <li><a href="#data-use"                class="hover:text-terracotta-500 transition">3. How we use your data</a></li>
                    <li><a href="#legal-basis"             class="hover:text-terracotta-500 transition">4. Legal basis for processing</a></li>
                    <li><a href="#cookies"                 class="hover:text-terracotta-500 transition">5. Cookies</a></li>
                    <li><a href="#third-parties"           class="hover:text-terracotta-500 transition">6. Third parties</a></li>
                    <li><a href="#data-retention"          class="hover:text-terracotta-500 transition">7. Data retention</a></li>
                    <li><a href="#your-rights"             class="hover:text-terracotta-500 transition">8. Your rights</a></li>
                    <li><a href="#contact-complaints"      class="hover:text-terracotta-500 transition">9. Contact &amp; complaints</a></li>
                </ol>
            </nav>

            {{-- Sections --}}
            @php
                $sections = [
                    ['id' => 'introduction',       'number' => '1.', 'title' => 'Introduction',                'field' => 'intro_body'],
                    ['id' => 'data-collected',     'number' => '2.', 'title' => 'What data we collect',        'field' => 'data_collected_body'],
                    ['id' => 'data-use',           'number' => '3.', 'title' => 'How we use your data',        'field' => 'data_use_body'],
                    ['id' => 'legal-basis',        'number' => '4.', 'title' => 'Legal basis for processing',  'field' => 'legal_basis_body'],
                    ['id' => 'cookies',            'number' => '5.', 'title' => 'Cookies',                     'field' => 'cookies_body'],
                    ['id' => 'third-parties',      'number' => '6.', 'title' => 'Third parties',               'field' => 'third_parties_body'],
                    ['id' => 'data-retention',     'number' => '7.', 'title' => 'Data retention',              'field' => 'retention_body'],
                    ['id' => 'your-rights',        'number' => '8.', 'title' => 'Your rights',                 'field' => 'rights_body'],
                    ['id' => 'contact-complaints', 'number' => '9.', 'title' => 'Contact &amp; complaints',    'field' => 'contact_body'],
                ];
            @endphp

            <div class="space-y-14">
                @foreach ($sections as $section)
                    <div id="{{ $section['id'] }}" class="scroll-mt-24">
                        <div class="flex items-baseline gap-3">
                            <span class="font-serif text-2xl font-semibold text-terracotta-500">{{ $section['number'] }}</span>
                            <h2 class="font-serif text-2xl font-semibold text-chocolate-800">{!! $section['title'] !!}</h2>
                        </div>
                        <div class="mt-4 h-px bg-chocolate-100"></div>
                        <div class="prose-policy mt-5 whitespace-pre-line text-sm leading-relaxed text-neutral-600">
                            {{ $pageContent->value($section['field']) }}
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Back to top --}}
            <div class="mt-16 flex items-center justify-between border-t border-chocolate-100 pt-8">
                <a href="{{ route('home') }}" class="text-sm font-semibold text-chocolate-700 hover:text-terracotta-500 transition">
                    ← Back to Home
                </a>
                <a href="#" class="text-sm font-semibold text-chocolate-700 hover:text-terracotta-500 transition">
                    Back to top ↑
                </a>
            </div>
        </div>
    </section>

</x-layouts.app>
