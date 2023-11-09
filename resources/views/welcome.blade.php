@extends('components/layout')


@section('content')

@foreach ($posts as $post)
<div  class="mainDiv">
    <h1>
        <a href="post/<?= $post->slug ?>">
            {{ $post->title }}
        </a>
    </h1>
    <article>
       {{ $post->excerpt }}
    </article>
</div>
@endforeach  
    
@endsection

