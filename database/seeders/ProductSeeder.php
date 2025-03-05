<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'organization_id' => 1,
            'category_id' => 1,
            'name' => 'Tech Hoodie',
            'price' => 500000,
            'stock' => 100,
            'image' => 'products/hoodie.jpg',
        ]);
    }
}
