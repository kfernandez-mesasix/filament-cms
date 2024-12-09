@extends('layouts.app')

@section('content')
<article class="text-gray-600 body-font">
    <div class="container px-5 py-16 mx-auto">
        <div class="flex justify-between gap-2">
            <a href="{{ url('/posts') }}"
                class="inline-flex items-center border border-indigo-300 px-3 py-1.5 rounded-md text-indigo-500 hover:bg-indigo-50">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 16l-4-4m0 0l4-4m-4 4h18">
                    </path>
                </svg>
                <span class="ml-1 text-lg font-bold">Back</span>
            </a>
        </div>

        <div class="flex flex-col w-full mb-20 text-center">
            <h2 class="mb-1 text-xs font-medium tracking-widest text-indigo-500 title-font">{{ $post->category->name }}
            </h2>
            <h1 class="mb-4 text-2xl font-medium text-gray-900 sm:text-3xl title-font">{{ $post->title }}</h1>

            @if ($post->featuredImage)
            <img class="h-auto max-w-full mb-4" src="{{ $post->featuredImage->url }}" alt="{{ $post->title }}">
            @endif

            <p class="mx-auto text-base leading-relaxed lg:w-2/3">{!! $post->content !!}</p>
        </div>
    </div>
</article>

@endsection