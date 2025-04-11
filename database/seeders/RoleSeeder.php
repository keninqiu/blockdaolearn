<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([ // 1
            'name' => 'super admin',
            'display_name' => 'Super Admin User',
            'description' => 'super user with all permissions'
        ]);

        DB::table('roles')->insert([ // 2
            'name' => 'admin',
            'display_name' => 'Admin User',
            'description' => 'admin user with most permissions'
        ]);

        DB::table('roles')->insert([ // 3
            'name' => 'user',
            'display_name' => 'User',
            'description' => 'user'
        ]);

    }
}
