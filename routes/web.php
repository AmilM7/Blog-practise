<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make somethPing great!
|
*/

Route::get('/', function () {

   /*  DB::listen(function($query) {                                         //debugging
        logger($query->sql, $query->bindings);
    }); */


    return view('welcome', [
        'posts' => Post::latest()->with('category')->get(),
    ]);
});


Route::get('/post/{post:slug}', function (Post $post) {
    //$post = Post::findOrFail($post);

    return view('post',[
        'post' => $post,
    ]);
    
});
//->where('post', '[A-z_\-]+');
//->whereAlpha('post');  //used for validation

Route::get('/category/{category:slug}', function (Category $category) {


    return view('welcome',[
        'posts' => $category->posts->load(['category', 'author'])
    ]);
    
});

Route::get('/author/{author:name}', function (User $author) {
    return view('welcome',[
        'posts' => $author->posts->load(['category', 'author'])
    ]);
    
});