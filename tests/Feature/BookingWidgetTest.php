<?php

namespace Tests\Feature;

use App\Livewire\BookingWidget;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class BookingWidgetTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_can_create_a_booking(): void
    {
        $room = Room::factory()->create(['price_per_night' => 200, 'capacity' => 2]);

        Livewire::test(BookingWidget::class, ['room' => $room])
            ->set('check_in', now()->addDays(5)->toDateString())
            ->set('check_out', now()->addDays(8)->toDateString())
            ->set('guests', 2)
            ->set('guest_name', 'Amina Okello')
            ->set('guest_email', 'amina@gmail.com')
            ->call('book')
            ->assertHasNoErrors();

        $booking = Booking::query()->sole();

        $this->assertSame($room->id, $booking->room_id);
        $this->assertSame(3, $booking->nights);
        $this->assertSame('600.00', $booking->total_price);
        $this->assertSame('90.00', $booking->impact_contribution);
        $this->assertSame('pending', $booking->status);
        $this->assertNotEmpty($booking->reference);
    }

    public function test_booking_requires_valid_dates_and_contact_details(): void
    {
        $room = Room::factory()->create();

        Livewire::test(BookingWidget::class, ['room' => $room])
            ->set('check_in', now()->addDays(5)->toDateString())
            ->set('check_out', now()->addDays(3)->toDateString())
            ->set('guest_name', '')
            ->set('guest_email', 'not-an-email')
            ->call('book')
            ->assertHasErrors(['check_out', 'guest_name', 'guest_email']);

        $this->assertSame(0, Booking::query()->count());
    }

    public function test_guests_cannot_exceed_room_capacity(): void
    {
        $room = Room::factory()->create(['capacity' => 2]);

        Livewire::test(BookingWidget::class, ['room' => $room])
            ->set('check_in', now()->addDays(1)->toDateString())
            ->set('check_out', now()->addDays(2)->toDateString())
            ->set('guests', 5)
            ->set('guest_name', 'Amina Okello')
            ->set('guest_email', 'amina@example.com')
            ->call('book')
            ->assertHasErrors(['guests']);

        $this->assertSame(0, Booking::query()->count());
    }

    public function test_check_in_cannot_be_in_the_past(): void
    {
        $room = Room::factory()->create();

        Livewire::test(BookingWidget::class, ['room' => $room])
            ->set('check_in', now()->subDays(2)->toDateString())
            ->set('check_out', now()->addDay()->toDateString())
            ->set('guest_name', 'Amina Okello')
            ->set('guest_email', 'amina@example.com')
            ->call('book')
            ->assertHasErrors(['check_in']);
    }
}
