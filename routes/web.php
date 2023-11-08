<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
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

Route::get('/', function () {

    return view('welcome', [
        'posts' => Post::all(),
    ]);
});


Route::get('/post/{post}', function ($slug) {
    $post = Post::find($slug);

    return view('post',[
        'post' => $post,
    ]);
    
})->where('post', '[A-z_\-]+');
//->whereAlpha('post');  //used for validation