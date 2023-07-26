<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DaysSeeder::class, // 6
            LocationSeeder::class, // 3
            MembershipSeeder::class, // 3
            SalonSeeder::class, // 3
        ]);
        \App\Models\Client::factory(500)->create();
        \App\Models\Coach::factory(10)->create();
    }
}
