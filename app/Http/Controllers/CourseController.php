<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Repositories\CourseRepository;
use Illuminate\Support\Facades\Log;

class CourseController extends Controller
{


    public function allByCategory($slug) 
    {
        $items = CourseRepository::allByCategory($slug);  
        
        return view('course.courses', ['courses' => $items]);  
    }
    public function single($slug) 
    {
        $course = CourseRepository::getBySlug($slug);  
        $course->views += 1;
        $course->save();
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

        }
        
        return view('course.course', ['course' => $course, 'posts' => $posts]);  
    }
}