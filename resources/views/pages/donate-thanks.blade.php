<x-layouts.app>
    <x-slot:noindex>true</x-slot:noindex>
    <x-slot:title>Thank You</x-slot:title>

    <section class="flex min-h-screen items-center bg-chocolate-900 py-32">
        <div class="mx-auto max-w-2xl px-6 text-center lg:px-8">
            <span class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-gold-500">
                <svg class="h-10 w-10 text-chocolate-900" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"/></svg>
            </span>
            <h1 class="mt-8 text-4xl font-semibold text-white">Thank you for keeping the lights on.</h1>
            @if (session('donation_reference'))
                <p class="mt-5 text-white/70">
                    Your pledge of
                    <span class="font-semibold text-gold-400">{{ \App\Support\Currency::format(session('donation_amount')) }}</span>
                    has been recorded with reference
                    <span class="font-semibold text-gold-400">{{ session('donation_reference') }}</span>.
                    Our team will email you shortly to complete the gift securely.
                </p>
            @else
                <p class="mt-5 text-white/70">Your pledge has been recorded. Our team will email you shortly to complete the gift securely.</p>
            @endif
            <p class="mx-auto mt-6 max-w-lg text-sm leading-relaxed text-white/50">
                Somewhere tonight, a phone will ring at the sanctuary — and because of you, someone will answer.
            </p>
            <div class="mt-10 flex flex-wrap justify-center gap-4">
                <a href="{{ route('about-pahewo') }}" class="btn-gold">Learn About PAHEWO</a>
                <a href="{{ route('home') }}" class="btn-secondary border-white/50 bg-transparent text-white hover:bg-white hover:text-chocolate-800">Back to Home</a>
            </div>
        </div>
    </section>
</x-layouts.app>
