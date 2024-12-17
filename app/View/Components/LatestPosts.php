<?php

namespace App\View\Components;

use Closure;
use App\Models\Post;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class LatestPosts extends Component
{
    public $posts;

    /**
     * Create a new component instance.
     */
    public function __construct($limit = 12)
    {
        $this->posts = Post::whereNotNull('published_at')
            ->with('category')
            ->latest()
            ->paginate($limit);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.latest-posts');
    }
}
