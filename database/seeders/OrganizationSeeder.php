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
            'description' => 'A leading tech organization of Bina Nusantara.',
            'email' => 'bncc@gmail.com',
            'phone' => '081234567899',
            'website' => 'https://bncc.org',
            'banner_image' => 'banners/bncc.jpg',
            'logo' => 'logos/bncc_logo.jpg',
        ]);

        Organization::create([
            'name' => 'Bersama Dalam Musik',
            'description' => 'Music Talent and Skill Development Organization.',
            'email' => 'bdm@gmail.com',
            'phone' => '081234567900',
            'website' => 'https://student-activity.binus.ac.id/bdm/program/',
            'banner_image' => 'banners/aisociety.jpg',
            'logo' => 'logos/bdm_logo.jpg',
        ]);
    }
}
