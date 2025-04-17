<?php
namespace App\Repositories;
use Illuminate\Support\Facades\Log;
use App\Models\Block;

class BlockRepository {
    static function getByPostId($postId) {
        return Block::where('post_id', $postId)->get();
    } 
}