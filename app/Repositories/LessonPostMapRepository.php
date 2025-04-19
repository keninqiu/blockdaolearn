<?php
namespace App\Repositories;
use Illuminate\Support\Facades\Log;
use App\Models\LessonPostMap;

class LessonPostMapRepository {
    static function getAll() {
        $items = LessonPostMap::with('lesson')->with('post')->get();
        return $items;
    }

    static function getById($id) {
        return LessonPostMap::with('lesson')->with('post')->find($id);
    }

    
    static function update(
        $id, $userId, $lessonId, $postId
    ) {
        $item = LessonPostMap::find($id);
        $item->user_id = $userId;
        $item->lesson_id = $lessonId;
        $item->post_id = $postId;
        
        $item->save();
        return $item;
    }

    static function create(
        $userId, $lessonId, $postId
    ) {
        $data = [
            'user_id' => $userId,
            'lesson_id' => $lessonId,
            'post_id' => $postId
        ];
        $item = LessonPostMap::create($data);
        return $item;
    }
}