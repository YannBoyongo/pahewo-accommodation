<x-admin-layout title="Booking {{ $booking->reference }}" heading="Booking {{ $booking->reference }}" description="Operations">

    @if (session('success'))
        <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm font-medium text-green-800">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-6 flex flex-wrap items-center gap-3">
        @if ($booking->status === 'pending')
            <form method="POST" action="{{ route('dashboard.bookings.approve', $booking) }}">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn-primary">
                    Approve booking
                </button>
            </form>
        @endif

        <a href="{{ route('dashboard.bookings.edit', $booking) }}" class="btn-secondary">Edit</a>

        <form method="POST" action="{{ route('dashboard.bookings.destroy', $booking) }}"
              onsubmit="return confirm('Delete this booking permanently? This cannot be undone.')">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="rounded-xl border border-red-200 bg-red-50 px-4 py-2 text-sm font-semibold text-red-700 transition hover:bg-red-100">
                Delete
            </button>
        </form>

        <a href="{{ route('dashboard.bookings.index') }}" class="btn-secondary">Back to list</a>
    </div>

    <div class="grid gap-6 lg:grid-cols-2">
        <div class="card-luxe p-6 hover:translate-y-0">
            <h2 class="font-serif text-xl text-chocolate-800">Guest details</h2>
            <dl class="mt-4 space-y-3 text-sm">
                <div><dt class="text-neutral-500">Name</dt><dd class="font-medium text-chocolate-800">{{ $booking->guest_name }}</dd></div>
                <div><dt class="text-neutral-500">Email</dt><dd>{{ $booking->guest_email }}</dd></div>
                <div><dt class="text-neutral-500">Phone</dt><dd>{{ $booking->guest_phone ?: '—' }}</dd></div>
            </dl>
        </div>

        <div class="card-luxe p-6 hover:translate-y-0">
            <h2 class="font-serif text-xl text-chocolate-800">Stay details</h2>
            <dl class="mt-4 space-y-3 text-sm">
                <div><dt class="text-neutral-500">Room</dt><dd class="font-medium text-chocolate-800">{{ $booking->room?->name }}</dd></div>
                <div><dt class="text-neutral-500">Check-in</dt><dd>{{ $booking->check_in->format('F j, Y') }}</dd></div>
                <div><dt class="text-neutral-500">Check-out</dt><dd>{{ $booking->check_out->format('F j, Y') }}</dd></div>
                <div><dt class="text-neutral-500">Guests</dt><dd>{{ $booking->guests }} · {{ $booking->nights }} nights</dd></div>
            </dl>
        </div>

        <div class="card-luxe p-6 hover:translate-y-0">
            <h2 class="font-serif text-xl text-chocolate-800">Payment & impact</h2>
            <dl class="mt-4 space-y-3 text-sm">
                <div><dt class="text-neutral-500">Total price</dt><dd class="font-serif text-2xl text-chocolate-800">{{ \App\Support\Currency::format($booking->total_price) }}</dd></div>
                <div><dt class="text-neutral-500">PAHEWO contribution</dt><dd>{{ \App\Support\Currency::format($booking->impact_contribution) }}</dd></div>
                <div>
                    <dt class="text-neutral-500">Status</dt>
                    <dd class="mt-0.5">
                        @php
                            $badgeClass = match($booking->status) {
                                'confirmed' => 'bg-green-100 text-green-800',
                                'cancelled' => 'bg-red-100 text-red-800',
                                default     => 'bg-yellow-100 text-yellow-800',
                            };
                        @endphp
                        <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-semibold capitalize {{ $badgeClass }}">
                            {{ $booking->status }}
                        </span>
                    </dd>
                </div>
            </dl>
        </div>

        <div class="card-luxe p-6 hover:translate-y-0">
            <h2 class="font-serif text-xl text-chocolate-800">Special requests</h2>
            <p class="mt-4 text-sm text-neutral-600">{{ $booking->special_requests ?: 'None' }}</p>
        </div>
    </div>
</x-admin-layout>
