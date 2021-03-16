<?php

use Illuminate\Database\Seeder;
use App\Article;
use App\User;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Article::create([
                // 'user_id' => $i,
                'user_id' => User::all()->random()->id,
                'title' => 'タイトル' . $i,
                'body' => 'これはテスト投稿です' . $i,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
