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
        $coursePostMaps = $course->coursePostMaps;

        $posts = [];

        
        if($coursePostMaps) {
            foreach($coursePostMaps as $item) {
                $posts[] = [
                    'title' => $item->post->title,
                    "read" => false
                ];
            } 

            $post = $coursePostMaps[0]->post;
        }
        
        return view('course.course', ['course' => $course, 'posts' => $posts, 'post' => $post]);  
    }
}