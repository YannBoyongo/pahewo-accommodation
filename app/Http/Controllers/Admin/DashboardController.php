<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Donation;
use App\Models\Experience;
use App\Models\Partner;
use App\Models\Room;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'stats' => [
                'rooms' => Room::query()->count(),
                'experiences' => Experience::query()->count(),
                'partners' => Partner::query()->count(),
                'pendingBookings' => Booking::query()->where('status', 'pending')->count(),
                'totalBookings' => Booking::query()->count(),
                'pledgedDonations' => Donation::query()->where('status', 'pledged')->count(),
                'totalDonationAmount' => Donation::query()->sum('amount'),
            ],
            'recentBookings' => Booking::query()->with('room')->latest()->limit(5)->get(),
            'recentDonations' => Donation::query()->latest()->limit(5)->get(),
        ]);
    }
}
