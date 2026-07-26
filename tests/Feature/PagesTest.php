<?php

namespace Tests\Feature;

use App\Models\Experience;
use App\Models\Partner;
use App\Models\Room;
use App\Models\Testimonial;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_renders_featured_content(): void
    {
        $room = Room::factory()->featured()->create();
        $experience = Experience::factory()->featured()->create();
        $partner = Partner::factory()->create();
        $testimonial = Testimonial::factory()->create([
            'quote' => 'A beautifully peaceful stay with thoughtful, attentive service.',
        ]);

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('Help Heal with Us')
            ->assertSee('Check Availability')
            ->assertSeeLivewire('hero-booking-bar')
            ->assertSee($room->name)
            ->assertSee($experience->name)
            ->assertSee('Built Together, Not Alone')
            ->assertSee($partner->name)
            ->assertSee($testimonial->quote)
            ->assertSee('images/favicon.png');
    }

    public function test_rooms_index_lists_all_rooms(): void
    {
        $rooms = Room::factory()->count(3)->create();

        $response = $this->get(route('rooms.index'))->assertOk();

        foreach ($rooms as $room) {
            $response->assertSee($room->name);
        }
    }

    public function test_room_detail_page_renders(): void
    {
        $room = Room::factory()->create();

        $this->get(route('rooms.show', $room))
            ->assertOk()
            ->assertSee($room->name)
            ->assertSeeLivewire('booking-widget');
    }

    public function test_experiences_pages_render(): void
    {
        $experience = Experience::factory()->create();

        $this->get(route('experiences.index'))->assertOk()->assertSee($experience->name);
        $this->get(route('experiences.show', $experience))->assertOk()->assertSee($experience->name);
    }

    public function test_about_pahewo_page_renders(): void
    {
        $this->get(route('about-pahewo'))
            ->assertOk()
            ->assertSee('PAHEWO');
    }
}
