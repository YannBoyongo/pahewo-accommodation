<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use App\Support\HandlesUploadedMedia;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HeroSectionController extends Controller
{
    public function edit(): View
    {
        return view('admin.hero-section.edit', [
            'hero' => HeroSection::instance(),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'label' => ['required', 'string', 'max:255'],
            'heading' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:2000'],
            'image_alt' => ['nullable', 'string', 'max:255'],
            ...HandlesUploadedMedia::singleImageRules(field: 'background', required: false),
            'remove_background' => ['sometimes', 'boolean'],
        ]);

        $hero = HeroSection::instance();
        $hero->update($validated);

        HandlesUploadedMedia::syncSingleImage($hero, $request, 'background', 'background', 'remove_background');

        return redirect()
            ->route('dashboard.hero-section.edit')
            ->with('success', 'Hero section updated successfully.');
    }
}
