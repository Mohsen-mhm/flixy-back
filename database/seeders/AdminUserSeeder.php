<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        DB::table('admin_user')->insert([
            [
                'user_name' => 'admin',
                'user_password' => Hash::make('xNSiq73bOEx2'),
                'user_type' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_name' => 'tester',
                'user_password' => Hash::make('rKti3BaRuA89'),
                'user_type' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
