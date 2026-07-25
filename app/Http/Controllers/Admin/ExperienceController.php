<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use App\Support\GeneratesUniqueSlug;
use App\Support\HandlesUploadedMedia;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ExperienceController extends Controller
{
    public function index(): View
    {
        return view('admin.experiences.index', [
            'experiences' => Experience::query()->orderBy('sort_order')->orderBy('name')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.experiences.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateExperience($request, requiredCover: true);

        $experience = Experience::query()->create([
            ...$validated,
            'slug' => GeneratesUniqueSlug::from($validated['name'], Experience::class),
            'is_featured' => $request->boolean('is_featured'),
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        HandlesUploadedMedia::syncSingleImage($experience, $request, 'cover', 'cover');

        return redirect()
            ->route('dashboard.experiences.index')
            ->with('success', 'Experience created successfully.');
    }

    public function edit(Experience $experience): View
    {
        return view('admin.experiences.edit', compact('experience'));
    }

    public function update(Request $request, Experience $experience): RedirectResponse
    {
        $validated = $this->validateExperience($request);

        $experience->update([
            ...$validated,
            'slug' => GeneratesUniqueSlug::from($validated['name'], Experience::class, $experience->id),
            'is_featured' => $request->boolean('is_featured'),
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        HandlesUploadedMedia::syncSingleImage($experience, $request, 'cover', 'cover');

        return redirect()
            ->route('dashboard.experiences.index')
            ->with('success', 'Experience updated successfully.');
    }

    public function destroy(Experience $experience): RedirectResponse
    {
        $experience->delete();

        return redirect()
            ->route('dashboard.experiences.index')
            ->with('success', 'Experience deleted successfully.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validateExperience(Request $request, bool $requiredCover = false): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'duration' => ['nullable', 'string', 'max:255'],
            'price' => ['nullable', 'numeric', 'min:0'],
            'is_featured' => ['sometimes', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            ...HandlesUploadedMedia::singleImageRules(required: $requiredCover),
            ...HandlesUploadedMedia::removalRules(),
        ]);
    }
}
