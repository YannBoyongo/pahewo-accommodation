@php($testimonial = $testimonial ?? null)

<div>
    <x-input-label for="guest_name" value="Guest name" />
    <x-text-input id="guest_name" name="guest_name" class="input-luxe mt-1" :value="old('guest_name', $testimonial?->guest_name)" required />
    <x-input-error :messages="$errors->get('guest_name')" class="mt-2" />
</div>

<div class="mt-6">
    <x-input-label for="stay_type" value="Stay type" />
    <x-text-input id="stay_type" name="stay_type" class="input-luxe mt-1" :value="old('stay_type', $testimonial?->stay_type)" placeholder="e.g. Leisure stay" />
    <x-input-error :messages="$errors->get('stay_type')" class="mt-2" />
</div>

<div class="mt-6">
    <x-input-label for="quote" value="Testimonial" />
    <textarea id="quote" name="quote" rows="6" class="input-luxe mt-1" required>{{ old('quote', $testimonial?->quote) }}</textarea>
    <x-input-error :messages="$errors->get('quote')" class="mt-2" />
</div>

<div class="mt-6">
    <x-input-label for="sort_order" value="Display order" />
    <x-text-input id="sort_order" name="sort_order" type="number" min="0" class="input-luxe mt-1" :value="old('sort_order', $testimonial?->sort_order ?? 0)" required />
    <x-input-error :messages="$errors->get('sort_order')" class="mt-2" />
</div>

<div class="mt-6">
    <label class="inline-flex items-center gap-2">
        <input type="checkbox" name="is_published" value="1" class="rounded border-chocolate-300 text-chocolate-700 focus:ring-chocolate-500" @checked(old('is_published', $testimonial?->is_published ?? true))>
        <span class="text-sm text-chocolate-800">Publish testimonial on the homepage</span>
    </label>
</div>
