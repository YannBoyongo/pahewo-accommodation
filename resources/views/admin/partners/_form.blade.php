@php($partner = $partner ?? null)

<div>
    <x-input-label for="name" value="Name" />
    <x-text-input id="name" name="name" class="input-luxe mt-1" :value="old('name', $partner?->name)" required />
    <x-input-error :messages="$errors->get('name')" class="mt-2" />
</div>

<div class="mt-6">
    <x-input-label for="description" value="Description" />
    <textarea id="description" name="description" rows="4" class="input-luxe mt-1">{{ old('description', $partner?->description) }}</textarea>
    <x-input-error :messages="$errors->get('description')" class="mt-2" />
</div>

<div class="mt-6">
    <x-input-label for="website_url" value="Website URL" />
    <x-text-input id="website_url" name="website_url" type="url" class="input-luxe mt-1" :value="old('website_url', $partner?->website_url)" />
    <x-input-error :messages="$errors->get('website_url')" class="mt-2" />
</div>

<div class="mt-6">
    <x-image-upload
        name="logo"
        label="Partner logo"
        remove-field="remove_logo"
        :current-url="$partner?->getFirstMediaUrl('logo', 'thumb') ?: ($partner?->logoUrl() ?: null)"
        :required="! $partner"
        help="Square or landscape logo. JPEG, PNG, or WebP up to 10MB."
    />
</div>

<div class="mt-6">
    <label class="inline-flex items-center gap-2">
        <input type="checkbox" name="is_featured" value="1" class="rounded border-chocolate-300 text-chocolate-700 focus:ring-chocolate-500" @checked(old('is_featured', $partner?->is_featured))>
        <span class="text-sm text-chocolate-800">Featured partner</span>
    </label>
</div>
