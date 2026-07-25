<x-admin-layout title="Add Testimonial" heading="Add Testimonial" description="Content management">
    <form method="POST" action="{{ route('dashboard.testimonials.store') }}" class="card-luxe max-w-4xl p-8 hover:translate-y-0">
        @csrf
        @include('admin.testimonials._form')

        <div class="mt-8 flex gap-4">
            <x-primary-button>Save testimonial</x-primary-button>
            <a href="{{ route('dashboard.testimonials.index') }}" class="btn-secondary">Cancel</a>
        </div>
    </form>
</x-admin-layout>
