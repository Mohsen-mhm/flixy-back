<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesSeeder extends Seeder
{
    public function run()
    {
        DB::table('tbl_pages')->insert([
            'privacy' => '<p>Privacy policy content...</p>',
            'termsofuse' => '<p>Terms & Conditions content...</p>',
            'created_at' => '2023-03-22 10:37:41',
            'updated_at' => '2024-06-19 06:24:48'
        ]);
    }
} 