<?php
namespace App\Repositories;
use Illuminate\Support\Facades\Log;
use App\Models\Category;

class CategoryRepository {
    static function getAll() {
        $posts = Category::get();
        return $posts;
    }

    static function getById($id) {
        return Category::find($id);
    }

    static function getBySlug($slug) {
        return Category::where('slug', $slug)->first();
    }
    
    static function update(
        $id, $slug, $title, $order
    ) {
        $item = Category::find($id);
        
        $item->slug = $slug;
        $item->title = $title;
        $item->order = $order;
        
        $item->save();
        return $item;
    }
    static function create(
        $slug, $title, $order
    ) {
        $data = [
            'slug' => $slug,
            'title' => $title,
            'order' => $order
        ];
        $item = Category::create($data);
        return $item;
    }
}