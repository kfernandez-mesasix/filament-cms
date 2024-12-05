@extends('layouts.app')

@section('content')
<article>
    <h1>{{ $post->title }}</h1>
    @if ($post->featuredImage)
    <img src="{{ $post->featuredImage->url }}" alt="{{ $post->title }}">
    @endif
    <div>{!! $post->content !!}</div>
</article>
<p><a href="{{ url('/') }}">Back to Blog</a></p>
@endsection
