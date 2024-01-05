@extends('components/layout')

@section('content')
<main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
    @if ($posts->count())
   <x-feature_post_card  :post="$posts[0]"/>

    <div class="lg:grid lg:grid-cols-6">
        @foreach ($posts->skip(1) as $post)
    
            <x-post_card :post="$post"
            class="{{$loop->iteration < 3 ? 'col-span-3' : 'col-span-2'}}"/>

        @endforeach
        
    </div>

    {{ $posts->links() }}
    @else
        <h3 class=" text-lg	 text-center">No posts yet. Please check back later.</h3>
    @endif
</main>
@endsection
