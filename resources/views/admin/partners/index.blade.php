<x-admin-layout title="Partners" heading="Partners" description="Content management">
    @include('admin.partials.page-actions', ['createRoute' => 'dashboard.partners.create', 'createLabel' => 'Add partner'])

    <div class="card-luxe overflow-hidden hover:translate-y-0">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="border-b border-chocolate-100 bg-chocolate-50/50 text-xs uppercase tracking-wider text-neutral-500">
                    <tr>
                        <th class="px-6 py-4">Partner</th>
                        <th class="px-6 py-4">Website</th>
                        <th class="px-6 py-4">Featured</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-chocolate-50">
                    @forelse ($partners as $partner)
                        <tr class="hover:bg-chocolate-50/30">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    @if ($partner->logoUrl())
                                        <img src="{{ $partner->logoUrl() }}" alt="" class="h-12 w-12 rounded-lg object-contain ring-1 ring-chocolate-100 bg-white p-1">
                                    @endif
                                    <span class="font-medium text-chocolate-800">{{ $partner->name }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                @if ($partner->website_url)
                                    <a href="{{ $partner->website_url }}" target="_blank" class="text-chocolate-600 hover:text-chocolate-800">Visit</a>
                                @else
                                    —
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if ($partner->is_featured)
                                    <span class="rounded-full bg-gold-100 px-2 py-1 text-xs text-gold-700">Featured</span>
                                @else
                                    <span class="text-neutral-400">—</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('dashboard.partners.edit', $partner) }}" class="text-chocolate-600 hover:text-chocolate-800">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-neutral-500">No partners yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
