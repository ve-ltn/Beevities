<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Organization;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class OrganizationSeeder extends Seeder
{
    public function run()
    {
        Organization::create([
            'name' => 'Bina Nusantara Computer Club',
            'description' => 'A leading tech community.',
            'email' => 'contact@tech.org',
            'phone' => '081234567899',
            'website' => 'https://tech.org',
            'banner_image' => 'banners/bncc.jpg',
        ]);        
    }
}