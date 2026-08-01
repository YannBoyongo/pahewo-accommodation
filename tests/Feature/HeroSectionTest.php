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

    public function test_guests_cannot_access_hero_slides_admin(): void
    {
        $this->get(route('dashboard.hero-section.index'))
            ->assertRedirect('/login');
    }

    public function test_authenticated_users_can_manage_hero_slides(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('dashboard.hero-section.index'))
            ->assertOk()
            ->assertSee('Hero Slides');

        $response = $this->actingAs($user)->post(route('dashboard.hero-section.store'), [
            'label' => 'Travel with Heart.',
            'heading' => 'Stay for a Cause',
            'description' => 'Updated hero description for the homepage.',
            'image_alt' => 'Luxury pool at dusk',
            'sort_order' => 1,
            'is_published' => 1,
            'background' => UploadedFile::fake()->image('hero.jpg', 1920, 1080),
        ]);

        $response->assertRedirect(route('dashboard.hero-section.index'));
        $response->assertSessionHas('success');

        $hero = HeroSection::query()->first();
        $this->assertNotNull($hero);
        $this->assertSame('Travel with Heart.', $hero->label);
        $this->assertSame('Stay for a Cause', $hero->heading);
        $this->assertTrue($hero->hasMedia('background'));

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('Travel with Heart.')
            ->assertSee('Stay for a Cause')
            ->assertSee('Updated hero description for the homepage.');
    }

    public function test_homepage_rotates_published_hero_slides(): void
    {
        HeroSection::factory()->create([
            'label' => 'First Label',
            'heading' => 'First Heading',
            'is_published' => true,
            'sort_order' => 1,
        ]);

        HeroSection::factory()->create([
            'label' => 'Second Label',
            'heading' => 'Second Heading',
            'is_published' => true,
            'sort_order' => 2,
        ]);

        HeroSection::factory()->unpublished()->create([
            'label' => 'Hidden Label',
            'heading' => 'Hidden Heading',
        ]);

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('First Label')
            ->assertSee('First Heading')
            ->assertSee('Second Label')
            ->assertSee('Second Heading')
            ->assertDontSee('Hidden Label')
            ->assertSee('Show hero slide 1')
            ->assertSee('Show hero slide 2');
    }

    public function test_authenticated_users_can_update_and_delete_hero_slides(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $hero = HeroSection::factory()->create([
            'label' => 'Original Label',
            'heading' => 'Original Heading',
        ]);

        $this->actingAs($user)
            ->put(route('dashboard.hero-section.update', $hero), [
                'label' => 'Revised Label',
                'heading' => 'Revised Heading',
                'description' => 'Revised description for this slide.',
                'image_alt' => 'Revised alt',
                'sort_order' => 2,
                'is_published' => 1,
            ])
            ->assertRedirect(route('dashboard.hero-section.index'));

        $this->assertDatabaseHas('hero_sections', [
            'id' => $hero->id,
            'label' => 'Revised Label',
            'heading' => 'Revised Heading',
        ]);

        $this->actingAs($user)
            ->delete(route('dashboard.hero-section.destroy', $hero))
            ->assertRedirect(route('dashboard.hero-section.index'));

        $this->assertDatabaseMissing('hero_sections', [
            'id' => $hero->id,
        ]);
    }
}
