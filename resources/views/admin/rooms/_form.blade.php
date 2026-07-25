@php($room = $room ?? null)

<div class="grid gap-6 lg:grid-cols-2">
    <div>
        <x-input-label for="name" value="Name" />
        <x-text-input id="name" name="name" class="input-luxe mt-1" :value="old('name', $room?->name)" required />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="tagline" value="Tagline" />
        <x-text-input id="tagline" name="tagline" class="input-luxe mt-1" :value="old('tagline', $room?->tagline)" />
        <x-input-error :messages="$errors->get('tagline')" class="mt-2" />
    </div>
</div>

<div class="mt-6">
    <x-input-label for="description" value="Description" />
    <textarea id="description" name="description" rows="6" class="input-luxe mt-1" required>{{ old('description', $room?->description) }}</textarea>
    <x-input-error :messages="$errors->get('description')" class="mt-2" />
</div>

<div class="mt-6 grid gap-6 lg:grid-cols-3">
    <div>
        <x-input-label for="price_per_night" value="Price per night (UGX)" />
        <x-text-input id="price_per_night" name="price_per_night" type="number" step="1" class="input-luxe mt-1" :value="old('price_per_night', $room?->price_per_night)" required />
        <x-input-error :messages="$errors->get('price_per_night')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="capacity" value="Capacity" />
        <x-text-input id="capacity" name="capacity" type="number" class="input-luxe mt-1" :value="old('capacity', $room?->capacity ?? 2)" required />
        <x-input-error :messages="$errors->get('capacity')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="sort_order" value="Sort order" />
        <x-text-input id="sort_order" name="sort_order" type="number" class="input-luxe mt-1" :value="old('sort_order', $room?->sort_order ?? 0)" />
        <x-input-error :messages="$errors->get('sort_order')" class="mt-2" />
    </div>
</div>

<div class="mt-6 grid gap-6 lg:grid-cols-2">
    <div>
        <x-input-label for="size_sqm" value="Size (sqm)" />
        <x-text-input id="size_sqm" name="size_sqm" type="number" class="input-luxe mt-1" :value="old('size_sqm', $room?->size_sqm)" />
        <x-input-error :messages="$errors->get('size_sqm')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="bed_setup" value="Bed setup" />
        <x-text-input id="bed_setup" name="bed_setup" class="input-luxe mt-1" :value="old('bed_setup', $room?->bed_setup)" />
        <x-input-error :messages="$errors->get('bed_setup')" class="mt-2" />
    </div>
</div>

<div class="mt-6">
    <x-input-label for="amenities" value="Amenities (comma-separated)" />
    <x-text-input id="amenities" name="amenities" class="input-luxe mt-1" :value="old('amenities', $room ? implode(', ', $room->amenities ?? []) : '')" />
    <x-input-error :messages="$errors->get('amenities')" class="mt-2" />
</div>

<div class="mt-6">
    <x-image-upload
        name="cover"
        label="Cover image"
        :current-url="$room?->getFirstMediaUrl('cover', 'card') ?: ($room?->coverImageUrl() ?: null)"
        :required="! $room"
    />
</div>

<div class="mt-6">
    <x-gallery-upload :model="$room" label="Gallery images" help="Optional extra photos shown in the room gallery." />
</div>

<div class="mt-6">
    <label class="inline-flex items-center gap-2">
        <input type="checkbox" name="is_featured" value="1" class="rounded border-chocolate-300 text-chocolate-700 focus:ring-chocolate-500" @checked(old('is_featured', $room?->is_featured))>
        <span class="text-sm text-chocolate-800">Featured on homepage</span>
    </label>
</div>
