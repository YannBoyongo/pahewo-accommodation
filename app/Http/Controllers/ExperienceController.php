<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\View\View;

class ExperienceController extends Controller
{
    public function index(): View
    {
        return view('pages.experiences', [
            'experiences' => Experience::query()->orderBy('sort_order')->get(),
        ]);
    }

    public function show(Experience $experience): View
    {
        return view('pages.experience-detail', [
            'experience' => $experience,
            'otherExperiences' => Experience::query()
                ->whereKeyNot($experience->id)
                ->orderBy('sort_order')
                ->limit(3)
                ->get(),
        ]);
    }
}
