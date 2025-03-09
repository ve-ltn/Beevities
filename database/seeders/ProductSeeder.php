<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'organization_id' => 1, // BNCC
            'category_id' => 1,
            'name' => 'BNCC Hoodie',
            'price' => 500000,
            'stock' => 100,
            'image' => 'products/bncc_hoodie.jpg',
        ]);

        Product::create([
            'organization_id' => 1, // BNCC
            'category_id' => 2,
            'name' => 'BNCC Notebook',
            'price' => 75000,
            'stock' => 200,
            'image' => 'products/bncc_notebook.jpg',
        ]);

        Product::create([
            'organization_id' => 1, // BNCC
            'category_id' => 3,
            'name' => 'BNCC Sticker Pack',
            'price' => 25000,
            'stock' => 500,
            'image' => 'products/bncc_sticker.jpg',
        ]);
    }
}
