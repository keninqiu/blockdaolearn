<?php
namespace App\Repositories;
use Illuminate\Support\Facades\Log;
use App\Models\Team;

class TeamRepository {
    static function getAll() {
        return Team::get();
    }

    static function getById($id) {
        return  Team::find($id);
    }

    static function create($userId, $name, $displayName, $description, $avatar) {
        $data = [
          'user_id' => $userId,
          'name' => $name,
          'display_name' => $displayName,
          'description' => $description,
          'avatar' => $avatar
        ];
        $item = Team::create($data);
        return $item;
    }

    static function update($id, $userId, $name, $displayName, $description, $avatar) {
        $item = Team::find($id);
        $item->user_id = $userId;
        $item->name = $name;
        $item->display_name = $displayName;
        $item->description = $description;
        if($avatar) {
            $item->item = $item;
        }
        
        $item->save();
        return $item;
    }
}