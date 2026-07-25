<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class BookingController extends Controller
{
    public function index(): View
    {
        return view('admin.bookings.index', [
            'bookings' => Booking::query()
                ->with('room')
                ->latest()
                ->paginate(15),
        ]);
    }

    public function show(Booking $booking): View
    {
        $booking->load('room');

        return view('admin.bookings.show', compact('booking'));
    }

    public function edit(Booking $booking): View
    {
        return view('admin.bookings.edit', [
            'booking' => $booking,
            'rooms' => Room::query()->orderBy('name')->get(),
            'statuses' => ['pending', 'confirmed', 'cancelled'],
        ]);
    }

    public function update(Request $request, Booking $booking): RedirectResponse
    {
        $validated = $request->validate([
            'room_id' => ['required', 'exists:rooms,id'],
            'guest_name' => ['required', 'string', 'max:255'],
            'guest_email' => ['required', 'email', 'max:255'],
            'guest_phone' => ['nullable', 'string', 'max:50'],
            'check_in' => ['required', 'date'],
            'check_out' => ['required', 'date', 'after:check_in'],
            'guests' => ['required', 'integer', 'min:1', 'max:20'],
            'nights' => ['required', 'integer', 'min:1'],
            'total_price' => ['required', 'numeric', 'min:0'],
            'impact_contribution' => ['required', 'numeric', 'min:0'],
            'special_requests' => ['nullable', 'string'],
            'status' => ['required', Rule::in(['pending', 'confirmed', 'cancelled'])],
        ]);

        $booking->update($validated);

        return redirect()
            ->route('dashboard.bookings.show', $booking)
            ->with('success', 'Booking updated successfully.');
    }

    public function approve(Booking $booking): RedirectResponse
    {
        $booking->update(['status' => 'confirmed']);

        return redirect()
            ->route('dashboard.bookings.show', $booking)
            ->with('success', 'Booking confirmed successfully.');
    }

    public function destroy(Booking $booking): RedirectResponse
    {
        $booking->delete();

        return redirect()
            ->route('dashboard.bookings.index')
            ->with('success', 'Booking deleted successfully.');
    }
}
