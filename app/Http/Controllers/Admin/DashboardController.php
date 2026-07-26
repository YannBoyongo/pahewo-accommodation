<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Experience;
use App\Models\Partner;
use App\Models\Room;
use App\Models\Testimonial;
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
                'testimonials' => Testimonial::query()->count(),
                'pendingBookings' => Booking::query()->where('status', 'pending')->count(),
                'totalBookings' => Booking::query()->count(),
            ],
            'recentBookings' => Booking::query()->with('room')->latest()->limit(5)->get(),
        ]);
    }
}
