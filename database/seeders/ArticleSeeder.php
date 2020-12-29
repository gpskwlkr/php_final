<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articles = [
            ['id' => 1, 'small_description' => Str::random(100), 'title' => Str::random(20),
                'body' => Str::random(500), 'category' => rand(1, 3), 'author' => 1, 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 2, 'small_description' => Str::random(100), 'title' => Str::random(20),
                'body' => Str::random(500), 'category' => rand(1, 3), 'author' => 1, 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 3, 'small_description' => Str::random(100), 'title' => Str::random(20),
                'body' => Str::random(500), 'category' => rand(1, 3), 'author' => 1, 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 4, 'small_description' => Str::random(100), 'title' => Str::random(20),
                'body' => Str::random(500), 'category' => rand(1, 3), 'author' => 1, 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 5, 'small_description' => Str::random(100), 'title' => Str::random(20),
                'body' => Str::random(500), 'category' => rand(1, 3), 'author' => 1, 'created_at' => date('Y-m-d H:i:s')],
        ];

        foreach ($articles as $article)
        {
            Article::create($article);
        }
    }
}
