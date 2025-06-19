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
        
        return view('posts', ['posts' => $items]);
    }

    public function allByCategory($slug) 
    {
        $items = PostRepository::allByCategory($slug);  
        
        return view('post.posts', ['posts' => $items]);  
    }
    public function single($slug) 
    {
        $post = PostRepository::getBySlug($slug);  
        $post->views += 1;
        $post->save();
        
        return view('post.post', ['post' => $post]);  
    }    
}