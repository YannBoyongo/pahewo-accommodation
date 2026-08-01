<?php

namespace Tests\Feature;

use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TestimonialRatingTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_shows_testimonial_star_rating(): void
    {
        Testimonial::factory()->create([
            'quote' => 'A beautifully peaceful stay with thoughtful, attentive service.',
            'rating' => 4,
            'is_published' => true,
        ]);

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('Rated 4 out of 5 stars', false);
    }

    public function test_admin_can_save_testimonial_rating(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('dashboard.testimonials.store'), [
            'guest_name' => 'Ada Guest',
            'stay_type' => 'Leisure stay',
            'quote' => 'An outstanding stay from check-in to breakfast.',
            'rating' => 5,
            'sort_order' => 1,
            'is_published' => 1,
        ]);

        $response->assertRedirect(route('dashboard.testimonials.index'));

        $this->assertDatabaseHas('testimonials', [
            'guest_name' => 'Ada Guest',
            'rating' => 5,
        ]);
    }

    public function test_testimonial_rating_must_be_between_one_and_five(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->post(route('dashboard.testimonials.store'), [
            'guest_name' => 'Ada Guest',
            'stay_type' => 'Leisure stay',
            'quote' => 'An outstanding stay from check-in to breakfast.',
            'rating' => 6,
            'sort_order' => 1,
            'is_published' => 1,
        ])->assertSessionHasErrors('rating');
    }
}
