<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = ucwords($this->faker->unique()->words(2, true)).' Suite';

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'tagline' => $this->faker->sentence(6),
            'description' => $this->faker->paragraphs(2, true),
            'price_per_night' => $this->faker->numberBetween(80000, 450000),
            'capacity' => $this->faker->numberBetween(1, 4),
            'size_sqm' => $this->faker->numberBetween(24, 90),
            'bed_setup' => $this->faker->randomElement(['1 King Bed', '2 Queen Beds', '1 Queen Bed']),
            'amenities' => ['Wi-Fi', 'Air conditioning', 'En-suite bathroom', 'Breakfast included'],
            'image_url' => null,
            'is_featured' => false,
            'sort_order' => 0,
        ];
    }

    public function featured(): static
    {
        return $this->state(fn (array $attributes): array => ['is_featured' => true]);
    }
}
