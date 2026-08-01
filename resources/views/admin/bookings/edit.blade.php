<x-admin-layout title="Edit Booking" heading="Edit Booking" description="Operations">
    <form method="POST" action="{{ route('dashboard.bookings.update', $booking) }}" class="card-luxe max-w-4xl p-8 hover:translate-y-0">
        @csrf
        @method('PUT')

        <div class="grid gap-6 lg:grid-cols-2">
            <div>
                <x-input-label for="guest_name" value="Guest name" />
                <x-text-input id="guest_name" name="guest_name" class="input-luxe mt-1" :value="old('guest_name', $booking->guest_name)" required />
                <x-input-error :messages="$errors->get('guest_name')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="guest_email" value="Guest email" />
                <x-text-input id="guest_email" name="guest_email" type="email" class="input-luxe mt-1" :value="old('guest_email', $booking->guest_email)" required />
                <x-input-error :messages="$errors->get('guest_email')" class="mt-2" />
            </div>
        </div>

        <div class="mt-6 grid gap-6 lg:grid-cols-2">
            <div>
                <x-input-label for="guest_phone" value="Guest phone" />
                <x-text-input id="guest_phone" name="guest_phone" class="input-luxe mt-1" :value="old('guest_phone', $booking->guest_phone)" />
                <x-input-error :messages="$errors->get('guest_phone')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="room_id" value="Room" />
                <select id="room_id" name="room_id" class="input-luxe mt-1" required>
                    @foreach ($rooms as $room)
                        <option value="{{ $room->id }}" @selected(old('room_id', $booking->room_id) == $room->id)>{{ $room->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('room_id')" class="mt-2" />
            </div>
        </div>

        <div class="mt-6 grid gap-6 lg:grid-cols-3">
            <div>
                <x-input-label for="check_in" value="Check-in" />
                <x-text-input id="check_in" name="check_in" type="date" class="input-luxe mt-1" :value="old('check_in', $booking->check_in->format('Y-m-d'))" required />
                <x-input-error :messages="$errors->get('check_in')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="check_out" value="Check-out" />
                <x-text-input id="check_out" name="check_out" type="date" class="input-luxe mt-1" :value="old('check_out', $booking->check_out->format('Y-m-d'))" required />
                <x-input-error :messages="$errors->get('check_out')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="guests" value="Guests" />
                <x-text-input id="guests" name="guests" type="number" class="input-luxe mt-1" :value="old('guests', $booking->guests)" required />
                <x-input-error :messages="$errors->get('guests')" class="mt-2" />
            </div>
        </div>

        <div class="mt-6 grid gap-6 lg:grid-cols-3">
            <div>
                <x-input-label for="nights" value="Nights" />
                <x-text-input id="nights" name="nights" type="number" class="input-luxe mt-1" :value="old('nights', $booking->nights)" required />
                <x-input-error :messages="$errors->get('nights')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="total_price" value="Total price (USD)" />
                <x-text-input id="total_price" name="total_price" type="number" step="1" class="input-luxe mt-1" :value="old('total_price', $booking->total_price)" required />
                <x-input-error :messages="$errors->get('total_price')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="impact_contribution" value="Impact contribution (USD)" />
                <x-text-input id="impact_contribution" name="impact_contribution" type="number" step="1" class="input-luxe mt-1" :value="old('impact_contribution', $booking->impact_contribution)" required />
                <x-input-error :messages="$errors->get('impact_contribution')" class="mt-2" />
            </div>
        </div>

        <div class="mt-6">
            <x-input-label for="status" value="Status" />
            <select id="status" name="status" class="input-luxe mt-1 max-w-xs" required>
                @foreach ($statuses as $status)
                    <option value="{{ $status }}" @selected(old('status', $booking->status) === $status)>{{ ucfirst($status) }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('status')" class="mt-2" />
        </div>

        <div class="mt-6">
            <x-input-label for="special_requests" value="Special requests" />
            <textarea id="special_requests" name="special_requests" rows="4" class="input-luxe mt-1">{{ old('special_requests', $booking->special_requests) }}</textarea>
            <x-input-error :messages="$errors->get('special_requests')" class="mt-2" />
        </div>

        <div class="mt-8 flex flex-wrap gap-4">
            <x-primary-button>Update booking</x-primary-button>
            <a href="{{ route('dashboard.bookings.show', $booking) }}" class="btn-secondary">Cancel</a>
        </div>
    </form>

    <form method="POST" action="{{ route('dashboard.bookings.destroy', $booking) }}" class="mt-6" onsubmit="return confirm('Delete this booking?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-sm text-red-600 hover:text-red-800">Delete booking</button>
    </form>
</x-admin-layout>
