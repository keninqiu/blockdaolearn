<?php
namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Repositories\LessonPostMapRepository;
use Illuminate\Support\Facades\Log;

class LessonPostMapController extends Controller
{
    public function all() 
    {
        $items = LessonPostMapRepository::getAll();    
        return response()->json([
            'code' => 0,
            'data' => $items,
            'message' => 'Get lesson-post-maps successfully'
        ]);
    }

    public function create(Request $request) 
    {
        $user = auth()->user();
        $lessonId = $request->lesson;
        $postId = $request->post;
        $item = LessonPostMapRepository::create($user->id, $lessonId, $postId);
        return response()->json([
            'code' => 0,
            'data' => $item,
            'message' => 'Create lesson-post-map successfully'
        ]);
    }

    public function update(Request $request) 
    {
        $user = auth()->user();
        $id = $request->id;
        $lessonId = $request->lesson;
        $postId = $request->post;
        $item = LessonPostMapRepository::update($id, $user->id, $lessonId, $postId);
        return response()->json([
            'code' => 0,
            'data' => $item,
            'message' => 'Update lesson-post-map successfully'
        ]);
    }

    public function getById(Request $request) 
    {
        $id = $request->id;
        $item = LessonPostMapRepository::getById($id);
        return response()->json([
            'code' => 0,
            'data' => $item,
            'message' => 'Get lesson-post-map successfully'
        ]);
    }
}