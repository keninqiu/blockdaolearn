<?php
namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Repositories\CategoryCourseMapRepository;
use Illuminate\Support\Facades\Log;

class CategoryCourseMapController extends Controller
{
    public function all() 
    {
        $items = CategoryCourseMapRepository::getAll();    
        return response()->json([
            'code' => 0,
            'data' => $items,
            'message' => 'Get category-course-maps successfully'
        ]);
    }

    public function create(Request $request) 
    {
        $categoryId = $request->category;
        $courseId = $request->course;
        $item = CategoryCourseMapRepository::create($categoryId, $courseId);
        return response()->json([
            'code' => 0,
            'data' => $item,
            'message' => 'Create category-course-map successfully'
        ]);
    }

    public function update(Request $request) 
    {
        $id = $request->id;
        $categoryId = $request->category;
        $courseId = $request->course;
        $item = CategoryCourseMapRepository::update($id, $categoryId, $courseId);
        return response()->json([
            'code' => 0,
            'data' => $item,
            'message' => 'Update category-course-map successfully'
        ]);
    }

    public function getById(Request $request) 
    {
        $id = $request->id;
        $item = CategoryCourseMapRepository::getById($id);
        return response()->json([
            'code' => 0,
            'data' => $item,
            'message' => 'Get category-course-map successfully'
        ]);
    }
}