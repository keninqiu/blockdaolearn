<?php
namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Repositories\CategoryPostMapRepository;
use Illuminate\Support\Facades\Log;

class CategoryPostMapController extends Controller
{
    public function all() 
    {
        $items = CategoryPostMapRepository::getAll();    
        return response()->json([
            'code' => 0,
            'data' => $items,
            'message' => 'Get category-post-maps successfully'
        ]);
    }

    public function create(Request $request) 
    {
        $categoryId = $request->category;
        $postId = $request->post;
        $item = CategoryPostMapRepository::create($categoryId, $postId);
        return response()->json([
            'code' => 0,
            'data' => $item,
            'message' => 'Create category-post-map successfully'
        ]);
    }

    public function update(Request $request) 
    {
        $id = $request->id;
        $categoryId = $request->category;
        $postId = $request->post;
        $item = CategoryPostMapRepository::update($id, $categoryId, $postId);
        return response()->json([
            'code' => 0,
            'data' => $item,
            'message' => 'Update category-post-map successfully'
        ]);
    }

    public function getById(Request $request) 
    {
        $id = $request->id;
        $item = CategoryPostMapRepository::getById($id);
        return response()->json([
            'code' => 0,
            'data' => $item,
            'message' => 'Get category-post-map successfully'
        ]);
    }
}