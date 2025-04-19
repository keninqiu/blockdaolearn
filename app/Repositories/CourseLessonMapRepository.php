<?php
namespace App\Repositories;
use Illuminate\Support\Facades\Log;
use App\Models\CourseLessonMap;

class CourseLessonMapRepository {
    static function getAll() {
        $items = CourseLessonMap::with('lesson')->with('course')->get();
        return $items;
    }

    static function getById($id) {
        return CourseLessonMap::with('lesson')->with('course')->find($id);
    }

    
    static function update(
        $id, $userId, $courseId, $lessonId
    ) {
        $item = CourseLessonMap::find($id);
        $item->user_id = $userId;
        $item->lesson_id = $lessonId;
        $item->course_id = $courseId;
        
        $item->save();
        return $item;
    }
    
    static function create(
        $userId, $courseId, $lessonId
    ) {
        $data = [
            'user_id' => $userId,
            'lesson_id' => $lessonId,
            'course_id' => $courseId
        ];
        $item = CourseLessonMap::create($data);
        return $item;
    }
}