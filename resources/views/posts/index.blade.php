@extends('layouts.app')

@section('content')
<section class="text-gray-600 body-font">
    <div class="container px-5 py-16 mx-auto">
        <h1 class="mb-8 text-4xl font-bold text-center">Blog Posts</h1>

        <div class="flex flex-wrap -m-4">
            @foreach($posts as $post)
            <div class="w-full p-4 md:w-1/3">
                <div class="h-full overflow-hidden border-2 border-gray-200 rounded-lg border-opacity-60">
                    @if ($post->featuredImage)
                    <img class="object-cover object-center w-full lg:h-48 md:h-36" src="{{ $post->featuredImage->url }}"
                        alt="{{ $post->title }}">
                    @endif
                    <div class="p-6">
                        <h2 class="mb-1 text-xs font-medium tracking-widest text-gray-400 title-font">{{
                            $post->category->name
                            }}</h2>
                        <h1 class="mb-3 text-lg font-medium text-gray-900 title-font">{{ $post->title }}</h1>
                        <p class="mb-3 leading-relaxed">{{ $post->excerpt }}</p>
                        <div class="flex flex-wrap items-center ">
                            <a href="{{ url('/posts/' . $post->slug) }}"
                                class="inline-flex items-center text-indigo-500 md:mb-2 lg:mb-0">Learn More
                                <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14"></path>
                                    <path d="M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        <div class="mt-6">
            {{ $posts->links('pagination::tailwind') }}
        </div>
    </div>
</section>
@endsection