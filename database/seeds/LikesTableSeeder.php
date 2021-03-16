<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ユーザーIDの1が、自分を除くツイートに対して1つ「いいね」をつける
        for ($i = 2; $i <= 10; $i++) {
            DB::table('likes')->insert([
                'user_id' => 1,
                // 'article_id' => $i,
                'article_id' => User::all()->random()->id,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        // ユーザーIDの2が、ユーザー1と自分を除くツイートに対して1つ「いいね」を付ける
        for ($i = 3; $i <= 10; $i++) {
            DB::table('likes')->insert([
                'user_id' => 2,
                // 'article_id' => $i,
                'article_id' => User::all()->random()->id,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
