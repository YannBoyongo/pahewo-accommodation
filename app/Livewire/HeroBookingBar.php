<?php

namespace App\Livewire;

use Livewire\Component;

class HeroBookingBar extends Component
{
    public string $check_in = '';

    public string $check_out = '';

    public int $guests = 2;

    public function mount(): void
    {
        $this->check_in = now()->addDay()->toDateString();
        $this->check_out = now()->addDays(2)->toDateString();
    }

    public function checkAvailability(): void
    {
        $this->validate([
            'check_in' => ['required', 'date', 'after_or_equal:today'],
            'check_out' => ['required', 'date', 'after:check_in'],
            'guests' => ['required', 'integer', 'min:1', 'max:8'],
        ]);

        $this->redirect(route('rooms.index', [
            'check_in' => $this->check_in,
            'check_out' => $this->check_out,
            'guests' => $this->guests,
        ]));
    }

    public function render()
    {
        return view('livewire.hero-booking-bar');
    }
}
