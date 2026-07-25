<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class DonationController extends Controller
{
    public function index(): View
    {
        return view('admin.donations.index', [
            'donations' => Donation::query()->latest()->paginate(15),
        ]);
    }

    public function show(Donation $donation): View
    {
        return view('admin.donations.show', compact('donation'));
    }

    public function edit(Donation $donation): View
    {
        return view('admin.donations.edit', [
            'donation' => $donation,
            'statuses' => ['pledged', 'received', 'cancelled'],
            'designations' => [
                'general' => 'General fund',
                'medical-care' => 'Medical care',
                'sanctuary' => 'Sanctuary',
                'awareness' => 'Awareness',
            ],
        ]);
    }

    public function update(Request $request, Donation $donation): RedirectResponse
    {
        $validated = $request->validate([
            'donor_name' => ['required', 'string', 'max:255'],
            'donor_email' => ['required', 'email', 'max:255'],
            'amount' => ['required', 'numeric', 'min:0'],
            'currency' => ['required', 'in:UGX'],
            'designation' => ['required', Rule::in(['general', 'medical-care', 'sanctuary', 'awareness'])],
            'message' => ['nullable', 'string'],
            'status' => ['required', Rule::in(['pledged', 'received', 'cancelled'])],
        ]);

        $donation->update($validated);

        return redirect()
            ->route('dashboard.donations.show', $donation)
            ->with('success', 'Donation updated successfully.');
    }

    public function destroy(Donation $donation): RedirectResponse
    {
        $donation->delete();

        return redirect()
            ->route('dashboard.donations.index')
            ->with('success', 'Donation deleted successfully.');
    }
}
