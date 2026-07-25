<?php

namespace App\Http\Controllers;

use App\Mail\BookingInquiryConfirmation;
use App\Mail\BookingInquiryNotification;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class BookingInquiryController extends Controller
{
    public function create(): View
    {
        return view('pages.booking-inquiry', [
            'siteSettings' => Setting::instance(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name'            => ['required', 'string', 'max:255'],
            'email'           => ['required', 'email:rfc,dns', 'indisposable', 'max:255'],
            'phone'           => ['nullable', 'string', 'max:50'],
            'arrival'         => ['required', 'date', 'after_or_equal:today'],
            'departure'       => ['required', 'date', 'after:arrival'],
            'guests'          => ['required', 'integer', 'min:1', 'max:20'],
            'additional_info' => ['nullable', 'string', 'max:3000'],
        ]);

        Mail::to($validated['email'])->send(new BookingInquiryConfirmation($validated));

        $adminEmail = Setting::instance()->email;
        Mail::to($adminEmail)->send(new BookingInquiryNotification($validated));

        return redirect()
            ->route('booking-inquiry.thanks')
            ->with('inquiry_name', $validated['name']);
    }

    public function thanks(): View
    {
        return view('pages.booking-inquiry-thanks');
    }
}
