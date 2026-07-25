<x-admin-layout title="Add Partner" heading="Add Partner" description="Content management">
    <form method="POST" action="{{ route('dashboard.partners.store') }}" enctype="multipart/form-data" class="card-luxe max-w-4xl p-8 hover:translate-y-0">
        @csrf
        @include('admin.partners._form')
        <div class="mt-8 flex gap-4">
            <x-primary-button>Save partner</x-primary-button>
            <a href="{{ route('dashboard.partners.index') }}" class="btn-secondary">Cancel</a>
        </div>
    </form>
</x-admin-layout>
