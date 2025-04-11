<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function all() 
    {
        $items = PostRepository::getAll();    
        return response()->json([
            'code' => 0,
            'data' => $items,
            'message' => 'Get posts successfully'
        ]);
    }

    public function create(Request $request) 
    {
        $user = auth()->user();
        $languageId = $request->language;
        $slug = $request->slug;
        $title = $request->title;
        $content = $request->content;

        $image= '';
        // Store the file
        if ($request->file('image')) {
            // Validate the request
            $request->validate([
                'image' => 'file|mimes:jpg,png,webp,jpeg|max:2048', // Adjust validation rules as needed
            ]);
            $image = $request->file('image')->store('images', 'public'); // Store in the 'public/logos' directory
            $image = 'storage/' . $image;
        }

        $post = PostRepository::create(
            $user->id, $languageId, $slug, $title, $content, $image
        );

        return response()->json([
            'code' => 0,
            'data' => $post,
            'message' => 'Successfully create post'
        ]); 
    }

    public function update(Request $request) 
    {
        $id = $request->id;
        $user = auth()->user();
        $languageId = $request->language;
        $slug = $request->slug;
        $title = $request->title;
        $content = $request->content;

        $image= '';
        // Store the file
        if ($request->file('image')) {
            // Validate the request
            $request->validate([
                'image' => 'file|mimes:jpg,png,webp,jpeg|max:2048', // Adjust validation rules as needed
            ]);
            $image = $request->file('image')->store('images', 'public'); // Store in the 'public/logos' directory
            $image = 'storage/' . $image;
        }

        $post = PostRepository::update(
            $id, $user->id, $languageId, $slug, $title, $content, $image
        );

        return response()->json([
            'code' => 0,
            'data' => $post,
            'message' => 'Successfully update post'
        ]); 
    }

    public function getById(Request $request) 
    {
        $id = $request->id;
        $item = PostRepository::getById($id);
        return response()->json([
            'code' => 0,
            'data' => $item,
            'message' => 'Get language successfully'
        ]);
    }
}