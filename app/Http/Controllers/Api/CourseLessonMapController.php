<?php
namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Repositories\CourseLessonMapRepository;
use Illuminate\Support\Facades\Log;

class CourseLessonMapController extends Controller
{
    public function all() 
    {
        $items = CourseLessonMapRepository::getAll();    
        return response()->json([
            'code' => 0,
            'data' => $items,
            'message' => 'Get course-lesson-maps successfully'
        ]);
    }

    public function create(Request $request) 
    {
        $user = auth()->user();
        $lessonId = $request->lesson;
        $courseId = $request->course;
        $item = CourseLessonMapRepository::create($user->id, $courseId, $lessonId);
        return response()->json([
            'code' => 0,
            'data' => $item,
            'message' => 'Create course-lesson-map successfully'
        ]);
    }

    public function update(Request $request) 
    {
        $user = auth()->user();
        $id = $request->id;
        $lessonId = $request->lesson;
        $courseId = $request->course;
        $item = CourseLessonMapRepository::update($id, $user->id, $courseId, $lessonId);
        return response()->json([
            'code' => 0,
            'data' => $item,
            'message' => 'Update course-lesson-map successfully'
        ]);
    }

    public function getById(Request $request) 
    {
        $id = $request->id;
        $item = CourseLessonMapRepository::getById($id);
        return response()->json([
            'code' => 0,
            'data' => $item,
            'message' => 'Get course-lesson-map successfully'
        ]);
    }
}