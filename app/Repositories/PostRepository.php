<?php
namespace App\Repositories;
use Illuminate\Support\Facades\Log;
use App\Models\Post;

class PostRepository {
    static function getAll() {
        $posts = Post::with('language')->get();
        return $posts;
    }

    static function getById($id) {
        return Post::with('language')->find($id);
    }

    static function getBySlug($slug) {
        return Post::with('language')->where('slug', $slug)->first();
    }
    
    static function update(
        $id, $userId, $languageId, $slug, $title, $content, $image
    ) {
        $post = Post::find($id);
        $post->user_id = $userId;
        $post->language_id = $languageId;
        $post->slug = $slug;
        $post->title = $title;
        $post->content = $content;
        if($image) {
            $post->image = $image;
        }
        
        $post->save();
        return $post;
    }
    static function create(
        $userId, $languageId, $slug, $title, $content, $image
    ) {
        $postData = [
            'user_id' => $userId,
            'language_id' => $languageId,
            'slug' => $slug,
            'title' => $title,
            'content' => $content,
            'image' => $image
        ];
        $post = Post::create($postData);
        return $post;
    }
}