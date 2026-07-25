<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Room;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $rooms       = Room::query()->orderBy('sort_order')->get();
        $experiences = Experience::query()->orderBy('sort_order')->get();

        $content = view('sitemap', compact('rooms', 'experiences'))->render();

        return response($content, 200, [
            'Content-Type' => 'application/xml; charset=utf-8',
        ]);
    }
}
