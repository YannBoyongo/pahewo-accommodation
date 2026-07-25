<x-layouts.app>
    <x-slot:noindex>true</x-slot:noindex>
    <x-slot:title>Inquiry Received</x-slot:title>

    <section class="flex min-h-[70vh] items-center bg-beige py-20">
        <div class="mx-auto max-w-2xl px-6 text-center lg:px-8">

            <span class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-terracotta-500/10 text-terracotta-500">
                <svg class="h-10 w-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
            </span>

            <h1 class="mt-6 font-serif text-4xl font-semibold text-chocolate-800">
                Thank You{{ session('inquiry_name') ? ', ' . session('inquiry_name') : '' }}!
            </h1>
            <p class="mx-auto mt-5 max-w-md text-base leading-relaxed text-neutral-500">
                Your booking inquiry has been received. We've sent a confirmation to your email address
                and our team will get back to you within <strong class="text-chocolate-700">24–48 hours</strong>.
            </p>

            <div class="mt-10 rounded-2xl bg-white p-8 shadow-sm ring-1 ring-chocolate-100">
                <p class="text-sm font-semibold text-chocolate-700">What happens next?</p>
                <ol class="mt-5 space-y-4 text-left">
                    <li class="flex items-start gap-4">
                        <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-terracotta-500 text-xs font-bold text-white">1</span>
                        <p class="text-sm leading-relaxed text-neutral-600">Our team reviews your inquiry and checks room availability for your dates.</p>
                    </li>
                    <li class="flex items-start gap-4">
                        <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-terracotta-500 text-xs font-bold text-white">2</span>
                        <p class="text-sm leading-relaxed text-neutral-600">We send you a personalised response with options, pricing, and next steps.</p>
                    </li>
                    <li class="flex items-start gap-4">
                        <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-terracotta-500 text-xs font-bold text-white">3</span>
                        <p class="text-sm leading-relaxed text-neutral-600">You confirm your booking — and your stay begins to fund 24/7 endometriosis care.</p>
                    </li>
                </ol>
            </div>

            <div class="mt-10 flex flex-wrap justify-center gap-4">
                <a href="{{ route('home') }}" class="btn-primary">Back to Home</a>
                <a href="{{ route('rooms.index') }}" class="btn-secondary">Browse Rooms</a>
            </div>

        </div>
    </section>
</x-layouts.app>
