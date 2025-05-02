<?php
namespace App\Http\Controllers;

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
        
        return view('course.courses', ['courses' => $items]);
    }

    public function single($slug) 
    {
        $course = CourseRepository::getBySlug($slug);  
        $coursePosts = $course->posts;

        $posts = [];

        
        if($coursePosts) {
            foreach($coursePosts as $item) {
                $posts[] = [
                    'title' => $item->title,
                    'blocks' => $item->blocks,
                    "read" => false
                ];
            } 

            $post = $coursePosts[0];
        }
        
        return view('course.course', ['course' => $course, 'posts' => $posts, 'post' => $post]);  
    }
}