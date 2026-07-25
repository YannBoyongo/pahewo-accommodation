<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Support\GeneratesUniqueSlug;
use App\Support\HandlesUploadedMedia;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PartnerController extends Controller
{
    public function index(): View
    {
        return view('admin.partners.index', [
            'partners' => Partner::query()->orderBy('name')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.partners.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validatePartner($request, requiredLogo: true);

        $partner = Partner::query()->create([
            ...$validated,
            'slug' => GeneratesUniqueSlug::from($validated['name'], Partner::class),
            'is_featured' => $request->boolean('is_featured'),
        ]);

        HandlesUploadedMedia::syncSingleImage($partner, $request, 'logo', 'logo', 'remove_logo');

        return redirect()
            ->route('dashboard.partners.index')
            ->with('success', 'Partner created successfully.');
    }

    public function edit(Partner $partner): View
    {
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner): RedirectResponse
    {
        $validated = $this->validatePartner($request);

        $partner->update([
            ...$validated,
            'slug' => GeneratesUniqueSlug::from($validated['name'], Partner::class, $partner->id),
            'is_featured' => $request->boolean('is_featured'),
        ]);

        HandlesUploadedMedia::syncSingleImage($partner, $request, 'logo', 'logo', 'remove_logo');

        return redirect()
            ->route('dashboard.partners.index')
            ->with('success', 'Partner updated successfully.');
    }

    public function destroy(Partner $partner): RedirectResponse
    {
        $partner->delete();

        return redirect()
            ->route('dashboard.partners.index')
            ->with('success', 'Partner deleted successfully.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validatePartner(Request $request, bool $requiredLogo = false): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'website_url' => ['nullable', 'url', 'max:2048'],
            'is_featured' => ['sometimes', 'boolean'],
            ...HandlesUploadedMedia::singleImageRules(field: 'logo', required: $requiredLogo),
            ...HandlesUploadedMedia::removalRules(),
        ]);
    }
}
