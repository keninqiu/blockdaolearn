<?php
namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Repositories\CoursePostMapRepository;
use Illuminate\Support\Facades\Log;

class CoursePostMapController extends Controller
{
    public function all() 
    {
        $items = CoursePostMapRepository::getAll();    
        return response()->json([
            'code' => 0,
            'data' => $items,
            'message' => 'Get course-post-maps successfully'
        ]);
    }

    public function create(Request $request) 
    {
        $user = auth()->user();
        $courseId = $request->course;
        $postId = $request->post;
        $item = CoursePostMapRepository::create($user->id, $courseId, $postId);
        return response()->json([
            'code' => 0,
            'data' => $item,
            'message' => 'Create course-post-map successfully'
        ]);
    }

    public function update(Request $request) 
    {
        $user = auth()->user();
        $id = $request->id;
        $courseId = $request->course;
        $postId = $request->post;
        $item = CoursePostMapRepository::update($id, $user->id, $courseId, $postId);
        return response()->json([
            'code' => 0,
            'data' => $item,
            'message' => 'Update course-post-map successfully'
        ]);
    }

    public function getById(Request $request) 
    {
        $id = $request->id;
        $item = CoursePostMapRepository::getById($id);
        return response()->json([
            'code' => 0,
            'data' => $item,
            'message' => 'Get course-post-map successfully'
        ]);
    }
}