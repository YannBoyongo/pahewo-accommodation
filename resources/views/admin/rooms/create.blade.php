<x-admin-layout title="Add Room" heading="Add Room" description="Content management">
    <form method="POST" action="{{ route('dashboard.rooms.store') }}" enctype="multipart/form-data" class="card-luxe max-w-4xl p-8 hover:translate-y-0">
        @csrf
        @include('admin.rooms._form')
        <div class="mt-8 flex gap-4">
            <x-primary-button>Save room</x-primary-button>
            <a href="{{ route('dashboard.rooms.index') }}" class="btn-secondary">Cancel</a>
        </div>
    </form>
</x-admin-layout>
