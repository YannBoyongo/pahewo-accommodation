<form wire:submit="checkAvailability" class="hero-booking-bar mx-auto w-full max-w-5xl">
    <div class="grid grid-cols-1 divide-y divide-gold-500/40 border border-gold-500/70 bg-chocolate-950/75 backdrop-blur-sm sm:grid-cols-2 sm:divide-x sm:divide-y-0 lg:grid-cols-4">
        <label class="flex flex-col px-5 py-4 sm:py-5">
            <span class="text-[10px] font-semibold uppercase tracking-[0.2em] text-gold-400">Check In</span>
            <input type="date" wire:model="check_in" class="hero-booking-input mt-1">
            @error('check_in') <span class="mt-1 text-[10px] text-red-300">{{ $message }}</span> @enderror
        </label>

        <label class="flex flex-col px-5 py-4 sm:py-5">
            <span class="text-[10px] font-semibold uppercase tracking-[0.2em] text-gold-400">Check Out</span>
            <input type="date" wire:model="check_out" class="hero-booking-input mt-1">
            @error('check_out') <span class="mt-1 text-[10px] text-red-300">{{ $message }}</span> @enderror
        </label>

        <label class="flex flex-col px-5 py-4 sm:py-5">
            <span class="text-[10px] font-semibold uppercase tracking-[0.2em] text-gold-400">Guests</span>
            <select wire:model="guests" class="hero-booking-input mt-1">
                @for ($i = 1; $i <= 8; $i++)
                    <option value="{{ $i }}">{{ $i }} {{ Str::plural('Guest', $i) }}</option>
                @endfor
            </select>
            @error('guests') <span class="mt-1 text-[10px] text-red-300">{{ $message }}</span> @enderror
        </label>

        <div class="flex items-stretch">
            <button type="submit" class="flex w-full items-center justify-center bg-gold-500/15 px-5 py-4 text-xs font-semibold uppercase tracking-[0.18em] text-gold-300 transition hover:bg-gold-500/25 sm:py-5">
                <span wire:loading.remove>Check Availability</span>
                <span wire:loading>Checking…</span>
            </button>
        </div>
    </div>
</form>
