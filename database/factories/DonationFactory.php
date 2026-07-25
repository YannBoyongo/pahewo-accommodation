<?php

namespace Database\Factories;

use App\Models\Donation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Donation>
 */
class DonationFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reference' => Donation::generateReference(),
            'donor_name' => $this->faker->name(),
            'donor_email' => $this->faker->safeEmail(),
            'amount' => $this->faker->randomElement([25000, 50000, 100000, 250000]),
            'currency' => 'UGX',
            'designation' => $this->faker->randomElement(['general', 'medical-care', 'sanctuary', 'awareness']),
            'message' => null,
            'status' => 'pledged',
        ];
    }
}
