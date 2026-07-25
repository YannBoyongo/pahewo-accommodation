<x-admin-layout title="Edit Experience" heading="Edit Experience" description="Content management">
    <form method="POST" action="{{ route('dashboard.experiences.update', $experience) }}" enctype="multipart/form-data" class="card-luxe max-w-4xl p-8 hover:translate-y-0">
        @csrf
        @method('PUT')
        @include('admin.experiences._form', ['experience' => $experience])
        <div class="mt-8 flex flex-wrap gap-4">
            <x-primary-button>Update experience</x-primary-button>
            <a href="{{ route('dashboard.experiences.index') }}" class="btn-secondary">Cancel</a>
        </div>
    </form>

    <form method="POST" action="{{ route('dashboard.experiences.destroy', $experience) }}" class="mt-6" onsubmit="return confirm('Delete this experience?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-sm text-red-600 hover:text-red-800">Delete experience</button>
    </form>
</x-admin-layout>
