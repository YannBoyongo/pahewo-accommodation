<?php

namespace Tests\Feature;

use App\Models\HeroSection;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class HeroSectionTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_cannot_access_hero_section_editor(): void
    {
        $this->get(route('dashboard.hero-section.edit'))
            ->assertRedirect('/login');
    }

    public function test_authenticated_users_can_update_hero_section(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('dashboard.hero-section.edit'))
            ->assertOk()
            ->assertSee('Hero Section')
            ->assertSee('Background photo');

        $response = $this->actingAs($user)->put(route('dashboard.hero-section.update'), [
            'label' => 'Travel with Heart.',
            'heading' => 'Stay for a Cause',
            'description' => 'Updated hero description for the homepage.',
            'image_alt' => 'Luxury pool at dusk',
            'background' => UploadedFile::fake()->image('hero.jpg', 1920, 1080),
        ]);

        $response->assertRedirect(route('dashboard.hero-section.edit'));
        $response->assertSessionHas('success');

        $hero = HeroSection::instance();
        $this->assertSame('Travel with Heart.', $hero->label);
        $this->assertSame('Stay for a Cause', $hero->heading);
        $this->assertTrue($hero->hasMedia('background'));

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('Travel with Heart.')
            ->assertSee('Stay for a Cause')
            ->assertSee('Updated hero description for the homepage.');
    }
}
