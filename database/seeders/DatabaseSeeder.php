<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            OrganizationSeeder::class, // ✅ Organizations first
            CategorySeeder::class,     // ✅ Categories before products
            UserSeeder::class,         // ✅ Users (after organization exists)
            ProductSeeder::class,      // ✅ Products (after categories exist)
            EventSeeder::class,        // ✅ Events (after organizations exist)
            ArticleSeeder::class,      // ✅ Articles (after organizations exist)
        ]);
    }
}
