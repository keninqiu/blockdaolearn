<?php
namespace App\Http\Controllers\Api;

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
        $slug = $request->slug;
        $emoji = $request->emoji;
        $title = $request->title;
        $description = $request->description;

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
            $user->id, $slug, $emoji, $title, $description, $image
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
        $slug = $request->slug;
        $emoji = $request->emoji;
        $title = $request->title;
        $description = $request->description;
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
            $id, $user->id, $slug, $emoji, $title, $description, $image
        );

        return response()->json([
            'code' => 0,
            'data' => $post,
            'message' => 'Successfully update post'
        ]); 
    }

    public function getBySlug(Request $request) 
    {
        $slug = $request->slug;
        $item = PostRepository::getBySlug($slug);
        return response()->json([
            'code' => 0,
            'data' => $item,
            'message' => 'Get language successfully'
        ]);
    }
}