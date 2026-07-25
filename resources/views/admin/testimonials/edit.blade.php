<x-admin-layout title="Edit Testimonial" heading="Edit Testimonial" description="Content management">
    <form method="POST" action="{{ route('dashboard.testimonials.update', $testimonial) }}" class="card-luxe max-w-4xl p-8 hover:translate-y-0">
        @csrf
        @method('PUT')
        @include('admin.testimonials._form', ['testimonial' => $testimonial])

        <div class="mt-8 flex flex-wrap gap-4">
            <x-primary-button>Update testimonial</x-primary-button>
            <a href="{{ route('dashboard.testimonials.index') }}" class="btn-secondary">Cancel</a>
        </div>
    </form>

    <form method="POST" action="{{ route('dashboard.testimonials.destroy', $testimonial) }}" class="mt-6" onsubmit="return confirm('Delete this testimonial?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-sm text-red-600 hover:text-red-800">Delete testimonial</button>
    </form>
</x-admin-layout>
