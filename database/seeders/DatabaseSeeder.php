<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            OrganizationSeeder::class,
            CategorySeeder::class, // ✅ Make sure this runs before ProductSeeder
            EventSeeder::class,
            ArticleSeeder::class,
            ProductSeeder::class,  // ✅ Runs after CategorySeeder
        ]);
    }
}
