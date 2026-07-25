<x-layouts.app>
    <x-slot:title>About PAHEWO</x-slot:title>
    <x-slot:description>{{ $pageContent->value('header_description', 'Learn about PAHEWO — the Pan African Holistic Endometriosis Wellness Organisation — and how your stay funds 24/7 care for women in Uganda.') }}</x-slot:description>
    <x-slot:ogImage>{{ $pageContent->imageUrl('header_image') ?: 'https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?q=80&w=1200&auto=format&fit=crop' }}</x-slot:ogImage>

    <x-page-header
        :label="$pageContent->value('header_label')"
        :title="$pageContent->value('header_title')"
        :description="$pageContent->value('header_description')"
        :image="$pageContent->imageUrl('header_image')" />

    <section class="bg-white py-24">
        <div class="mx-auto grid max-w-7xl items-start gap-14 px-6 lg:grid-cols-2 lg:px-8">
            <div>
                <p class="section-label reveal">{{ $pageContent->value('condition_label') }}</p>
                <h2 class="reveal mt-3 text-3xl font-semibold text-chocolate-800">{{ $pageContent->value('condition_title') }}</h2>
                <p class="reveal mt-6 whitespace-pre-line text-base leading-relaxed text-neutral-600">{{ $pageContent->value('condition_body') }}</p>
            </div>
            <div>
                <p class="section-label reveal">{{ $pageContent->value('response_label') }}</p>
                <h2 class="reveal mt-3 text-3xl font-semibold text-chocolate-800">{{ $pageContent->value('response_title') }}</h2>
                <ul class="mt-6 space-y-5">
                    <li class="reveal flex gap-4">
                        <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-beige text-chocolate-700">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"/></svg>
                        </span>
                        <div>
                            <p class="font-semibold text-chocolate-800">{{ $pageContent->value('response_one_title') }}</p>
                            <p class="text-sm leading-relaxed text-neutral-500">{{ $pageContent->value('response_one_description') }}</p>
                        </div>
                    </li>
                    <li class="reveal flex gap-4">
                        <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-beige text-chocolate-700">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75"/></svg>
                        </span>
                        <div>
                            <p class="font-semibold text-chocolate-800">{{ $pageContent->value('response_two_title') }}</p>
                            <p class="text-sm leading-relaxed text-neutral-500">{{ $pageContent->value('response_two_description') }}</p>
                        </div>
                    </li>
                    <li class="reveal flex gap-4">
                        <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-beige text-chocolate-700">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5"/></svg>
                        </span>
                        <div>
                            <p class="font-semibold text-chocolate-800">{{ $pageContent->value('response_three_title') }}</p>
                            <p class="text-sm leading-relaxed text-neutral-500">{{ $pageContent->value('response_three_description') }}</p>
                        </div>
                    </li>
                    <li class="reveal flex gap-4">
                        <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-beige text-chocolate-700">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"/></svg>
                        </span>
                        <div>
                            <p class="font-semibold text-chocolate-800">{{ $pageContent->value('response_four_title') }}</p>
                            <p class="text-sm leading-relaxed text-neutral-500">{{ $pageContent->value('response_four_description') }}</p>
                        </div>
                    </li>
                </ul>
                <a href="https://www.pahewo.org" target="_blank" rel="noopener" class="btn-primary reveal mt-9">Visit pahewo.org</a>
            </div>
        </div>
    </section>

    <section class="bg-chocolate-900 py-24">
        <div class="mx-auto max-w-4xl px-6 text-center lg:px-8">
            <p class="section-label reveal">{{ $pageContent->value('partnership_label') }}</p>
            <h2 class="reveal mt-3 text-3xl font-semibold text-white sm:text-4xl">
                {{ $pageContent->value('partnership_title') }}
            </h2>
            <p class="reveal mx-auto mt-6 max-w-2xl text-base leading-relaxed text-white/70">
                {{ $pageContent->value('partnership_body') }}
            </p>
            <div class="reveal mt-10 flex flex-wrap justify-center gap-4">
                <a href="{{ route('rooms.index') }}" class="btn-gold">Fund Care by Staying</a>
                <a href="{{ route('donate.index') }}" class="btn-secondary border-white/50 bg-transparent text-white hover:bg-white hover:text-chocolate-800">Fund Care by Giving</a>
            </div>
        </div>
    </section>
</x-layouts.app>
