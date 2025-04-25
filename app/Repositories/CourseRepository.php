<?php
namespace App\Repositories;
use Illuminate\Support\Facades\Log;
use App\Models\Course;

class CourseRepository {
    static function getAll() {
        $posts = Course::get();
        return $posts;
    }

    static function getById($id) {
        return Course::find($id);
    }

    static function getBySlug($slug) {
        return Course::where('slug', $slug)->first();
    }
    
    static function update(
        $id, $userId, $slug, $title, $content, $order, $readingTime, $xp, $image
    ) {
        $item = Course::find($id);
        $item->user_id = $userId;
        $item->slug = $slug;
        $item->title = $title;
        $item->content = $content;
        $item->order = $order;
        $item->reading_time = $readingTime;
        $item->xp = $xp;

        if($image) {
            $item->image = $image;
        }
        $item->save();
        return $item;
    }
    static function create(
        $userId, $slug, $title, $content, $order, $readingTime, $xp, $image
    ) {
        $data = [
            'user_id' => $userId,
            'slug' => $slug,
            'title' => $title,
            'content' => $content,
            'order' => $order,
            'reading_time' => $readingTime,
            'xp' => $xp,
            'image' => $image
        ];
        $item = Course::create($data);
        return $item;
    }
}