<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookingInquiryController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SitemapController;
use App\Models\Page;
use App\Models\Partner;
use App\Models\Room;
use App\Models\Setting;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;

Route::get('/', function () {
    return view('pages.home', [
        'featuredRooms' => Room::query()->where('is_featured', true)->orderBy('sort_order')->get(),
        'partners' => Partner::query()->orderByDesc('is_featured')->orderBy('name')->get(),
        'siteSettings' => Setting::instance(),
        'testimonials' => Testimonial::query()
            ->where('is_published', true)
            ->orderBy('sort_order')
            ->latest()
            ->get(),
    ]);
})->name('home');

Route::get('/book', [BookingInquiryController::class, 'create'])->name('booking-inquiry.create');
Route::post('/book', [BookingInquiryController::class, 'store'])
    ->middleware(['throttle:5,10', ProtectAgainstSpam::class])
    ->name('booking-inquiry.store');
Route::get('/book/thank-you', [BookingInquiryController::class, 'thanks'])->name('booking-inquiry.thanks');

Route::get('/rooms', [BookingController::class, 'index'])->name('rooms.index');
Route::get('/rooms/{room}', [BookingController::class, 'show'])->name('rooms.show');

Route::view('/dining', 'pages.dining')->name('dining');
Route::view('/conference-meeting', 'pages.conference-meeting')->name('conference-meeting');
Route::get('/contact', function () {
    return view('pages.contact', [
        'siteSettings' => Setting::instance(),
        'pageContent' => Page::managed('contact'),
    ]);
})->name('contact');

Route::get('/experiences', [ExperienceController::class, 'index'])->name('experiences.index');
Route::get('/experiences/{experience}', [ExperienceController::class, 'show'])->name('experiences.show');

Route::view('/about-pahewo', 'pages.about-pahewo')->name('about-pahewo');

Route::view('/privacy', 'pages.privacy')->name('privacy');

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

Route::get('/donate', [DonationController::class, 'index'])->name('donate.index');
Route::post('/donate', [DonationController::class, 'store'])
    ->middleware(ProtectAgainstSpam::class)
    ->name('donate.store');
Route::get('/donate/thank-you', [DonationController::class, 'thanks'])->name('donate.thanks');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
