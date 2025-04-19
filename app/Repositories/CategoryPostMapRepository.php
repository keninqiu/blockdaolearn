<?php
namespace App\Repositories;
use Illuminate\Support\Facades\Log;
use App\Models\CategoryPostMap;

class CategoryPostMapRepository {
    static function getAll() {
        $items = CategoryPostMap::with('category')->with('post')->get();
        return $items;
    }

    static function getById($id) {
        return CategoryPostMap::with('category')->with('post')->find($id);
    }

    
    static function update(
        $id, $categoryId, $postId
    ) {
        $item = CategoryPostMap::find($id);
        
        $item->category_id = $categoryId;
        $item->post_id = $postId;
        
        $item->save();
        return $item;
    }
    static function create(
        $categoryId, $postId
    ) {
        $data = [
            'category_id' => $categoryId,
            'post_id' => $postId
        ];
        $item = CategoryPostMap::create($data);
        return $item;
    }
}