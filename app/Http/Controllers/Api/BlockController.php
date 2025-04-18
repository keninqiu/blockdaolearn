<?php
namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Repositories\BlockRepository;
use Illuminate\Support\Facades\Log;

class BlockController extends Controller
{
    public function getByPostId(Request $request) {
        $postId = $request->postId;
        $blocks = BlockRepository::getByPostId($postId);
        return response()->json([
            'code' => 0,
            'data' => $blocks,
            'message' => 'Successfully get blocks by post id'
        ]);  
    }

    public function saveByPostId(Request $request) {
        $postId = $request->postId;
        $blocks = $request->blocks;
        $finalBlocks = [];
        
        foreach($blocks as $index => $block) {
            if(isset($block['id'])) {
                $item = BlockRepository::update(
                    $block['id'], $postId, $block['type'], $block['content'], $index);
                $finalBlocks[] = $item;
            } else {
                $item = BlockRepository::create(
                    $postId, $block['type'], $block['content'], $index);
                $finalBlocks[] = $item;
            }

        }
        return response()->json([
            'code' => 0,
            'data' => $finalBlocks,
            'message' => 'Successfully save blocks by post id'
        ]);  
    }
}