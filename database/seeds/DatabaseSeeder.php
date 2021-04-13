<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ArticlesTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(FollowsTableSeeder::class);
        $this->call(LikesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
