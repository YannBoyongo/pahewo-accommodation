<?php

use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DonationController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\HeroSectionController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('pages', [PageController::class, 'index'])->name('pages.index');
        Route::get('pages/{page}/edit', [PageController::class, 'edit'])->name('pages.edit');
        Route::put('pages/{page}', [PageController::class, 'update'])->name('pages.update');

        Route::resource('rooms', RoomController::class)->scoped(['room' => 'id']);
        Route::resource('experiences', ExperienceController::class)->scoped(['experience' => 'id']);
        Route::resource('partners', PartnerController::class)->scoped(['partner' => 'id']);

        Route::resource('bookings', BookingController::class)
            ->only(['index', 'show', 'edit', 'update', 'destroy'])
            ->scoped(['booking' => 'id']);
        Route::patch('bookings/{booking}/approve', [BookingController::class, 'approve'])
            ->name('bookings.approve')
            ->scopeBindings();

        Route::resource('donations', DonationController::class)
            ->only(['index', 'show', 'edit', 'update', 'destroy'])
            ->scoped(['donation' => 'id']);

        Route::get('settings', [SettingController::class, 'edit'])->name('settings.edit');
        Route::put('settings', [SettingController::class, 'update'])->name('settings.update');

        Route::get('hero-section', [HeroSectionController::class, 'edit'])->name('hero-section.edit');
        Route::put('hero-section', [HeroSectionController::class, 'update'])->name('hero-section.update');
    });
});
