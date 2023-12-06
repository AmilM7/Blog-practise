@extends('components/layout_post')

@section('content')

<title>My Blog</title>


<h1>
    {{ $post->title }}
</h1>

<p>
    <a href="/category/{{$post->category->slug}} "> Category: {{ $post->category->slug }} </a>
</p>

<p>
    <a href="/author/{{$post->author->name}}"> Author: {{ $post->author->name }} </a>
</p>
<article>
    {!! $post->body !!} {{-- it displays the html, that is reason of including "!!" --}}
</article>

<div>
    <a href="/">Go Back</a>
</div>
@endsection('content')
