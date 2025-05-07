<?php
namespace App\Repositories;
use Illuminate\Support\Facades\Log;
use App\Models\Block;

class BlockRepository {
    static function getByPostId($postId) {
        return Block::where('post_id', $postId)->orderBy('order', 'asc')->get();
    } 

    static function update(
        $id, $postId, $type, $content, $order
    ) {
        $item = Block::find($id);
        
        $item->post_id = $postId;
        $item->type = $type;
        $item->content = $content;
        $item->order = $order;
        
        $item->save();
        return $item;
    }

    static function create(
        $postId, $type, $content, $order
    ) {
        $data = [
            'post_id' => $postId,
            'type' => $type,
            'content' => $content,
            'order' => $order
        ];
        $item = Block::create($data);
        return $item;
    }

    static function deleteAllNotIn($postId, $ids) {
        return Block::where('post_id', $postId)
            ->whereNotIn('id', $ids)
            ->delete();
    }
}