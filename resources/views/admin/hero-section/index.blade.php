<x-admin-layout title="Hero Slides" heading="Hero Slides" description="Homepage">
    @include('admin.partials.page-actions', ['createRoute' => 'dashboard.hero-section.create', 'createLabel' => 'Add slide'])

    <div class="mb-6 rounded-2xl border border-chocolate-200 bg-chocolate-50 px-5 py-4 text-sm leading-relaxed text-chocolate-800">
        Published slides rotate automatically on the homepage. Use display order to control the sequence.
    </div>

    <div class="card-luxe overflow-hidden hover:translate-y-0">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="border-b border-chocolate-100 bg-chocolate-50/50 text-xs uppercase tracking-wider text-neutral-500">
                    <tr>
                        <th class="px-6 py-4">Slide</th>
                        <th class="px-6 py-4">Heading</th>
                        <th class="px-6 py-4">Order</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-chocolate-50">
                    @forelse ($slides as $slide)
                        <tr class="hover:bg-chocolate-50/30">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    <div class="h-14 w-20 overflow-hidden rounded-lg bg-chocolate-100">
                                        @if ($slide->backgroundImageUrl())
                                            <img src="{{ $slide->backgroundImageUrl() }}" alt="" class="h-full w-full object-cover">
                                        @endif
                                    </div>
                                    <p class="font-medium text-chocolate-800">{{ $slide->label }}</p>
                                </div>
                            </td>
                            <td class="max-w-sm px-6 py-4 text-neutral-600">{{ Str::limit($slide->heading, 60) }}</td>
                            <td class="px-6 py-4 text-neutral-600">{{ $slide->sort_order }}</td>
                            <td class="px-6 py-4">
                                @if ($slide->is_published)
                                    <span class="rounded-full bg-green-100 px-2 py-1 text-xs text-green-800">Published</span>
                                @else
                                    <span class="rounded-full bg-neutral-100 px-2 py-1 text-xs text-neutral-600">Draft</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('dashboard.hero-section.edit', $slide) }}" class="text-chocolate-600 hover:text-chocolate-800">Edit</a>
                                    <form method="POST" action="{{ route('dashboard.hero-section.destroy', $slide) }}" onsubmit="return confirm('Delete this hero slide?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-neutral-500">No hero slides yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
