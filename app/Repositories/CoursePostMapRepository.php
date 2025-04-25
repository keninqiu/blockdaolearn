<?php
namespace App\Repositories;
use Illuminate\Support\Facades\Log;
use App\Models\CoursePostMap;

class CoursePostMapRepository {
    static function getAll() {
        $items = CoursePostMap::with('course')->with('post')->get();
        return $items;
    }

    static function getById($id) {
        return CoursePostMap::with('course')->with('post')->find($id);
    }

    
    static function update(
        $id, $userId, $courseId, $postId
    ) {
        $item = CoursePostMap::find($id);
        $item->user_id = $userId;
        $item->course_id = $courseId;
        $item->post_id = $postId;
        
        $item->save();
        return $item;
    }
    static function create(
        $userId, $courseId, $postId
    ) {
        $data = [
            'user_id' => $userId,
            'course_id' => $courseId,
            'post_id' => $postId
        ];
        $item = CoursePostMap::create($data);
        return $item;
    }
}