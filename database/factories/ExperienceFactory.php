<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Experience>
 */
class ExperienceFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = ucwords($this->faker->unique()->words(3, true));

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'category' => $this->faker->randomElement(['Culture', 'Wellness', 'Adventure', 'Community']),
            'description' => $this->faker->paragraphs(2, true),
            'duration' => $this->faker->randomElement(['Half day', 'Full day', '2 hours', '3 hours']),
            'price' => $this->faker->numberBetween(20000, 150000),
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
