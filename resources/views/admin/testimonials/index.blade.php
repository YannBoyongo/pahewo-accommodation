<x-admin-layout title="Testimonials" heading="Testimonials" description="Content management">
    @include('admin.partials.page-actions', ['createRoute' => 'dashboard.testimonials.create', 'createLabel' => 'Add testimonial'])

    <div class="card-luxe overflow-hidden hover:translate-y-0">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="border-b border-chocolate-100 bg-chocolate-50/50 text-xs uppercase tracking-wider text-neutral-500">
                    <tr>
                        <th class="px-6 py-4">Guest</th>
                        <th class="px-6 py-4">Testimonial</th>
                        <th class="px-6 py-4">Order</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-chocolate-50">
                    @forelse ($testimonials as $testimonial)
                        <tr class="hover:bg-chocolate-50/30">
                            <td class="px-6 py-4">
                                <p class="font-medium text-chocolate-800">{{ $testimonial->guest_name }}</p>
                                <p class="mt-1 text-xs text-neutral-500">{{ $testimonial->stay_type ?: 'No stay type' }}</p>
                            </td>
                            <td class="max-w-xl px-6 py-4 text-neutral-600">
                                {{ Str::limit($testimonial->quote, 140) }}
                            </td>
                            <td class="px-6 py-4 text-neutral-600">{{ $testimonial->sort_order }}</td>
                            <td class="px-6 py-4">
                                @if ($testimonial->is_published)
                                    <span class="rounded-full bg-green-100 px-2 py-1 text-xs text-green-800">Published</span>
                                @else
                                    <span class="rounded-full bg-neutral-100 px-2 py-1 text-xs text-neutral-600">Draft</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('dashboard.testimonials.edit', $testimonial) }}" class="text-chocolate-600 hover:text-chocolate-800">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-neutral-500">No testimonials yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
