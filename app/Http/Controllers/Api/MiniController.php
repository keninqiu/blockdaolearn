<?php
namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Repositories\MiniRepository;
use Illuminate\Support\Facades\Log;

class MiniController extends Controller
{
    public function all() 
    {
        $items = MiniRepository::getAll();    
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

        $item = MiniRepository::create(
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

        $item = MiniRepository::update(
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
        $item = MiniRepository::getBySlug($slug);
        return response()->json([
            'code' => 0,
            'data' => $item,
            'message' => 'Get mini successfully'
        ]);
    }
}