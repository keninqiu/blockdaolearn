<?php
namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Repositories\MiniPostMapRepository;
use Illuminate\Support\Facades\Log;

class MiniPostMapController extends Controller
{
    public function all() 
    {
        $items = MiniPostMapRepository::getAll();    
        return response()->json([
            'code' => 0,
            'data' => $items,
            'message' => 'Get mini-post-maps successfully'
        ]);
    }

    public function create(Request $request) 
    {
        $user = auth()->user();
        $miniId = $request->mini;
        $postId = $request->post;
        $item = MiniPostMapRepository::create($user->id, $miniId, $postId);
        return response()->json([
            'code' => 0,
            'data' => $item,
            'message' => 'Create mini-post-map successfully'
        ]);
    }

    public function update(Request $request) 
    {
        $user = auth()->user();
        $id = $request->id;
        $miniId = $request->mini;
        $postId = $request->post;
        $item = MiniPostMapRepository::update($id, $user->id, $miniId, $postId);
        return response()->json([
            'code' => 0,
            'data' => $item,
            'message' => 'Update mini-post-map successfully'
        ]);
    }

    public function getById(Request $request) 
    {
        $id = $request->id;
        $item = MiniPostMapRepository::getById($id);
        return response()->json([
            'code' => 0,
            'data' => $item,
            'message' => 'Get mini-post-map successfully'
        ]);
    }
}