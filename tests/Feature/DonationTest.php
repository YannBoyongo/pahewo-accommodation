<?php

namespace Tests\Feature;

use App\Models\Donation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DonationTest extends TestCase
{
    use RefreshDatabase;

    public function test_visitor_can_pledge_a_donation(): void
    {
        $response = $this->post(route('donate.store'), [
            'donor_name' => 'Grace Nabirye',
            'donor_email' => 'grace@example.com',
            'amount' => 100000,
            'designation' => 'sanctuary',
            'message' => 'Keep the lights on.',
        ]);

        $response->assertRedirect(route('donate.thanks'));

        $donation = Donation::query()->sole();
        $this->assertSame('Grace Nabirye', $donation->donor_name);
        $this->assertSame('100000.00', $donation->amount);
        $this->assertSame('UGX', $donation->currency);
        $this->assertSame('sanctuary', $donation->designation);
        $this->assertSame('pledged', $donation->status);
        $this->assertStringStartsWith('DON-', $donation->reference);
    }

    public function test_donation_requires_valid_fields(): void
    {
        $response = $this->from(route('donate.index'))->post(route('donate.store'), [
            'donor_name' => '',
            'donor_email' => 'invalid',
            'amount' => 0,
            'designation' => 'unknown',
        ]);

        $response->assertRedirect(route('donate.index'));
        $response->assertSessionHasErrors(['donor_name', 'donor_email', 'amount', 'designation']);
        $this->assertSame(0, Donation::query()->count());
    }

    public function test_thank_you_page_renders(): void
    {
        $this->get(route('donate.thanks'))->assertOk();
    }
}
