<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('languages')->insert([
            'code' => 'en-US',
            'name' => 'English'
        ]);
        DB::table('languages')->insert([
            'code' => 'zh-CN',
            'name' => '简体中文'
        ]);
        DB::table('languages')->insert([
            'code' => 'zh-TW',
            'name' => '繁體中文'
        ]);
    }
}