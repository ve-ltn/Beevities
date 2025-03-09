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

class ArticleSeeder extends Seeder
{
    public function run()
    {
        Article::create([
            'organization_id' => 1, // BNCC
            'title' => 'The Future of Programming',
            'description' => 'A deep dive into what the future holds for developers.',
            'image' => 'articles/future_programming.jpg',
        ]);

        Article::create([
            'organization_id' => 1, // BNCC
            'title' => 'AI and Its Impact on Society',
            'description' => 'Understanding how AI is shaping the world.',
            'image' => 'articles/ai_impact.jpg',
        ]);

        Article::create([
            'organization_id' => 1, // BNCC
            'title' => 'Best Coding Practices',
            'description' => 'Learn the best coding practices for efficiency and security.',
            'image' => 'articles/coding_practices.jpg',
        ]);
    }
}
