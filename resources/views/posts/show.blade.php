@extends('layouts.app')

@section('content')
<article>
    <h1>{{ $post->title }}</h1>
    <p><small>Published on {{ $post->created_at->format('F j, Y') }}</small></p>
    <div>
        {!! nl2br(e($post->content)) !!}
    </div>
</article>
<p><a href="{{ url('/') }}">Back to Blog</a></p>
@endsection
