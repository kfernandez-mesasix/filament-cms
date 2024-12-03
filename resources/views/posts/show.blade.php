@extends('layouts.app')

@section('content')
<article>
    <h1>{{ $post->title }}</h1>
    @if ($post->getFirstMediaUrl('images'))
    <img src="{{ $post->getFirstMediaUrl('images') }}" alt="{{ $post->title }}" style="max-width: 100%; height: auto;">
    @endif
    <div>{!! $post->content !!}</div>
</article>
<p><a href="{{ url('/') }}">Back to Blog</a></p>
@endsection
