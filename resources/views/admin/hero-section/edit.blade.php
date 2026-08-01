<x-admin-layout title="Edit Hero Slide" heading="Edit Hero Slide" description="Homepage">
    <form method="POST" action="{{ route('dashboard.hero-section.update', $hero) }}" enctype="multipart/form-data" class="card-luxe max-w-4xl p-8 hover:translate-y-0">
        @csrf
        @method('PUT')
        @include('admin.hero-section._form', ['hero' => $hero])

        <div class="mt-8 flex flex-wrap gap-4">
            <x-primary-button>Save slide</x-primary-button>
            <a href="{{ route('dashboard.hero-section.index') }}" class="btn-secondary">Cancel</a>
            <a href="{{ route('home') }}" target="_blank" class="btn-secondary">Preview homepage</a>
        </div>
    </form>
</x-admin-layout>
