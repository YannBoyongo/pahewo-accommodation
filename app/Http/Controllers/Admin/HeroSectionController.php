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
    public function index(): View
    {
        return view('admin.hero-section.index', [
            'slides' => HeroSection::query()->ordered()->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.hero-section.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $hero = HeroSection::query()->create($this->validatedData($request));

        HandlesUploadedMedia::syncSingleImage($hero, $request, 'background', 'background', 'remove_background');

        return redirect()
            ->route('dashboard.hero-section.index')
            ->with('success', 'Hero slide created successfully.');
    }

    public function edit(HeroSection $heroSection): View
    {
        return view('admin.hero-section.edit', [
            'hero' => $heroSection,
        ]);
    }

    public function update(Request $request, HeroSection $heroSection): RedirectResponse
    {
        $heroSection->update($this->validatedData($request));

        HandlesUploadedMedia::syncSingleImage($heroSection, $request, 'background', 'background', 'remove_background');

        return redirect()
            ->route('dashboard.hero-section.index')
            ->with('success', 'Hero slide updated successfully.');
    }

    public function destroy(HeroSection $heroSection): RedirectResponse
    {
        $heroSection->clearMediaCollection('background');
        $heroSection->delete();

        return redirect()
            ->route('dashboard.hero-section.index')
            ->with('success', 'Hero slide deleted successfully.');
    }

    /**
     * @return array{label: string, heading: string, description: string, image_alt: ?string, is_published: bool, sort_order: int}
     */
    private function validatedData(Request $request): array
    {
        $validated = $request->validate([
            'label' => ['required', 'string', 'max:255'],
            'heading' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:2000'],
            'image_alt' => ['nullable', 'string', 'max:255'],
            'is_published' => ['sometimes', 'boolean'],
            'sort_order' => ['required', 'integer', 'min:0'],
            ...HandlesUploadedMedia::singleImageRules(field: 'background', required: false),
            'remove_background' => ['sometimes', 'boolean'],
        ]);

        $validated['is_published'] = $request->boolean('is_published');

        unset($validated['background'], $validated['remove_background']);

        return $validated;
    }
}
