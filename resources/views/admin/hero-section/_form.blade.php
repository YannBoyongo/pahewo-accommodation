@php($hero = $hero ?? null)

<div>
    <x-input-label for="label" value="Sub-heading" />
    <x-text-input id="label" name="label" class="input-luxe mt-1" :value="old('label', $hero?->label)" required />
    <p class="mt-1 text-xs text-neutral-500">Small uppercase label above the main heading.</p>
    <x-input-error :messages="$errors->get('label')" class="mt-2" />
</div>

<div class="mt-6">
    <x-input-label for="heading" value="Main heading" />
    <x-text-input id="heading" name="heading" class="input-luxe mt-1" :value="old('heading', $hero?->heading)" required />
    <x-input-error :messages="$errors->get('heading')" class="mt-2" />
</div>

<div class="mt-6">
    <x-input-label for="description" value="Description" />
    <textarea id="description" name="description" rows="4" class="input-luxe mt-1" required>{{ old('description', $hero?->description) }}</textarea>
    <x-input-error :messages="$errors->get('description')" class="mt-2" />
</div>

<div class="mt-6">
    <x-input-label for="image_alt" value="Background image alt text" />
    <x-text-input id="image_alt" name="image_alt" class="input-luxe mt-1" :value="old('image_alt', $hero?->image_alt)" />
    <x-input-error :messages="$errors->get('image_alt')" class="mt-2" />
</div>

<div class="mt-6">
    <x-input-label for="sort_order" value="Display order" />
    <x-text-input id="sort_order" name="sort_order" type="number" min="0" class="input-luxe mt-1" :value="old('sort_order', $hero?->sort_order ?? 0)" required />
    <x-input-error :messages="$errors->get('sort_order')" class="mt-2" />
</div>

<div class="mt-6">
    <label class="inline-flex items-center gap-2">
        <input type="checkbox" name="is_published" value="1" class="rounded border-chocolate-300 text-chocolate-700 focus:ring-chocolate-500" @checked(old('is_published', $hero?->is_published ?? true))>
        <span class="text-sm text-chocolate-800">Show this slide on the homepage</span>
    </label>
</div>

<div class="mt-8 border-t border-chocolate-100 pt-8">
    <x-image-upload
        name="background"
        label="Background photo"
        remove-field="remove_background"
        :current-url="$hero?->getFirstMediaUrl('background', 'hero') ?: ($hero?->backgroundImageUrl() ?: null)"
        help="Wide landscape photo works best. JPEG, PNG, or WebP up to 10MB."
    />
</div>
