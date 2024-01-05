<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        return view('posts.index', [
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->simplePaginate(5)->withQueryString(),  
            // withQueryString() is used to keep the query string in the pagination links, so for example we can keep our category when we switch to the next page
            'categories' => Category::all(),
            'currentCategory' => Category::firstWhere('slug', request('category')),
        ]);
    
    }

    public function show(Post $post) {
        return view('posts.show', [
            'post' => $post
        ]);
    }
}
