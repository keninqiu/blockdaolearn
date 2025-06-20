<?php
namespace App\Repositories;
use Illuminate\Support\Facades\Log;
use App\Models\Post;
use App\Models\Category;
use App\Models\CategoryPostMap;

class PostRepository {
    static function getTops($num) {
        $posts = Post::orderBy('id', 'desc')->take($num)->get();
        return $posts;
    }

    static function getAll() {
        $posts = Post::get();
        return $posts;
    }

    static function getById($id) {
        return Post::find($id);
    }

    static function getBySlug($slug) {
        return Post::where('slug', $slug)->with('user')->first();
    }

    static function allByCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $categoryPostMaps = CategoryPostMap::where('category_id', $category->id)->get();
        return array_map(function($n) {
            return $n->post;
        }, $categoryPostMaps->all());
    }

    static function update(
        $id, $userId, $slug, $emoji, $title, $description, $image
    ) {
        $post = Post::find($id);
        $post->user_id = $userId;
        $post->slug = $slug;
        $post->emoji = $emoji;
        $post->title = $title;
        $post->description = $description;
        if($image) {
            $post->image = $image;
        }
        
        $post->save();
        return $post;
    }
    static function create(
        $userId, $slug, $emoji, $title, $description, $image
    ) {
        $postData = [
            'user_id' => $userId,
            'slug' => $slug,
            'emoji' => $emoji,
            'title' => $title,
            'description' => $description,
            'image' => $image
        ];
        $post = Post::create($postData);
        return $post;
    }
}