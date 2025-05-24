<?php
namespace App\Repositories;
use Illuminate\Support\Facades\Log;
use App\Models\Category;

class CategoryRepository {
    static function getAll() {
        $items = Category::orderBy('order')->get();
        return $items;
    }

    static function getAllByType($type)
    {
        $items = Category::where('type', $type)->orderBy('order')->get();
        return $items;
    }

    static function getById($id) {
        return Category::find($id);
    }

    static function getBySlug($slug) {
        return Category::where('slug', $slug)->first();
    }
    
    static function update(
        $id, $type, $slug, $title, $order
    ) {
        $item = Category::find($id);
        
        $item->type = $type;
        $item->slug = $slug;
        $item->title = $title;
        $item->order = $order;
        
        $item->save();
        return $item;
    }
    static function create(
        $type, $slug, $title, $order
    ) {
        $data = [
            'type' => $type,
            'slug' => $slug,
            'title' => $title,
            'order' => $order
        ];
        $item = Category::create($data);
        return $item;
    }
}