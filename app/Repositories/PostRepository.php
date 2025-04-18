<?php
namespace App\Repositories;
use Illuminate\Support\Facades\Log;
use App\Models\Post;

class PostRepository {
    static function getAll() {
        $posts = Post::get();
        return $posts;
    }

    static function getById($id) {
        return Post::find($id);
    }

    static function getBySlug($slug) {
        return Post::where('slug', $slug)->first();
    }
    
    static function update(
        $id, $userId, $slug, $title, $image
    ) {
        $post = Post::find($id);
        $post->user_id = $userId;
        $post->slug = $slug;
        $post->title = $title;
        if($image) {
            $post->image = $image;
        }
        
        $post->save();
        return $post;
    }
    static function create(
        $userId, $slug, $title, $image
    ) {
        $postData = [
            'user_id' => $userId,
            'slug' => $slug,
            'title' => $title,
            'image' => $image
        ];
        $post = Post::create($postData);
        return $post;
    }
}