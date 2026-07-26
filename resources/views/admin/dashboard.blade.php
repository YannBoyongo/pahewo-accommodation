<x-admin-layout
    title="Dashboard"
    heading="Dashboard"
    description="Overview"
>
    <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-3">
        <div class="admin-stat-card">
            <p class="text-sm text-neutral-500">Rooms</p>
            <p class="mt-2 font-serif text-3xl text-chocolate-800">{{ $stats['rooms'] }}</p>
            <a href="{{ route('dashboard.rooms.index') }}" class="mt-3 inline-block text-sm text-chocolate-600 hover:text-chocolate-800">Manage rooms →</a>
        </div>
        <div class="admin-stat-card">
            <p class="text-sm text-neutral-500">Experiences</p>
            <p class="mt-2 font-serif text-3xl text-chocolate-800">{{ $stats['experiences'] }}</p>
            <a href="{{ route('dashboard.experiences.index') }}" class="mt-3 inline-block text-sm text-chocolate-600 hover:text-chocolate-800">Manage experiences →</a>
        </div>
        <div class="admin-stat-card">
            <p class="text-sm text-neutral-500">Pending bookings</p>
            <p class="mt-2 font-serif text-3xl text-chocolate-800">{{ $stats['pendingBookings'] }}</p>
            <p class="mt-1 text-xs text-neutral-500">{{ $stats['totalBookings'] }} total</p>
        </div>
    </div>

    <div class="mt-8">
        <div class="card-luxe overflow-hidden hover:translate-y-0">
            <div class="flex items-center justify-between border-b border-chocolate-100 px-6 py-4">
                <h2 class="font-serif text-xl text-chocolate-800">Recent bookings</h2>
                <a href="{{ route('dashboard.bookings.index') }}" class="text-sm text-chocolate-600 hover:text-chocolate-800">View all</a>
            </div>
            <div class="divide-y divide-chocolate-50">
                @forelse ($recentBookings as $booking)
                    <a href="{{ route('dashboard.bookings.show', $booking) }}" class="flex items-center justify-between px-6 py-4 transition hover:bg-chocolate-50/50">
                        <div>
                            <p class="font-medium text-chocolate-800">{{ $booking->guest_name }}</p>
                            <p class="text-sm text-neutral-500">{{ $booking->room?->name }} · {{ $booking->reference }}</p>
                        </div>
                        <span class="rounded-full px-3 py-1 text-xs font-medium capitalize
                            @if($booking->status === 'confirmed') bg-emerald-100 text-emerald-700
                            @elseif($booking->status === 'cancelled') bg-red-100 text-red-700
                            @else bg-amber-100 text-amber-700 @endif">
                            {{ $booking->status }}
                        </span>
                    </a>
                @empty
                    <p class="px-6 py-8 text-sm text-neutral-500">No bookings yet.</p>
                @endforelse
            </div>
        </div>

    </div>

    <div class="mt-8 grid gap-4 sm:grid-cols-3">
        <a href="{{ route('dashboard.partners.index') }}" class="card-luxe p-6 hover:translate-y-0">
            <p class="text-sm text-neutral-500">Partners</p>
            <p class="mt-2 font-serif text-2xl text-chocolate-800">{{ $stats['partners'] }}</p>
        </a>
        <a href="{{ route('dashboard.testimonials.index') }}" class="card-luxe p-6 hover:translate-y-0">
            <p class="text-sm text-neutral-500">Testimonials</p>
            <p class="mt-2 font-serif text-2xl text-chocolate-800">{{ $stats['testimonials'] }}</p>
        </a>
        <a href="{{ route('home') }}" class="card-luxe flex items-center justify-center p-6 hover:translate-y-0">
            <span class="text-sm font-medium text-chocolate-700">View public website →</span>
        </a>
    </div>
</x-admin-layout>
