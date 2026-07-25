<x-layouts.app>
    <x-slot:title>Book Your Stay</x-slot:title>
    <x-slot:description>Submit a booking inquiry for Endo Wellness Accommodation in Kampala, Uganda. Our team will confirm availability and respond within 24-48 hours.</x-slot:description>

    <section class="bg-beige py-20">
        <div class="mx-auto max-w-5xl px-6 lg:px-8">

            <div class="reveal mb-12 text-center">
                <p class="section-label">Reservations</p>
                <h1 class="mt-3 font-serif text-4xl font-semibold text-chocolate-800 sm:text-5xl">Book Your Stay</h1>
                <p class="mx-auto mt-5 max-w-xl text-base leading-relaxed text-neutral-500">
                    Fill in your details below and our team will confirm availability and get back to you within 24–48 hours.
                </p>
            </div>

            <div class="reveal grid gap-10 lg:grid-cols-5">

                {{-- Sidebar --}}
                <aside class="lg:col-span-2">
                    <div class="rounded-2xl bg-chocolate-900 p-8 text-white">
                        <h2 class="text-lg font-semibold">Why Stay with Us?</h2>
                        <ul class="mt-6 space-y-5">
                            <li class="flex items-start gap-3">
                                <span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-terracotta-500">
                                    <svg class="h-4 w-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                                </span>
                                <div>
                                    <p class="text-sm font-semibold">Boutique & Secure</p>
                                    <p class="mt-0.5 text-xs leading-relaxed text-white/60">Ultra-secure apartments designed for comfort and peace of mind.</p>
                                </div>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-terracotta-500">
                                    <svg class="h-4 w-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"/></svg>
                                </span>
                                <div>
                                    <p class="text-sm font-semibold">Stay with Purpose</p>
                                    <p class="mt-0.5 text-xs leading-relaxed text-white/60">15% of every booking funds 24/7 endometriosis care for women in Uganda.</p>
                                </div>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-terracotta-500">
                                    <svg class="h-4 w-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                                </span>
                                <div>
                                    <p class="text-sm font-semibold">24/7 Check-in</p>
                                    <p class="mt-0.5 text-xs leading-relaxed text-white/60">Arrive any time. Our team is always available to welcome you.</p>
                                </div>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-terracotta-500">
                                    <svg class="h-4 w-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.288 15.038a5.25 5.25 0 0 1 7.424 0M5.106 11.856c3.807-3.808 9.98-3.808 13.788 0M1.924 8.674c5.565-5.565 14.587-5.565 20.152 0M12.53 18.22l-.53.53-.53-.53a.75.75 0 0 1 1.06 0Z"/></svg>
                                </span>
                                <div>
                                    <p class="text-sm font-semibold">Free WiFi & Parking</p>
                                    <p class="mt-0.5 text-xs leading-relaxed text-white/60">Complimentary high-speed internet and on-site parking for all guests.</p>
                                </div>
                            </li>
                        </ul>

                        <div class="mt-8 border-t border-white/10 pt-6 text-xs leading-relaxed text-white/50">
                            Need help? Contact us directly at<br>
                            <a href="mailto:{{ $siteSettings->email }}" class="text-gold-400 hover:text-gold-300">{{ $siteSettings->email }}</a>
                        </div>
                    </div>
                </aside>

                {{-- Form --}}
                <div class="lg:col-span-3">
                    <form method="POST" action="{{ route('booking-inquiry.store') }}" class="card-luxe p-8 hover:translate-y-0 sm:p-10">
                        @csrf
                        <x-honeypot />

                        @if ($errors->any())
                            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                                Please correct the errors below before submitting.
                            </div>
                        @endif

                        <h2 class="text-xl font-semibold text-chocolate-800">Your Details</h2>

                        <div class="mt-6 grid gap-5 sm:grid-cols-2">
                            <div>
                                <label for="name" class="text-xs font-semibold uppercase tracking-wider text-neutral-500">Full Name <span class="text-terracotta-500">*</span></label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                    placeholder="Jane Doe"
                                    class="input-luxe mt-1.5">
                                @error('name') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label for="email" class="text-xs font-semibold uppercase tracking-wider text-neutral-500">Email Address <span class="text-terracotta-500">*</span></label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                    placeholder="jane@example.com"
                                    class="input-luxe mt-1.5">
                                @error('email') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="mt-5">
                            <label for="phone" class="text-xs font-semibold uppercase tracking-wider text-neutral-500">Phone Number <span class="text-neutral-400">(optional)</span></label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                                placeholder="+256 700 000 000"
                                class="input-luxe mt-1.5">
                            @error('phone') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <h2 class="mt-9 text-xl font-semibold text-chocolate-800">Stay Details</h2>

                        <div class="mt-6 grid gap-5 sm:grid-cols-2">
                            <div>
                                <label for="arrival" class="text-xs font-semibold uppercase tracking-wider text-neutral-500">Arrival Date <span class="text-terracotta-500">*</span></label>
                                <input type="date" id="arrival" name="arrival" value="{{ old('arrival') }}" required
                                    min="{{ date('Y-m-d') }}"
                                    class="input-luxe mt-1.5">
                                @error('arrival') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label for="departure" class="text-xs font-semibold uppercase tracking-wider text-neutral-500">Departure Date <span class="text-terracotta-500">*</span></label>
                                <input type="date" id="departure" name="departure" value="{{ old('departure') }}" required
                                    min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                    class="input-luxe mt-1.5">
                                @error('departure') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="mt-5">
                            <label for="guests" class="text-xs font-semibold uppercase tracking-wider text-neutral-500">Number of Guests <span class="text-terracotta-500">*</span></label>
                            <select id="guests" name="guests" required class="input-luxe mt-1.5">
                                <option value="">Select guests</option>
                                @for ($i = 1; $i <= 10; $i++)
                                    <option value="{{ $i }}" @selected(old('guests') == $i)>{{ $i }} {{ $i === 1 ? 'Guest' : 'Guests' }}</option>
                                @endfor
                            </select>
                            @error('guests') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div class="mt-5">
                            <label for="additional_info" class="text-xs font-semibold uppercase tracking-wider text-neutral-500">Additional Information <span class="text-neutral-400">(optional)</span></label>
                            <textarea id="additional_info" name="additional_info" rows="4"
                                placeholder="Special requests, dietary requirements, accessibility needs, reason for visit…"
                                class="input-luxe mt-1.5">{{ old('additional_info') }}</textarea>
                            @error('additional_info') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <button type="submit" class="btn-primary mt-8 w-full justify-center py-4 text-sm">
                            Send Booking Inquiry
                        </button>

                        <p class="mt-4 text-center text-xs text-neutral-400">
                            We will respond within 24–48 hours. No payment is required at this stage.
                        </p>
                    </form>
                </div>

            </div>
        </div>
    </section>
</x-layouts.app>
