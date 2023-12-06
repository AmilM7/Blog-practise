@extends('components/layout')

@section('content')
<div class="container">
    <h1>Welcome to my posts!!</h1>
    @foreach ($posts as $post)
    <div class="mainDiv">
        <h2>
            <a href="/post/{{ $post->slug }}">
                {{ $post->title }}
            </a>
        </h2>

        <p>
            <a href="/category/{{ $post->category->slug}}">
                {{ $post->category->name }}
            </a>
        </p>
        <article>
            {{ $post->excerpt }}
        </article>
    </div>
    @endforeach
</div>
@endsection
