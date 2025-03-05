<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Organization;
use App\Models\Event;
use App\Models\Article;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    public function run()
    {
        Event::create([
            'organization_id' => 1,
            'title' => 'Tech Conference 2025',
            'description' => 'A global conference for tech enthusiasts.',
            'event_date' => now()->addDays(30),
            'image' => 'events/conference.jpg',
        ]);
    }
}
