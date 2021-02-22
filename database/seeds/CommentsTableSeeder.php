<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    //  ユーザーIDが1のユーザーが各ユーザーに１つコメントしておく
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Comment::create([
                'user_id' => 1,
                'article_id' => $i,
                'comment' => 'これはテストコメントです。' .$i,
                'created_at' => now()
            ]);
        }
    }
}
