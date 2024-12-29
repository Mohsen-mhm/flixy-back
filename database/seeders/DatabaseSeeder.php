<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            AdminUserSeeder::class,
            AdmobSeeder::class,
            GlobalSettingsSeeder::class,
            PagesSeeder::class,
        ]);
    }
} 