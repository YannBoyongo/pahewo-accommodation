<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TestimonialController extends Controller
{
    public function index(): View
    {
        return view('admin.testimonials.index', [
            'testimonials' => Testimonial::query()
                ->orderBy('sort_order')
                ->latest()
                ->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Testimonial::query()->create($this->validatedData($request));

        return redirect()
            ->route('dashboard.testimonials.index')
            ->with('success', 'Testimonial created successfully.');
    }

    public function edit(Testimonial $testimonial): View
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial): RedirectResponse
    {
        $testimonial->update($this->validatedData($request));

        return redirect()
            ->route('dashboard.testimonials.index')
            ->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial): RedirectResponse
    {
        $testimonial->delete();

        return redirect()
            ->route('dashboard.testimonials.index')
            ->with('success', 'Testimonial deleted successfully.');
    }

    /**
     * @return array{guest_name: string, stay_type: ?string, quote: string, is_published: bool, sort_order: int}
     */
    private function validatedData(Request $request): array
    {
        $validated = $request->validate([
            'guest_name' => ['required', 'string', 'max:255'],
            'stay_type' => ['nullable', 'string', 'max:255'],
            'quote' => ['required', 'string', 'max:3000'],
            'is_published' => ['sometimes', 'boolean'],
            'sort_order' => ['required', 'integer', 'min:0'],
        ]);

        $validated['is_published'] = $request->boolean('is_published');

        return $validated;
    }
}
