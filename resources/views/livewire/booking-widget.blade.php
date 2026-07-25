<div class="card-luxe overflow-hidden hover:translate-y-0">
    @if ($confirmedReference)
        <div class="p-8 text-center">
            <span class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-chocolate-50">
                <svg class="h-8 w-8 text-chocolate-700" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
            </span>
            <h3 class="mt-5 text-xl font-semibold text-chocolate-800">Booking request received</h3>
            <p class="mt-2 text-sm text-neutral-600">
                Your reference is <span class="font-semibold text-chocolate-700">{{ $confirmedReference }}</span>.
                We'll confirm by email shortly.
            </p>
            <div class="mt-6 rounded-xl bg-beige p-5 text-sm leading-relaxed text-chocolate-800">
                Your stay will contribute
                <span class="font-semibold text-gold-600">{{ \App\Support\Currency::format($this->impactContribution()) }}</span>
                to PAHEWO's 24/7 endometriosis care — funding real nights of sanctuary, medicine, and dignity.
                Thank you for staying with purpose.
            </div>
            <a href="{{ route('about-pahewo') }}" class="btn-secondary mt-6">Learn about PAHEWO</a>
        </div>
    @else
        <div class="bg-chocolate-900 px-8 py-6">
            <p class="text-xs font-semibold uppercase tracking-[0.25em] text-gold-500">Reserve your stay</p>
            <p class="mt-1 text-2xl font-semibold text-white">{{ \App\Support\Currency::format($room->price_per_night) }}<span class="text-sm font-normal text-white/60"> / night</span></p>
        </div>

        <form wire:submit="book" class="space-y-5 p-8">
            <x-honeypot livewire-model="extraFields" />

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="check_in" class="text-xs font-medium uppercase tracking-wider text-neutral-500">Check-in</label>
                    <input type="date" id="check_in" wire:model.live="check_in"
                        class="mt-1.5 w-full input-luxe">
                    @error('check_in') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="check_out" class="text-xs font-medium uppercase tracking-wider text-neutral-500">Check-out</label>
                    <input type="date" id="check_out" wire:model.live="check_out"
                        class="mt-1.5 w-full input-luxe">
                    @error('check_out') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label for="guests" class="text-xs font-medium uppercase tracking-wider text-neutral-500">Guests</label>
                <select id="guests" wire:model.live="guests"
                    class="mt-1.5 w-full input-luxe">
                    @for ($i = 1; $i <= $room->capacity; $i++)
                        <option value="{{ $i }}">{{ $i }} {{ Str::plural('guest', $i) }}</option>
                    @endfor
                </select>
                @error('guests') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="guest_name" class="text-xs font-medium uppercase tracking-wider text-neutral-500">Full name</label>
                <input type="text" id="guest_name" wire:model="guest_name" placeholder="Your full name"
                    class="mt-1.5 w-full input-luxe">
                @error('guest_name') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="grid gap-4 sm:grid-cols-2">
                <div>
                    <label for="guest_email" class="text-xs font-medium uppercase tracking-wider text-neutral-500">Email</label>
                    <input type="email" id="guest_email" wire:model="guest_email" placeholder="you@example.com"
                        class="mt-1.5 w-full input-luxe">
                    @error('guest_email') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="guest_phone" class="text-xs font-medium uppercase tracking-wider text-neutral-500">Phone (optional)</label>
                    <input type="tel" id="guest_phone" wire:model="guest_phone" placeholder="+256 ..."
                        class="mt-1.5 w-full input-luxe">
                    @error('guest_phone') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label for="special_requests" class="text-xs font-medium uppercase tracking-wider text-neutral-500">Special requests (optional)</label>
                <textarea id="special_requests" wire:model="special_requests" rows="3"
                    placeholder="Dietary needs, accessibility, wellness support…"
                    class="mt-1.5 w-full input-luxe"></textarea>
                @error('special_requests') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>

            @if ($this->nights() > 0)
                <div class="space-y-2 rounded-xl bg-beige p-5 text-sm">
                    <div class="flex justify-between text-neutral-600">
                        <span>{{ \App\Support\Currency::format($room->price_per_night) }} × {{ $this->nights() }} {{ Str::plural('night', $this->nights()) }}</span>
                        <span>{{ \App\Support\Currency::format($this->totalPrice()) }}</span>
                    </div>
                    <div class="flex justify-between border-t border-chocolate-100 pt-2 font-semibold text-chocolate-800">
                        <span>Total</span>
                        <span>{{ \App\Support\Currency::format($this->totalPrice()) }}</span>
                    </div>
                    <div class="flex justify-between text-xs text-gold-600">
                        <span>Funds 24/7 endometriosis care (15%)</span>
                        <span class="font-semibold">{{ \App\Support\Currency::format($this->impactContribution()) }}</span>
                    </div>
                </div>
            @endif

            <button type="submit" class="btn-primary w-full" wire:loading.attr="disabled">
                <span wire:loading.remove>Request booking</span>
                <span wire:loading>Sending…</span>
            </button>

            <p class="text-center text-xs text-neutral-400">
                No payment taken now — we confirm availability by email within hours.
            </p>
        </form>
    @endif
</div>
