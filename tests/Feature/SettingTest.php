<?php

namespace Tests\Feature;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SettingTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_cannot_access_settings_page(): void
    {
        $this->get(route('dashboard.settings.edit'))
            ->assertRedirect('/login');
    }

    public function test_authenticated_users_can_view_and_update_settings(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('dashboard.settings.edit'))
            ->assertOk()
            ->assertSee('Site Settings')
            ->assertSee('Social media');

        $response = $this->actingAs($user)->put(route('dashboard.settings.update'), [
            'phone' => '+256 712 345 678',
            'email' => 'contact@staywithpurpose.ug',
            'address' => 'Plot 12, Kololo, Kampala, Uganda',
            'facebook' => 'https://facebook.com/staywithpurpose',
            'instagram' => 'https://instagram.com/staywithpurpose',
            'linkedin' => 'https://linkedin.com/company/staywithpurpose',
            'footer_brand_name' => 'Endo Wellness Accommodation',
            'footer_description' => 'A welcoming place where every stay supports endometriosis care.',
            'footer_partner_text' => 'PAHEWO',
            'footer_partner_url' => 'https://www.pahewo.org',
            'google_reviews_url' => 'https://www.google.com/search?q=Endo+Wellness+Accommodation',
            'footer_wellness_message' => 'Our wellness support line is available every hour of every day.',
        ]);

        $response->assertRedirect(route('dashboard.settings.edit'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('settings', [
            'id' => 1,
            'phone' => '+256 712 345 678',
            'email' => 'contact@staywithpurpose.ug',
            'address' => 'Plot 12, Kololo, Kampala, Uganda',
            'footer_brand_name' => 'Endo Wellness Accommodation',
            'footer_wellness_message' => 'Our wellness support line is available every hour of every day.',
        ]);

        $this->assertSame('https://facebook.com/staywithpurpose', Setting::instance()->facebook);
    }

    public function test_homepage_displays_saved_contact_settings(): void
    {
        Setting::instance()->update([
            'phone' => '+256 799 111 222',
            'email' => 'hello@example.test',
            'address' => 'Entebbe, Uganda',
        ]);

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('+256 799 111 222')
            ->assertSee('hello@example.test')
            ->assertSee('Entebbe, Uganda');
    }
}
