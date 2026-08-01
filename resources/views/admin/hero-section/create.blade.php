<x-admin-layout title="Add Hero Slide" heading="Add Hero Slide" description="Homepage">
    <form method="POST" action="{{ route('dashboard.hero-section.store') }}" enctype="multipart/form-data" class="card-luxe max-w-4xl p-8 hover:translate-y-0">
        @csrf
        @include('admin.hero-section._form')

        <div class="mt-8 flex flex-wrap gap-4">
            <x-primary-button>Save slide</x-primary-button>
            <a href="{{ route('dashboard.hero-section.index') }}" class="btn-secondary">Cancel</a>
        </div>
    </form>
</x-admin-layout>
