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
        $item = CourseRepository::getBySlug($slug);  
        
        return view('course.course', ['course' => $item]);  
    }
}