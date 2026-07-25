<x-admin-layout title="Edit Partner" heading="Edit Partner" description="Content management">
    <form method="POST" action="{{ route('dashboard.partners.update', $partner) }}" enctype="multipart/form-data" class="card-luxe max-w-4xl p-8 hover:translate-y-0">
        @csrf
        @method('PUT')
        @include('admin.partners._form', ['partner' => $partner])
        <div class="mt-8 flex flex-wrap gap-4">
            <x-primary-button>Update partner</x-primary-button>
            <a href="{{ route('dashboard.partners.index') }}" class="btn-secondary">Cancel</a>
        </div>
    </form>

    <form method="POST" action="{{ route('dashboard.partners.destroy', $partner) }}" class="mt-6" onsubmit="return confirm('Delete this partner?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-sm text-red-600 hover:text-red-800">Delete partner</button>
    </form>
</x-admin-layout>
