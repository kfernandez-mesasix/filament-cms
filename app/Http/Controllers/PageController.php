<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Setting;
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
        $homepageSlug = Setting::get('homepage_slug') ?? 'home';

        $page = Page::where('slug', $homepageSlug)->firstOrFail();

        return view('pages.home', compact('page'));
    }
}
