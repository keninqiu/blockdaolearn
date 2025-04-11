<?php
namespace App\Repositories;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Utils\StringUtil;

class UserRepository {
    static function getAll() {
        return User::get();
    }
    static function create($data) {
        $user = User::create($data);
        return $user;
    }

    static function update($id, $name, $code, $email) {
        $user = User::find($id);
        $user->name = $name;
        $user->code = $code;
        $user->email = $email;
        return $user;
    }

    static function getOrCreate(
        $email,
        $name
    ) {
        $user = self::getByEmail($email);
        $code = StringUtil::getUniqueToken();
        if($user) {
            if(!$user->code) {
                $user->code = $code;
                $user->save();
            }
            return $user;
        }
        
        $data = [
            'email' => $email,
            'name' => $name,
            'code' => $code,
            'password'=> 'nopassword'
        ];
        return self::create($data);
    }
    static function getById($id) {
        return  User::find($id);
    }

    static function getByEmail($email) {
        $user = User::where(['email' => $email])->first();
        return $user;
    }

    static function validate($email) {
        $user = User::where(['email' => $email])->first();
        $user->status = 1;
        return $user;
    }

    static function getByCode($code) {
        $user = User::where(['code' => $code])->first();
        return $user;
    }
} 