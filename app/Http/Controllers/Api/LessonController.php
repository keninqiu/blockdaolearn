<?php
namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Repositories\LessonRepository;
use Illuminate\Support\Facades\Log;

class LessonController extends Controller
{
    public function all() 
    {
        $items = LessonRepository::getAll();    
        return response()->json([
            'code' => 0,
            'data' => $items,
            'message' => 'Get lessons successfully'
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

        $item = LessonRepository::create(
            $user->id, $slug, $title, $order, $readingTime, $xp
        );

        return response()->json([
            'code' => 0,
            'data' => $item,
            'message' => 'Successfully create lesson'
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

        $item = LessonRepository::update(
            $id, $user->id, $slug, $title, $order, $readingTime, $xp
        );

        return response()->json([
            'code' => 0,
            'data' => $item,
            'message' => 'Successfully update lesson'
        ]); 
    }    

    public function getBySlug(Request $request) 
    {
        $slug = $request->slug;
        $item = LessonRepository::getBySlug($slug);
        return response()->json([
            'code' => 0,
            'data' => $item,
            'message' => 'Get lesson successfully'
        ]);
    }
}