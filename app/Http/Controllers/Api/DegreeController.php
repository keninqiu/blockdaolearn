<?php
namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Repositories\DegreeRepository;
use Illuminate\Support\Facades\Log;

class DegreeController extends Controller
{
    public function all() 
    {
        $items = DegreeRepository::getAll();    
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

        $item = DegreeRepository::create(
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

        $item = DegreeRepository::update(
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
        $item = DegreeRepository::getBySlug($slug);
        return response()->json([
            'code' => 0,
            'data' => $item,
            'message' => 'Get mini successfully'
        ]);
    }
}