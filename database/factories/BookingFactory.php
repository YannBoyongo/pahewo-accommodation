<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $checkIn = $this->faker->dateTimeBetween('+1 week', '+2 months');
        $nights = $this->faker->numberBetween(1, 7);
        $checkOut = (clone $checkIn)->modify("+{$nights} days");
        $pricePerNight = $this->faker->numberBetween(80000, 450000);
        $total = round($pricePerNight * $nights, 2);

        return [
            'room_id' => Room::factory(),
            'reference' => Booking::generateReference(),
            'guest_name' => $this->faker->name(),
            'guest_email' => $this->faker->safeEmail(),
            'guest_phone' => $this->faker->phoneNumber(),
            'check_in' => $checkIn,
            'check_out' => $checkOut,
            'guests' => $this->faker->numberBetween(1, 4),
            'nights' => $nights,
            'total_price' => $total,
            'impact_contribution' => round($total * Booking::IMPACT_SHARE, 2),
            'special_requests' => null,
            'status' => 'pending',
        ];
    }

    public function confirmed(): static
    {
        return $this->state(fn (array $attributes): array => ['status' => 'confirmed']);
    }
}
