<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        return view('pages.show', compact('page'));
    }

    public function homepage()
    {
        // Fetch the homepage slug from the settings
        $homepageSlug = config('app.homepage_slug', 'home'); // Default to 'home' if no value is set

        // Find the page with that slug
        $page = Page::where('slug', $homepageSlug)->firstOrFail();

        return view('pages.show', compact('page'));
    }
}
