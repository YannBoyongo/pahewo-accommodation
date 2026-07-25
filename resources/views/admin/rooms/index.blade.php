<x-admin-layout title="Rooms" heading="Rooms" description="Content management">
    @include('admin.partials.page-actions', ['createRoute' => 'dashboard.rooms.create', 'createLabel' => 'Add room'])

    <div class="card-luxe overflow-hidden hover:translate-y-0">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="border-b border-chocolate-100 bg-chocolate-50/50 text-xs uppercase tracking-wider text-neutral-500">
                    <tr>
                        <th class="px-6 py-4">Room</th>
                        <th class="px-6 py-4">Price / night</th>
                        <th class="px-6 py-4">Capacity</th>
                        <th class="px-6 py-4">Featured</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-chocolate-50">
                    @forelse ($rooms as $room)
                        <tr class="hover:bg-chocolate-50/30">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    @if ($room->coverImageUrl())
                                        <img src="{{ $room->coverImageUrl() }}" alt="" class="h-12 w-16 rounded-lg object-cover ring-1 ring-chocolate-100">
                                    @endif
                                    <div>
                                        <p class="font-medium text-chocolate-800">{{ $room->name }}</p>
                                        <p class="text-xs text-neutral-500">{{ $room->slug }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">{{ \App\Support\Currency::format($room->price_per_night) }}</td>
                            <td class="px-6 py-4">{{ $room->capacity }} guests</td>
                            <td class="px-6 py-4">
                                @if ($room->is_featured)
                                    <span class="rounded-full bg-gold-100 px-2 py-1 text-xs text-gold-700">Featured</span>
                                @else
                                    <span class="text-neutral-400">—</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('dashboard.rooms.edit', $room) }}" class="text-chocolate-600 hover:text-chocolate-800">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-neutral-500">No rooms yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
