<x-admin-layout title="Bookings" heading="Bookings" description="Operations">
    <div class="card-luxe overflow-hidden hover:translate-y-0">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="border-b border-chocolate-100 bg-chocolate-50/50 text-xs uppercase tracking-wider text-neutral-500">
                    <tr>
                        <th class="px-6 py-4">Reference</th>
                        <th class="px-6 py-4">Guest</th>
                        <th class="px-6 py-4">Room</th>
                        <th class="px-6 py-4">Dates</th>
                        <th class="px-6 py-4">Total</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-chocolate-50">
                    @forelse ($bookings as $booking)
                        <tr class="hover:bg-chocolate-50/30">
                            <td class="px-6 py-4 font-medium text-chocolate-800">{{ $booking->reference }}</td>
                            <td class="px-6 py-4">
                                <p>{{ $booking->guest_name }}</p>
                                <p class="text-xs text-neutral-500">{{ $booking->guest_email }}</p>
                            </td>
                            <td class="px-6 py-4">{{ $booking->room?->name }}</td>
                            <td class="px-6 py-4 text-xs">
                                {{ $booking->check_in->format('M j, Y') }}<br>
                                {{ $booking->check_out->format('M j, Y') }}
                            </td>
                            <td class="px-6 py-4">{{ \App\Support\Currency::format($booking->total_price) }}</td>
                            <td class="px-6 py-4">
                                <span class="rounded-full px-2 py-1 text-xs font-medium capitalize
                                    @if($booking->status === 'confirmed') bg-emerald-100 text-emerald-700
                                    @elseif($booking->status === 'cancelled') bg-red-100 text-red-700
                                    @else bg-amber-100 text-amber-700 @endif">
                                    {{ $booking->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('dashboard.bookings.show', $booking) }}" class="text-chocolate-600 hover:text-chocolate-800">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center text-neutral-500">No bookings yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($bookings->hasPages())
            <div class="border-t border-chocolate-100 px-6 py-4">
                {{ $bookings->links() }}
            </div>
        @endif
    </div>
</x-admin-layout>
