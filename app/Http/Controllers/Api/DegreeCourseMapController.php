<?php
namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Repositories\DegreeCourseMapRepository;
use Illuminate\Support\Facades\Log;

class DegreeCourseMapController extends Controller
{
    public function all() 
    {
        $items = DegreeCourseMapRepository::getAll();    
        return response()->json([
            'code' => 0,
            'data' => $items,
            'message' => 'Get degree-course-maps successfully'
        ]);
    }

    public function create(Request $request) 
    {
        $user = auth()->user();
        $degreeId = $request->degree;
        $courseId = $request->course;
        $item = DegreeCourseMapRepository::create($user->id, $degreeId, $courseId);
        return response()->json([
            'code' => 0,
            'data' => $item,
            'message' => 'Create degree-course-map successfully'
        ]);
    }

    public function update(Request $request) 
    {
        $user = auth()->user();
        $id = $request->id;
        $degreeId = $request->degree;
        $courseId = $request->course;
        $item = DegreeCourseMapRepository::update($id, $user->id, $degreeId, $courseId);
        return response()->json([
            'code' => 0,
            'data' => $item,
            'message' => 'Update degree-course-map successfully'
        ]);
    }

    public function getById(Request $request) 
    {
        $id = $request->id;
        $item = DegreeCourseMapRepository::getById($id);
        return response()->json([
            'code' => 0,
            'data' => $item,
            'message' => 'Get degree-course-map successfully'
        ]);
    }
}