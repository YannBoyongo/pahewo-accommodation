<?php

namespace App\Livewire;

use App\Mail\BookingConfirmation;
use App\Mail\BookingNotification;
use App\Models\Booking;
use App\Models\Room;
use App\Models\Setting;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Component;
use Spatie\Honeypot\Http\Livewire\Concerns\HoneypotData;
use Spatie\Honeypot\Http\Livewire\Concerns\UsesSpamProtection;

class BookingWidget extends Component
{
    use UsesSpamProtection;

    public Room $room;

    public HoneypotData $extraFields;

    public string $check_in = '';

    public string $check_out = '';

    public int $guests = 2;

    public string $guest_name = '';

    public string $guest_email = '';

    public string $guest_phone = '';

    public string $special_requests = '';

    public ?string $confirmedReference = null;

    public function mount(Room $room): void
    {
        $this->room = $room;
        $this->extraFields = new HoneypotData;
        $this->check_in = now()->addDay()->toDateString();
        $this->check_out = now()->addDays(2)->toDateString();
    }

    public function nights(): int
    {
        if ($this->check_in === '' || $this->check_out === '') {
            return 0;
        }

        $nights = now()->parse($this->check_in)->diffInDays(now()->parse($this->check_out), false);

        return max((int) $nights, 0);
    }

    public function totalPrice(): float
    {
        return round($this->nights() * (float) $this->room->price_per_night, 2);
    }

    public function impactContribution(): float
    {
        return round($this->totalPrice() * Booking::IMPACT_SHARE, 2);
    }

    public function book(): void
    {
        $this->protectAgainstSpam();

        $rateLimitKey = 'booking-widget:'.request()->ip();

        if (RateLimiter::tooManyAttempts($rateLimitKey, 5)) {
            $this->addError('guest_email', 'Too many booking attempts. Please wait a few minutes and try again.');

            return;
        }

        RateLimiter::hit($rateLimitKey, 600);

        $this->validate([
            'check_in' => ['required', 'date', 'after_or_equal:today'],
            'check_out' => ['required', 'date', 'after:check_in'],
            'guests' => ['required', 'integer', 'min:1', 'max:'.$this->room->capacity],
            'guest_name' => ['required', 'string', 'max:255'],
            'guest_email' => ['required', 'email:rfc,dns', 'indisposable', 'max:255'],
            'guest_phone' => ['nullable', 'string', 'max:50'],
            'special_requests' => ['nullable', 'string', 'max:2000'],
        ]);

        $booking = Booking::query()->create([
            'room_id'             => $this->room->id,
            'reference'           => Booking::generateReference(),
            'guest_name'          => $this->guest_name,
            'guest_email'         => $this->guest_email,
            'guest_phone'         => $this->guest_phone ?: null,
            'check_in'            => $this->check_in,
            'check_out'           => $this->check_out,
            'guests'              => $this->guests,
            'nights'              => $this->nights(),
            'total_price'         => $this->totalPrice(),
            'impact_contribution' => $this->impactContribution(),
            'special_requests'    => $this->special_requests ?: null,
            'status'              => 'pending',
        ]);

        $booking->load('room');

        Mail::to($booking->guest_email)->send(new BookingConfirmation($booking));

        $adminEmail = Setting::instance()->email;
        if ($adminEmail) {
            Mail::to($adminEmail)->send(new BookingNotification($booking));
        }

        $this->confirmedReference = $booking->reference;
    }

    public function render()
    {
        return view('livewire.booking-widget');
    }
}
