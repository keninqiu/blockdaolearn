<?php
namespace App\Repositories;
use Illuminate\Support\Facades\Log;
use App\Models\Mini;

class MiniRepository {
    static function getAll() {
        $items = Mini::with('user')->get();
        return $items;
    }

    static function getById($id) {
        return Mini::find($id);
    }

    static function getBySlug($slug) {
        return Mini::where('slug', $slug)->first();
    }
    
    static function update(
        $id, $userId, $slug, $title, $content, $order, $readingTime, $xp, $image
    ) {
        $item = Mini::find($id);
        $item->user_id = $userId;
        $item->slug = $slug;
        $item->title = $title;
        $item->content = $content;
        $item->order = $order;
        $item->reading_time = $readingTime;
        $item->xp = $xp;
        $item->updated_at = now();
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
        $item = Mini::create($data);
        return $item;
    }
}