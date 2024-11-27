@extends('layouts.app')

@section('content')
<article>
    <h1>{{ $page->title }}</h1>
    <p><small>Published on {{ $page->created_at->format('F j, Y') }}</small></p>
    <div>
        {!! nl2br(e($page->content)) !!}
    </div>
</article>
@endsection
