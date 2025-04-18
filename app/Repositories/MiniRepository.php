<?php
namespace App\Repositories;
use Illuminate\Support\Facades\Log;
use App\Models\Mini;

class MiniRepository {
    static function getAll() {
        $posts = Mini::get();
        return $posts;
    }

    static function getById($id) {
        return Mini::find($id);
    }

    static function getBySlug($slug) {
        return Mini::where('slug', $slug)->first();
    }
    
    static function update(
        $id, $userId, $slug, $title, $order, $readingTime, $xp
    ) {
        $item = Mini::find($id);
        $item->user_id = $userId;
        $item->slug = $slug;
        $item->title = $title;
        $item->order = $order;
        $item->reading_time = $readingTime;
        $item->xp = $xp;

        $item->save();
        return $item;
    }
    static function create(
        $userId, $slug, $title, $order, $readingTime, $xp
    ) {
        $data = [
            'user_id' => $userId,
            'slug' => $slug,
            'title' => $title,
            'order' => $order,
            'reading_time' => $readingTime,
            'xp' => $xp
        ];
        $item = Mini::create($data);
        return $item;
    }
}