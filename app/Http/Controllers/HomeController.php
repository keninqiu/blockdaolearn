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