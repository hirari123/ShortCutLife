<?php

use Illuminate\Database\Seeder;
use Illuminate\Meeting;

class MeetingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Meeting::class, 20)->ceeate();
    }
}