<?php
namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    public function all() 
    {
        $items = CategoryRepository::getAll();    
        return response()->json([
            'code' => 0,
            'data' => $items,
            'message' => 'Get categories successfully'
        ]);
    }

    public function create(Request $request) 
    {
        $user = auth()->user();
        $slug = $request->slug;
        $title = $request->title;
        $order = $request->order;

        $item = CategoryRepository::create(
            $slug, $title, $order
        );

        return response()->json([
            'code' => 0,
            'data' => $item,
            'message' => 'Successfully create category'
        ]); 
    }

    public function update(Request $request) 
    {
        $id = $request->id;
        $slug = $request->slug;
        $title = $request->title;
        $order = $request->order;


        $item = CategoryRepository::update(
            $id, $slug, $title, $order
        );

        return response()->json([
            'code' => 0,
            'data' => $item,
            'message' => 'Successfully update category'
        ]); 
    }    

    public function getBySlug(Request $request) 
    {
        $slug = $request->slug;
        $item = CategoryRepository::getBySlug($slug);
        return response()->json([
            'code' => 0,
            'data' => $item,
            'message' => 'Get category successfully'
        ]);
    }
}