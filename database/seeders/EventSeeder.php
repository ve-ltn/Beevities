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
            'organization_id' => 1, // BNCC
            'title' => 'Tech Talk 2025',
            'description' => 'A discussion on the latest in technology.',
            'event_date' => now()->addDays(30),
            'image' => 'events/tech_talk.jpg',
        ]);

        Event::create([
            'organization_id' => 1, // BNCC
            'title' => 'Programming Workshop',
            'description' => 'Learn to code with BNCC experts.',
            'event_date' => now()->addDays(45),
            'image' => 'events/workshop.jpg',
        ]);

        Event::create([
            'organization_id' => 1, // BNCC
            'title' => 'Cyber Security Awareness',
            'description' => 'Protect yourself in the digital world.',
            'event_date' => now()->addDays(60),
            'image' => 'events/cyber_security.jpg',
        ]);
    }
}
