<?php
namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Repositories\CourseRepository;
use Illuminate\Support\Facades\Log;

class CourseController extends Controller
{
    public function all() 
    {
        $items = CourseRepository::getAll();    
        return response()->json([
            'code' => 0,
            'data' => $items,
            'message' => 'Get minis successfully'
        ]);
    }

    public function create(Request $request) 
    {
        $user = auth()->user();
        $slug = $request->slug;
        $title = $request->title;
        $order = $request->order;
        $readingTime = $request->reading_time;
        $xp = $request->xp;

        $item = CourseRepository::create(
            $user->id, $slug, $title, $order, $readingTime, $xp
        );

        return response()->json([
            'code' => 0,
            'data' => $item,
            'message' => 'Successfully create mini'
        ]); 
    }

    public function update(Request $request) 
    {
        $user = auth()->user();
        $id = $request->id;
        $slug = $request->slug;
        $title = $request->title;
        $order = $request->order;
        $readingTime = $request->reading_time;
        $xp = $request->xp;

        $item = CourseRepository::update(
            $id, $user->id, $slug, $title, $order, $readingTime, $xp
        );

        return response()->json([
            'code' => 0,
            'data' => $item,
            'message' => 'Successfully update mini'
        ]); 
    }    

    public function getBySlug(Request $request) 
    {
        $slug = $request->slug;
        $item = CourseRepository::getBySlug($slug);
        return response()->json([
            'code' => 0,
            'data' => $item,
            'message' => 'Get mini successfully'
        ]);
    }
}