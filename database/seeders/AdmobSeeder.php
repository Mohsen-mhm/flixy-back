<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdmobSeeder extends Seeder
{
    public function run()
    {
        DB::table('admob')->insert([
            [
                'banner_id' => 'banner_id',
                'intersial_id' => 'intersial_id',
                'rewarded_id' => 'rewarded_id',
                'type' => 1,
                'created_at' => '2023-11-08 15:00:45',
                'updated_at' => '2024-07-29 01:27:43'
            ],
            [
                'banner_id' => 'banner_id',
                'intersial_id' => 'intersial_id',
                'rewarded_id' => 'rewarded_id',
                'type' => 2,
                'created_at' => '2023-11-08 15:00:45',
                'updated_at' => '2024-07-24 02:37:20'
            ]
        ]);
    }
} 