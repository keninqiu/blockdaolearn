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
            'message' => 'Get courses successfully'
        ]);
    }

    public function create(Request $request) 
    {
        $user = auth()->user();
        $slug = $request->slug;
        $title = $request->title;
        $content = $request->content;
        $order = $request->order;
        $readingTime = $request->reading_time;
        $xp = $request->xp;

        $image= '';
        // Store the file
        if ($request->file('image')) {
            // Validate the request
            $request->validate([
                'image' => 'file|mimes:jpg,png,webp,jpeg|max:2048', // Adjust validation rules as needed
            ]);
            $image = $request->file('image')->store('courses', 'public'); // Store in the 'public/logos' directory
            $image = 'storage/' . $image;
        }

        $item = CourseRepository::create(
            $user->id, $slug, $title, $content, $order, $readingTime, $xp, $image
        );

        return response()->json([
            'code' => 0,
            'data' => $item,
            'message' => 'Successfully create course'
        ]); 
    }

    public function update(Request $request) 
    {
        $user = auth()->user();
        $id = $request->id;
        $slug = $request->slug;
        $title = $request->title;
        $content = $request->content;
        $order = $request->order;
        $readingTime = $request->reading_time;
        $xp = $request->xp;

        $image= '';
        // Store the file
        if ($request->file('image')) {
            // Validate the request
            $request->validate([
                'image' => 'file|mimes:jpg,png,webp,jpeg|max:2048', // Adjust validation rules as needed
            ]);
            $image = $request->file('image')->store('courses', 'public'); // Store in the 'public/logos' directory
            $image = 'storage/' . $image;
        }

        $item = CourseRepository::update(
            $id, $user->id, $slug, $title, $content, $order, $readingTime, $xp, $image
        );

        return response()->json([
            'code' => 0,
            'data' => $item,
            'message' => 'Successfully update course'
        ]); 
    }    

    public function getBySlug(Request $request) 
    {
        $slug = $request->slug;
        $item = CourseRepository::getBySlug($slug);
        return response()->json([
            'code' => 0,
            'data' => $item,
            'message' => 'Get course successfully'
        ]);
    }
}