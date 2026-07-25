<x-admin-layout title="Add Experience" heading="Add Experience" description="Content management">
    <form method="POST" action="{{ route('dashboard.experiences.store') }}" enctype="multipart/form-data" class="card-luxe max-w-4xl p-8 hover:translate-y-0">
        @csrf
        @include('admin.experiences._form')
        <div class="mt-8 flex gap-4">
            <x-primary-button>Save experience</x-primary-button>
            <a href="{{ route('dashboard.experiences.index') }}" class="btn-secondary">Cancel</a>
        </div>
    </form>
</x-admin-layout>
