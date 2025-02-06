<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'category_id' => 1,
            'name'        => 'Samsung S23',
            'price'       => 10000000,
            'stock'       => 2,
            'image'       => 'samsungs23.jpg'
        ]);

        Product::create([
            'category_id' => 1,
            'name'        => 'Smartphone Advan',
            'price'       => 9000000,
            'stock'       => 2,
            'image'       => 'smartphone.jpg'
        ]);

        Product::create([
            'category_id' => 2,
            'name'        => 'Ngawi T-Shirt',
            'price'       => 3000000,
            'stock'       => 20,
            'image'       => 'ngawitshirt.jpg'
        ]);

        Product::create([
            'category_id' => 3,
            'name'        => 'Rodokan Azril',
            'price'       => 99000000,
            'stock'       => 999,
            'image'       => 'azrilxandriana.jpg'
        ]);

        Product::create([
            'category_id' => 2,
            'name'        => 'Aduh gantengnya',
            'price'       => 7000000,
            'stock'       => 3,
            'image'       => 'aduhgantengnya.jpg'
        ]);

        Product::create([
            'category_id' => 3,
            'name'        => 'BuluBulu andre',
            'price'       => 10000000,
            'stock'       => 5,
            'image'       => 'sabaryaazril.jpg'
        ]);
    }
}
