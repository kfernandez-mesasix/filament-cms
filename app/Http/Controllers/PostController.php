<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::whereNotNull('published_at')
            ->with('category')
            ->latest()
            ->paginate(12);
        return view('posts.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->with('featuredImage')->firstOrFail();
        return view('posts.show', compact('post'));
    }
}
