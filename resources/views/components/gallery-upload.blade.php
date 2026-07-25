@props([
    'model' => null,
    'collection' => 'gallery',
    'label' => 'Gallery images',
    'help' => 'Upload multiple JPEG, PNG, or WebP images up to 10MB each.',
])

<div>
    <x-input-label for="gallery" :value="$label" />

    @if ($model && $model->getMedia($collection)->isNotEmpty())
        <div class="mt-3 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($model->getMedia($collection) as $media)
                <label class="group relative overflow-hidden rounded-xl ring-1 ring-chocolate-100">
                    <img src="{{ $media->getUrl('card') }}" alt="Gallery image" class="h-36 w-full object-cover">
                    <span class="absolute inset-x-0 bottom-0 flex items-center gap-2 bg-chocolate-900/80 px-3 py-2 text-xs text-white">
                        <input
                            type="checkbox"
                            name="remove_gallery_media[]"
                            value="{{ $media->id }}"
                            class="rounded border-white/40 text-gold-500 focus:ring-gold-400"
                        >
                        Remove
                    </span>
                </label>
            @endforeach
        </div>
    @endif

    <input
        type="file"
        id="gallery"
        name="gallery[]"
        accept="image/jpeg,image/png,image/webp"
        multiple
        class="mt-3 block w-full rounded-xl border border-chocolate-200 bg-white px-4 py-2.5 text-sm text-ink file:mr-4 file:rounded-lg file:border-0 file:bg-chocolate-100 file:px-4 file:py-2 file:text-sm file:font-medium file:text-chocolate-800 hover:file:bg-chocolate-200"
    >

    @if ($help)
        <p class="mt-2 text-xs text-neutral-500">{{ $help }}</p>
    @endif

    <x-input-error :messages="$errors->get('gallery')" class="mt-2" />
    <x-input-error :messages="$errors->get('gallery.*')" class="mt-2" />
</div>
