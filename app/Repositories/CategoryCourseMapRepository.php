<?php
namespace App\Repositories;
use Illuminate\Support\Facades\Log;
use App\Models\CategoryCourseMap;

class CategoryCourseMapRepository {
    static function getAll() {
        $items = CategoryCourseMap::with('category')->with('course')->get();
        return $items;
    }

    static function getById($id) {
        return CategoryCourseMap::with('category')->with('course')->find($id);
    }

    
    static function update(
        $id, $categoryId, $courseId
    ) {
        $item = CategoryCourseMap::find($id);
        
        $item->category_id = $categoryId;
        $item->course_id = $courseId;
        
        $item->save();
        return $item;
    }
    static function create(
        $categoryId, $courseId
    ) {
        $data = [
            'category_id' => $categoryId,
            'course_id' => $courseId
        ];
        $item = CategoryCourseMap::create($data);
        return $item;
    }
}