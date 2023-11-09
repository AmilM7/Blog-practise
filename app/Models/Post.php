<?php

namespace App\Models;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
;
class Post {
    public $title;
    public $excerpt;
    public $date;
    public $body;

    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug) {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }



    public static function all() {

        return cache() -> rememberForever("posts.all", function () {
            return static::collection();
        });

        /* $files = File::files(resource_path("posts/"));
        return array_map(function ($file) {
            return $file->getContents();
        }, $files); */
    }

    public static function find($slug) {

        $post = static::all()->firstWhere('slug', $slug);
        if (!$post) {
            throw new ModelNotFoundException();
        }
        
        return $post;
        
       /*  if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
            throw new ModelNotFoundException();
            //abort(404);
            // return redirect('/'); / this way also exist
        }
        return cache()->remember("posts.{$slug}", now()->addMinute(20), function () use ($path) {
            return file_get_contents($path);
        }); */
    }


    private static function collection() {
        return collect(File::files(resource_path("posts"))) -> map(function ($file) {

            $document = YamlFrontMatter::parseFile($file);

            return new Post(
                $document->title,
                $document->excerpt,
                $document->date,
                $document->body(),
                $document->slug,
            );
        }) -> sortByDesc('date');
    }
    
}