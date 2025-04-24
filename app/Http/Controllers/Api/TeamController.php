<?php
namespace App\Http\Controllers\Api;

use Illuminate\Routing\Controller;
use App\Repositories\TeamRepository;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function all() 
    {
        $items = TeamRepository::getAll();    
        return response()->json([
            'code' => 0,
            'data' => $items,
            'message' => 'Get teams successfully'
        ]);
    }

    public function getById(Request $request) 
    {
        $id = $request->id;
        $item = TeamRepository::getById($id);    
        return response()->json([
            'code' => 0,
            'data' => $item,
            'message' => 'Get team successfully'
        ]);   
    }

    public function create(Request $request) 
    {
        $user = auth()->user();
        $name = $request->name;
        $displayName = $request->display_name;
        $description = $request->description;

        $avatar= '';

        if ($request->file('avatar')) {
            // Validate the request
            $request->validate([
                'image' => 'file|mimes:jpg,png,webp,jpeg|max:2048', // Adjust validation rules as needed
            ]);
            $avatar = $request->file('avatar')->store('avatars', 'public'); // Store in the 'public/logos' directory
            $avatar = 'storage/' . $avatar;
        }

        $post = TeamRepository::create(
            $user->id, $name, $displayName, $description, $avatar
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
        $name = $request->name;
        $displayName = $request->display_name;
        $description = $request->description;
        $avatar= '';
        // Store the file
        if ($request->file('avatar')) {
            // Validate the request
            $request->validate([
                'image' => 'file|mimes:jpg,png,webp,jpeg|max:2048', // Adjust validation rules as needed
            ]);
            $avatar = $request->file('avatar')->store('avatars', 'public'); // Store in the 'public/logos' directory
            $avatar = 'storage/' . $avatar;
        }

        $item = TeamRepository::update($id, $user->id, $name, $displayName, $description, $avatar);
        return response()->json([
            'code' => 0,
            'data' => $item,
            'message' => 'Update team successfully'
        ]);
    }
}