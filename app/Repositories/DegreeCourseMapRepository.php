<?php
namespace App\Repositories;
use Illuminate\Support\Facades\Log;
use App\Models\DegreeCourseMap;

class DegreeCourseMapRepository {
    static function getAll() {
        $items = DegreeCourseMap::with('degree')->with('course')->get();
        return $items;
    }

    static function getById($id) {
        return DegreeCourseMap::with('degree')->with('course')->find($id);
    }

    
    static function update(
        $id, $userId, $degreeId, $courseId
    ) {
        $item = DegreeCourseMap::find($id);
        $item->user_id = $userId;
        $item->degree_id = $degreeId;
        $item->course_id = $courseId;
        
        $item->save();
        return $item;
    }
    
    static function create(
        $userId, $degreeId, $courseId
    ) {
        $data = [
            'user_id' => $userId,
            'degree_id' => $degreeId,
            'course_id' => $courseId
        ];
        $item = DegreeCourseMap::create($data);
        return $item;
    }
}