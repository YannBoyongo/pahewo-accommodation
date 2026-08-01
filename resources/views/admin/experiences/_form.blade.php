@php($experience = $experience ?? null)

<div class="grid gap-6 lg:grid-cols-2">
    <div>
        <x-input-label for="name" value="Name" />
        <x-text-input id="name" name="name" class="input-luxe mt-1" :value="old('name', $experience?->name)" required />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="category" value="Category" />
        <x-text-input id="category" name="category" class="input-luxe mt-1" :value="old('category', $experience?->category)" required />
        <x-input-error :messages="$errors->get('category')" class="mt-2" />
    </div>
</div>

<div class="mt-6">
    <x-input-label for="description" value="Description" />
    <textarea id="description" name="description" rows="6" class="input-luxe mt-1" required>{{ old('description', $experience?->description) }}</textarea>
    <x-input-error :messages="$errors->get('description')" class="mt-2" />
</div>

<div class="mt-6 grid gap-6 lg:grid-cols-3">
    <div>
        <x-input-label for="duration" value="Duration" />
        <x-text-input id="duration" name="duration" class="input-luxe mt-1" :value="old('duration', $experience?->duration)" />
        <x-input-error :messages="$errors->get('duration')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="price" value="Price (USD)" />
        <x-text-input id="price" name="price" type="number" step="1" class="input-luxe mt-1" :value="old('price', $experience?->price)" />
        <x-input-error :messages="$errors->get('price')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="sort_order" value="Sort order" />
        <x-text-input id="sort_order" name="sort_order" type="number" class="input-luxe mt-1" :value="old('sort_order', $experience?->sort_order ?? 0)" />
        <x-input-error :messages="$errors->get('sort_order')" class="mt-2" />
    </div>
</div>

<div class="mt-6">
    <x-image-upload
        name="cover"
        label="Cover image"
        :current-url="$experience?->getFirstMediaUrl('cover', 'card') ?: ($experience?->coverImageUrl() ?: null)"
        :required="! $experience"
    />
</div>

<div class="mt-6">
    <label class="inline-flex items-center gap-2">
        <input type="checkbox" name="is_featured" value="1" class="rounded border-chocolate-300 text-chocolate-700 focus:ring-chocolate-500" @checked(old('is_featured', $experience?->is_featured))>
        <span class="text-sm text-chocolate-800">Featured on homepage</span>
    </label>
</div>
