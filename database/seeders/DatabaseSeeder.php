<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
            KategoriSeeder::class,
            TipeSeeder::class,
            MobilSeeder::class,
            TeamMemberSeeder::class,
        ]);
    }
}
