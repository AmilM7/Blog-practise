<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/post/{post:slug}', [PostController::class, 'show']);












/* Route::get('/category/{category:slug}', function (Category $category) {

    return view('welcome',[
        'posts' => $category->posts->load(['category', 'author']),
        'currentCategory' => $category,
        'categories' => Category::all(),
    ]);
    
})->name('category');

Route::get('/author/{author:name}', function (User $author) {
    return view('welcome',[
        'posts' => $author->posts->load(['category', 'author'])
    ]);
    
}); */



/*  DB::listen(function($query) {                                         //debugging
     logger($query->sql, $query->bindings);
}); */

 //->where('post', '[A-z_\-]+');
//->whereAlpha('post');  //used for validation