<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GlobalSettingsSeeder extends Seeder
{
    public function run()
    {
        DB::table('global_settings')->insert([
            'app_name' => 'Flixy',
            'is_live_tv_enable' => 1,
            'is_admob_android' => 0,
            'is_admob_ios' => 0,
            'is_custom_android' => 1,
            'is_custom_ios' => 1,
            'videoad_skip_time' => 4,
            'storage_type' => 0,
            'created_at' => '2021-08-20 09:39:49',
            'updated_at' => '2024-07-30 05:12:15'
        ]);
    }
} 