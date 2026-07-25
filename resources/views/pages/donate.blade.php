<x-layouts.app>
    <x-slot:title>Donate</x-slot:title>
    <x-slot:description>{{ $pageContent->value('header_description', 'Directly fund a night of sanctuary, medicine, and care for women living with endometriosis through PAHEWO in Kampala, Uganda.') }}</x-slot:description>
    <x-slot:ogImage>{{ $pageContent->imageUrl('header_image') ?: 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?q=80&w=1200&auto=format&fit=crop' }}</x-slot:ogImage>

    <x-page-header
        :label="$pageContent->value('header_label')"
        :title="$pageContent->value('header_title')"
        :description="$pageContent->value('header_description')"
        :image="$pageContent->imageUrl('header_image')" />

    <section class="bg-beige py-20">
        <div class="mx-auto grid max-w-6xl gap-14 px-6 lg:grid-cols-5 lg:px-8">
            <div class="lg:col-span-2">
                <p class="section-label reveal">{{ $pageContent->value('funding_label') }}</p>
                <ul class="mt-6 space-y-5">
                    <li class="reveal flex items-start gap-4">
                        <span class="mt-0.5 rounded-full bg-gold-500 px-3 py-1 text-sm font-semibold text-chocolate-900">UGX 25,000</span>
                        <p class="text-sm leading-relaxed text-neutral-600">{{ $pageContent->value('amount_25_description') }}</p>
                    </li>
                    <li class="reveal flex items-start gap-4">
                        <span class="mt-0.5 rounded-full bg-gold-500 px-3 py-1 text-sm font-semibold text-chocolate-900">UGX 50,000</span>
                        <p class="text-sm leading-relaxed text-neutral-600">{{ $pageContent->value('amount_50_description') }}</p>
                    </li>
                    <li class="reveal flex items-start gap-4">
                        <span class="mt-0.5 rounded-full bg-gold-500 px-3 py-1 text-sm font-semibold text-chocolate-900">UGX 100,000</span>
                        <p class="text-sm leading-relaxed text-neutral-600">{{ $pageContent->value('amount_100_description') }}</p>
                    </li>
                    <li class="reveal flex items-start gap-4">
                        <span class="mt-0.5 rounded-full bg-gold-500 px-3 py-1 text-sm font-semibold text-chocolate-900">UGX 250,000</span>
                        <p class="text-sm leading-relaxed text-neutral-600">{{ $pageContent->value('amount_250_description') }}</p>
                    </li>
                </ul>
                <p class="reveal mt-8 rounded-2xl bg-white p-6 text-sm leading-relaxed text-neutral-500 ring-1 ring-chocolate-100">
                    {{ $pageContent->value('pledge_note') }}
                </p>
            </div>

            <div class="lg:col-span-3">
                <form method="POST" action="{{ route('donate.store') }}" class="card-luxe reveal p-8 hover:translate-y-0 sm:p-10">
                    @csrf
                    <x-honeypot />

                    <h2 class="text-2xl font-semibold text-chocolate-800">Make a pledge</h2>

                    <div class="mt-8 grid gap-5 sm:grid-cols-2">
                        <div>
                            <label for="donor_name" class="text-xs font-medium uppercase tracking-wider text-neutral-500">Full name</label>
                            <input type="text" id="donor_name" name="donor_name" value="{{ old('donor_name') }}" required
                                class="input-luxe mt-1.5">
                            @error('donor_name') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="donor_email" class="text-xs font-medium uppercase tracking-wider text-neutral-500">Email</label>
                            <input type="email" id="donor_email" name="donor_email" value="{{ old('donor_email') }}" required
                                class="input-luxe mt-1.5">
                            @error('donor_email') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="mt-5" x-data="{ amount: '{{ old('amount', 50000) }}' }">
                        <label class="text-xs font-medium uppercase tracking-wider text-neutral-500">Amount (UGX)</label>
                        <div class="mt-2 grid grid-cols-4 gap-3">
                            @foreach ([25000, 50000, 100000, 250000] as $preset)
                                <button type="button" @click="amount = '{{ $preset }}'"
                                    :class="amount == '{{ $preset }}' ? 'bg-chocolate-700 text-white' : 'bg-white text-chocolate-700 ring-1 ring-chocolate-200 hover:ring-chocolate-400'"
                                    class="rounded-xl py-3 text-xs font-semibold transition sm:text-sm">{{ number_format($preset) }}</button>
                            @endforeach
                        </div>
                        <input type="number" name="amount" x-model="amount" min="1" step="1" required
                            placeholder="Or enter a custom amount" class="input-luxe mt-3">
                        @error('amount') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div class="mt-5">
                        <label for="designation" class="text-xs font-medium uppercase tracking-wider text-neutral-500">Direct my gift to</label>
                        <select id="designation" name="designation" class="input-luxe mt-1.5">
                            <option value="general" @selected(old('designation') === 'general')>Where it's needed most</option>
                            <option value="medical-care" @selected(old('designation') === 'medical-care')>24/7 medical care</option>
                            <option value="sanctuary" @selected(old('designation') === 'sanctuary')>Sanctuary nights</option>
                            <option value="awareness" @selected(old('designation') === 'awareness')>Awareness &amp; advocacy</option>
                        </select>
                        @error('designation') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div class="mt-5">
                        <label for="message" class="text-xs font-medium uppercase tracking-wider text-neutral-500">Message (optional)</label>
                        <textarea id="message" name="message" rows="3" placeholder="A word of encouragement for the women your gift supports…"
                            class="input-luxe mt-1.5">{{ old('message') }}</textarea>
                        @error('message') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <button type="submit" class="btn-primary mt-8 w-full">Pledge My Donation</button>
                </form>
            </div>
        </div>
    </section>
</x-layouts.app>
