<x-admin-layout title="Hero Section" heading="Hero Section" description="Homepage">
    <form method="POST" action="{{ route('dashboard.hero-section.update') }}" enctype="multipart/form-data" class="card-luxe max-w-4xl p-8 hover:translate-y-0">
        @csrf
        @method('PUT')

        <div>
            <x-input-label for="label" value="Sub-heading" />
            <x-text-input id="label" name="label" class="input-luxe mt-1" :value="old('label', $hero->label)" required />
            <p class="mt-1 text-xs text-neutral-500">Small uppercase label above the main heading.</p>
            <x-input-error :messages="$errors->get('label')" class="mt-2" />
        </div>

        <div class="mt-6">
            <x-input-label for="heading" value="Main heading" />
            <x-text-input id="heading" name="heading" class="input-luxe mt-1" :value="old('heading', $hero->heading)" required />
            <x-input-error :messages="$errors->get('heading')" class="mt-2" />
        </div>

        <div class="mt-6">
            <x-input-label for="description" value="Description" />
            <textarea id="description" name="description" rows="4" class="input-luxe mt-1" required>{{ old('description', $hero->description) }}</textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <div class="mt-6">
            <x-input-label for="image_alt" value="Background image alt text" />
            <x-text-input id="image_alt" name="image_alt" class="input-luxe mt-1" :value="old('image_alt', $hero->image_alt)" />
            <x-input-error :messages="$errors->get('image_alt')" class="mt-2" />
        </div>

        <div class="mt-8 border-t border-chocolate-100 pt-8">
            <x-image-upload
                name="background"
                label="Background photo"
                remove-field="remove_background"
                :current-url="$hero->getFirstMediaUrl('background', 'hero') ?: ($hero->backgroundImageUrl() ?: null)"
                help="Wide landscape photo works best. JPEG, PNG, or WebP up to 10MB."
            />
        </div>

        <div class="mt-8 flex flex-wrap gap-4">
            <x-primary-button>Save hero section</x-primary-button>
            <a href="{{ route('home') }}" target="_blank" class="btn-secondary">Preview homepage</a>
        </div>
    </form>
</x-admin-layout>
