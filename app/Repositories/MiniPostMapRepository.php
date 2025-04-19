<?php
namespace App\Repositories;
use Illuminate\Support\Facades\Log;
use App\Models\MiniPostMap;

class MiniPostMapRepository {
    static function getAll() {
        $items = MiniPostMap::with('mini')->with('post')->get();
        return $items;
    }

    static function getById($id) {
        return MiniPostMap::with('mini')->with('post')->find($id);
    }

    
    static function update(
        $id, $userId, $miniId, $postId
    ) {
        $item = MiniPostMap::find($id);
        $item->user_id = $userId;
        $item->mini_id = $miniId;
        $item->post_id = $postId;
        
        $item->save();
        return $item;
    }
    static function create(
        $userId, $miniId, $postId
    ) {
        $data = [
            'user_id' => $userId,
            'mini_id' => $miniId,
            'post_id' => $postId
        ];
        $item = MiniPostMap::create($data);
        return $item;
    }
}