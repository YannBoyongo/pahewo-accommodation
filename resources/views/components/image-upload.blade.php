@props([
    'name' => 'cover',
    'label' => 'Cover image',
    'currentUrl' => null,
    'required' => false,
    'removeField' => null,
    'help' => 'JPEG, PNG, or WebP up to 10MB.',
])

@php($removeField = $removeField ?? 'remove_'.$name)

<div>
    <x-input-label :for="$name" :value="$label" />

    @if ($currentUrl)
        <div class="mt-3 overflow-hidden rounded-xl ring-1 ring-chocolate-100">
            <img src="{{ $currentUrl }}" alt="Current {{ strtolower($label) }}" class="h-48 w-full object-cover">
        </div>
        <label class="mt-3 inline-flex items-center gap-2 text-sm text-neutral-600">
            <input type="checkbox" name="{{ $removeField }}" value="1" class="rounded border-chocolate-300 text-chocolate-700 focus:ring-chocolate-500">
            Remove current image
        </label>
    @endif

    <input
        type="file"
        id="{{ $name }}"
        name="{{ $name }}"
        accept="image/jpeg,image/png,image/webp"
        @class([
            'mt-3 block w-full rounded-xl border border-chocolate-200 bg-white px-4 py-2.5 text-sm text-ink file:mr-4 file:rounded-lg file:border-0 file:bg-chocolate-100 file:px-4 file:py-2 file:text-sm file:font-medium file:text-chocolate-800 hover:file:bg-chocolate-200',
        ])
        @if ($required && ! $currentUrl) required @endif
    >

    @if ($help)
        <p class="mt-2 text-xs text-neutral-500">{{ $help }}</p>
    @endif

    <x-input-error :messages="$errors->get($name)" class="mt-2" />
</div>
