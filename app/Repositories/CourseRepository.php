<?php
namespace App\Repositories;
use Illuminate\Support\Facades\Log;
use App\Models\Course;
use App\Models\Category;
use App\Models\CategoryCourseMap;

class CourseRepository {
    static function getTops($num) {
        $posts = Course::orderBy('id', 'desc')->take($num)->get();
        return $posts;
    }

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
    
    static function allByCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $categoryCourseMaps = CategoryCourseMap::where('category_id', $category->id)->get();
        return array_map(function($n) {
            return $n->course;
        }, $categoryCourseMaps->all());
    }

    static function update(
        $id, $userId, $slug, $emoji, $title, $content, $order, $readingTime, $xp, $image
    ) {
        $item = Course::find($id);
        $item->user_id = $userId;
        $item->slug = $slug;
        $item->emoji = $emoji;
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
        $userId, $slug, $emoji, $title, $content, $order, $readingTime, $xp, $image
    ) {
        $data = [
            'user_id' => $userId,
            'slug' => $slug,
            'emoji' => $emoji,
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