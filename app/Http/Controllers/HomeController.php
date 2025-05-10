<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Repositories\CourseRepository;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function telegram() 
    {
        return view('home.telegram');
    }
}