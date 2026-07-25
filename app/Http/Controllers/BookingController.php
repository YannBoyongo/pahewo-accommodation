<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\View\View;

class BookingController extends Controller
{
    public function index(): View
    {
        return view('pages.rooms', [
            'rooms' => Room::query()->orderBy('sort_order')->get(),
        ]);
    }

    public function show(Room $room): View
    {
        return view('pages.room-detail', [
            'room' => $room,
            'otherRooms' => Room::query()
                ->whereKeyNot($room->id)
                ->orderBy('sort_order')
                ->limit(3)
                ->get(),
        ]);
    }
}
