<x-admin-layout title="Edit Room" heading="Edit Room" description="Content management">
    <form method="POST" action="{{ route('dashboard.rooms.update', $room) }}" enctype="multipart/form-data" class="card-luxe max-w-4xl p-8 hover:translate-y-0">
        @csrf
        @method('PUT')
        @include('admin.rooms._form', ['room' => $room])
        <div class="mt-8 flex flex-wrap gap-4">
            <x-primary-button>Update room</x-primary-button>
            <a href="{{ route('dashboard.rooms.index') }}" class="btn-secondary">Cancel</a>
        </div>
    </form>

    <form method="POST" action="{{ route('dashboard.rooms.destroy', $room) }}" class="mt-6" onsubmit="return confirm('Delete this room?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-sm text-red-600 hover:text-red-800">Delete room</button>
    </form>
</x-admin-layout>
