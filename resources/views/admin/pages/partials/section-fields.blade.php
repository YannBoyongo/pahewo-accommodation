<div class="border-b border-chocolate-100 pb-5">
    <p class="section-label">{{ $section }}</p>
    @if ($page->slug === 'conference-meeting')
        <p class="mt-2 text-sm text-neutral-500">Only the fields in this section will be saved.</p>
    @endif
</div>

@if (session('updated_section') === $section)
    <div class="mt-5 rounded-xl bg-green-50 px-4 py-3 text-sm font-medium text-green-800 ring-1 ring-green-200">
        {{ $section }} saved successfully.
    </div>
@endif

@if ($errors->any() && old('section') === $section)
    <div class="mt-5 rounded-xl border border-red-200 bg-red-50 px-4 py-4 text-sm text-red-800" role="alert" aria-live="polite">
        <p class="font-semibold">Please correct the following before saving {{ $section }}:</p>
        <ul class="mt-2 list-disc space-y-1 pl-5">
            @foreach ($errors->all() as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="mt-6 grid gap-6 lg:grid-cols-2">
    @foreach ($fields as $key => $field)
        <div @class(['lg:col-span-2' => in_array($field['type'], ['textarea', 'image', 'ckeditor'], true)])>
            @if ($field['type'] === 'image')
                <x-image-upload
                    :name="$key"
                    :label="$field['label']"
                    :remove-field="'remove_'.$key"
                    :current-url="$page->imageUrl($key) ?: null"
                    help="JPEG, PNG, or WebP up to 10MB. Existing image remains unless replaced or removed."
                />
            @elseif ($field['type'] === 'ckeditor')
                <x-input-label :for="$key" :value="$field['label']" />
                <textarea
                    id="{{ $key }}"
                    name="{{ $key }}"
                    data-ckeditor
                    rows="10"
                    @class(['input-luxe mt-1', '!border-red-400 !ring-red-200' => $errors->has($key)])
                    @required($field['required'] ?? true)
                    @if($errors->has($key)) aria-invalid="true" aria-describedby="{{ $key }}-error" @endif
                >{{ old($key, $page->value($key)) }}</textarea>
                <div id="{{ $key }}-error">
                    <x-input-error :messages="$errors->get($key)" class="mt-2" />
                </div>
            @elseif ($field['type'] === 'textarea')
                <x-input-label :for="$key" :value="$field['label']" />
                <textarea
                    id="{{ $key }}"
                    name="{{ $key }}"
                    rows="5"
                    @class(['input-luxe mt-1', '!border-red-400 !ring-red-200' => $errors->has($key)])
                    @required($field['required'] ?? true)
                    @if($errors->has($key)) aria-invalid="true" aria-describedby="{{ $key }}-error" @endif
                >{{ old($key, $page->value($key)) }}</textarea>
                <div id="{{ $key }}-error">
                    <x-input-error :messages="$errors->get($key)" class="mt-2" />
                </div>
            @else
                <x-input-label :for="$key" :value="$field['label']" />
                <x-text-input
                    id="{{ $key }}"
                    name="{{ $key }}"
                    @class(['input-luxe mt-1', '!border-red-400 !ring-red-200' => $errors->has($key)])
                    :value="old($key, $page->value($key))"
                    :required="$field['required'] ?? true"
                    :aria-invalid="$errors->has($key) ? 'true' : 'false'"
                    :aria-describedby="$errors->has($key) ? $key.'-error' : null"
                />
                <div id="{{ $key }}-error">
                    <x-input-error :messages="$errors->get($key)" class="mt-2" />
                </div>
            @endif
        </div>
    @endforeach
</div>
