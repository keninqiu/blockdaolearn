<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Repositories\LanguageRepository;
use Illuminate\Support\Facades\Log;

class LanguageController extends Controller
{
    public function all() 
    {
        $items = LanguageRepository::getAll();    
        return response()->json([
            'code' => 0,
            'data' => $items,
            'message' => 'Get languages successfully'
        ]);
    }

    public function create(Request $request) 
    {
        $code = $request->code;
        $name = $request->name;
        $item = LanguageRepository::create($name, $code);
        return response()->json([
            'code' => 0,
            'data' => $item,
            'message' => 'Get language successfully'
        ]);
    }

    public function update(Request $request) 
    {
        $id = $request->id;
        $code = $request->code;
        $name = $request->name;
        $item = LanguageRepository::update($id, $name, $code);
        return response()->json([
            'code' => 0,
            'data' => $item,
            'message' => 'Update language successfully'
        ]);
    }

    public function getByCode(Request $request) 
    {
        $code = $request->code;
        $item = LanguageRepository::getByCode($code);
        return response()->json([
            'code' => 0,
            'data' => $item,
            'message' => 'Get language successfully'
        ]);
    }
}