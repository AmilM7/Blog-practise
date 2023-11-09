@extends('components.layout')

@section('content')

<title>My Blog</title>

<article>
    {!! $post->body !!} {{-- it displays the html, that is reason of including "!!" --}}
</article>

<a href="/">Go Back</a>

@endsection('content')
