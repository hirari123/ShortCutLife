<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FollowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ユーザーIDの1が、各ユーザーをフォローしておく
        for ($i = 2; $i <= 10; $i++) {
            DB::table('follows')->insert([
                'followe_id' => $i,
                'follower_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        // ユーザーIDの1が、ユーザーIDの2, 3以外がフォローしておく
        for ($i = 4; $i <= 10; $i++) {
            DB::table('follows')->insert([
                'followee_id' => 1,
                'follower_id' => $i,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
