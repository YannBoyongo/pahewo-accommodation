<?php

namespace Tests\Feature;

use App\Models\Room;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_are_redirected_to_login(): void
    {
        $response = $this->get('/dashboard');

        $response->assertRedirect('/login');
    }

    public function test_authenticated_users_can_view_dashboard(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertOk();
        $response->assertSee('Dashboard');
        $response->assertSee('Recent bookings');
    }

    public function test_authenticated_users_can_create_room_with_uploaded_cover_image(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('dashboard.rooms.index'))
            ->assertOk()
            ->assertSee('Rooms');

        $response = $this->actingAs($user)->post(route('dashboard.rooms.store'), [
            'name' => 'Test Suite',
            'description' => 'A lovely test room for the admin panel.',
            'price_per_night' => 199000,
            'capacity' => 2,
            'amenities' => 'Wi-Fi, Breakfast',
            'is_featured' => '1',
            'cover' => UploadedFile::fake()->image('room-cover.jpg', 1200, 800),
        ]);

        $response->assertRedirect(route('dashboard.rooms.index'));
        $this->assertDatabaseHas('rooms', [
            'name' => 'Test Suite',
            'slug' => 'test-suite',
        ]);

        $room = Room::query()->where('slug', 'test-suite')->firstOrFail();
        $this->assertTrue($room->hasMedia('cover'));
        $this->assertNotSame('', $room->getFirstMediaUrl('cover'));

        $this->actingAs($user)
            ->get(route('dashboard.rooms.edit', $room))
            ->assertOk()
            ->assertSee('Test Suite')
            ->assertSee('Cover image');
    }
}
