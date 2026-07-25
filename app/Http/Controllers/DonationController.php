<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DonationController extends Controller
{
    public function index(): View
    {
        return view('pages.donate');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'donor_name' => ['required', 'string', 'max:255'],
            'donor_email' => ['required', 'email', 'max:255'],
            'amount' => ['required', 'numeric', 'min:1000', 'max:100000000'],
            'designation' => ['required', 'in:general,medical-care,sanctuary,awareness'],
            'message' => ['nullable', 'string', 'max:2000'],
        ]);

        $donation = Donation::query()->create([
            ...$validated,
            'reference' => Donation::generateReference(),
            'currency' => 'UGX',
            'status' => 'pledged',
        ]);

        return redirect()
            ->route('donate.thanks')
            ->with('donation_reference', $donation->reference)
            ->with('donation_amount', $donation->amount);
    }

    public function thanks(): View
    {
        return view('pages.donate-thanks');
    }
}
