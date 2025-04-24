<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Repositories\MiniRepository;
use Illuminate\Support\Facades\Log;

class MiniController extends Controller
{
    public function all() 
    {
        $items = MiniRepository::getAll();  
        
        return view('mini.minis', ['minis' => $items]);
    }

    public function single($slug) 
    {
        $item = MiniRepository::getBySlug($slug);  
        
        return view('mini.mini', ['mini' => $item]);  
    }
}