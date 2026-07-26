<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function edit(): View
    {
        return view('admin.settings.edit', [
            'setting' => Setting::instance(),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'phone' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:255'],
            'address' => ['required', 'string', 'max:1000'],
            'map_embed' => ['nullable', 'string', 'max:10000'],
            'directions_url' => ['nullable', 'url', 'max:2048'],
            'facebook' => ['nullable', 'url', 'max:2048'],
            'instagram' => ['nullable', 'url', 'max:2048'],
            'linkedin' => ['nullable', 'url', 'max:2048'],
            'footer_brand_name' => ['required', 'string', 'max:255'],
            'footer_description' => ['required', 'string', 'max:2000'],
            'footer_partner_text' => ['required', 'string', 'max:255'],
            'footer_partner_url' => ['required', 'url', 'max:2048'],
            'google_reviews_url' => ['nullable', 'url', 'max:2048'],
            'footer_wellness_message' => ['required', 'string', 'max:1000'],
        ]);

        Setting::instance()->update($validated);

        return redirect()
            ->route('dashboard.settings.edit')
            ->with('success', 'Site settings updated successfully.');
    }
}
