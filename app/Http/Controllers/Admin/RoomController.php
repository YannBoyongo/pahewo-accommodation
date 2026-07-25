<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Support\GeneratesUniqueSlug;
use App\Support\HandlesUploadedMedia;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RoomController extends Controller
{
    public function index(): View
    {
        return view('admin.rooms.index', [
            'rooms' => Room::query()->orderBy('sort_order')->orderBy('name')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.rooms.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateRoom($request, requiredCover: true);

        $room = Room::query()->create([
            ...$validated,
            'slug' => GeneratesUniqueSlug::from($validated['name'], Room::class),
            'amenities' => $this->parseAmenities($request->input('amenities')),
            'is_featured' => $request->boolean('is_featured'),
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        HandlesUploadedMedia::syncSingleImage($room, $request, 'cover', 'cover');
        HandlesUploadedMedia::syncGalleryImages($room, $request);

        return redirect()
            ->route('dashboard.rooms.index')
            ->with('success', 'Room created successfully.');
    }

    public function edit(Room $room): View
    {
        return view('admin.rooms.edit', compact('room'));
    }

    public function update(Request $request, Room $room): RedirectResponse
    {
        $validated = $this->validateRoom($request);

        $room->update([
            ...$validated,
            'slug' => GeneratesUniqueSlug::from($validated['name'], Room::class, $room->id),
            'amenities' => $this->parseAmenities($request->input('amenities')),
            'is_featured' => $request->boolean('is_featured'),
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        HandlesUploadedMedia::syncSingleImage($room, $request, 'cover', 'cover');
        HandlesUploadedMedia::syncGalleryImages($room, $request);

        return redirect()
            ->route('dashboard.rooms.index')
            ->with('success', 'Room updated successfully.');
    }

    public function destroy(Room $room): RedirectResponse
    {
        $room->delete();

        return redirect()
            ->route('dashboard.rooms.index')
            ->with('success', 'Room deleted successfully.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validateRoom(Request $request, bool $requiredCover = false): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'tagline' => ['nullable', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price_per_night' => ['required', 'numeric', 'min:0'],
            'capacity' => ['required', 'integer', 'min:1', 'max:20'],
            'size_sqm' => ['nullable', 'integer', 'min:1'],
            'bed_setup' => ['nullable', 'string', 'max:255'],
            'is_featured' => ['sometimes', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            ...HandlesUploadedMedia::singleImageRules(required: $requiredCover),
            ...HandlesUploadedMedia::galleryImageRules(),
            ...HandlesUploadedMedia::removalRules(),
        ]);
    }

    /**
     * @return list<string>
     */
    private function parseAmenities(?string $value): array
    {
        if (! $value) {
            return [];
        }

        return array_values(array_filter(array_map('trim', explode(',', $value))));
    }
}
