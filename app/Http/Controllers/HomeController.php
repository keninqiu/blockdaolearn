<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Repositories\CourseRepository;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index() 
    {
        $num = 5;
        $courses = CourseRepository::getTops(5);  
        $posts = PostRepository::getTops(5);  

        return view('home.index', ['courses' => $courses, 'posts' => $posts]);
    }

    public function telegram() 
    {
        return view('home.telegram');
    }

    public function youtube() 
    {
        return view('home.youtube');
    }

    public function faucets() 
    {
        $faucets = [
            [
                "name" => "Etheruem Sepolia",
                "url" => "https://sepolia-faucet.pk910.de/"
            ],
            [
                "name" => "Tron Nile",
                "url" => "https://nileex.io/join/getJoinPage"
            ],     
            [
                "name" => "Solana",
                "url" => "https://solfaucet.com/"
            ],        
        ];
        return view('home.faucets', ['faucets' => $faucets]);
    }
}