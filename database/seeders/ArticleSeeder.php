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
            'organization_id' => 1,
            'title' => 'Latest Trends in AI',
            'description' => 'An in-depth analysis of AI advancements.',
            'image' => 'articles/ai_trends.jpg',
        ]);
    }
}