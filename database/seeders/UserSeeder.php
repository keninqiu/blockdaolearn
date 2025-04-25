<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'nickname' => 'Ken',
            'email' => 'admin@gmail.com',
            'code' => 'fawe223ffee',
            'password' => Hash::make('1qaz@WSX')
        ]);
    }
}