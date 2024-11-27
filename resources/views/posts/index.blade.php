@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-4xl font-bold text-center mb-8">Blog Posts</h1>
    @if($posts->isEmpty())
    <p class="text-center text-gray-500">No posts available at the moment.</p>
    @else
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($posts as $post)
        <article class="bg-white shadow-md rounded-md p-6">
            <h2 class="text-2xl font-semibold mb-3">
                <a href="{{ url('/posts/' . $post->slug) }}" class="text-blue-600 hover:underline">
                    {{ $post->title }}
                </a>
            </h2>
            <p class="text-gray-700 mb-4">{{ Str::limit($post->content, 150) }}</p>
            <a href="{{ url('/posts/' . $post->slug) }}" class="text-blue-500 hover:underline font-medium">
                Read More
            </a>
            <p class="text-sm text-gray-500 mt-2">
                Published on {{ $post->created_at->format('F j, Y') }}
            </p>
        </article>
        @endforeach
    </div>
    <div class="mt-6">
        {{ $posts->links('pagination::tailwind') }}
    </div>
    @endif
</div>
@endsection
