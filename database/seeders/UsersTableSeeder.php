<?php

namespace Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     [
        //         'name' => 'ゲストユーザー',
        //         'email' => 'guest@guest.com',
        //         'password' => Hash::make(config('user.user_password_01')),
        //         'remember_token' => Str::random(10),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],

        //     [
        //         'name' => '山田',
        //         'email' => 'yamada@co.jp',
        //         'password' => Hash::make(config('user.user_password_02')),
        //         'remember_token' => Str::random(10),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],

        //     [
        //         'name' => 'suzuki',
        //         'email' => 'suzuki@co.jp',
        //         'password' => Hash::make(config('user.user_password_03')),
        //         'remember_token' => Str::random(10),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]
        // ]);

        // for ($i = 4; $i <= 10; $i++) {
        //     DB::table('users')->insert([
        //         'name' => 'test_user' . $i,
        //         'email' => 'test' .$i . '@test.com',
        //         'password' => Hash::make(config('12345678')),
        //         'remember_token' => Str::random(10),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }

        $faker = \Faker\Factory::create('ja_JP');
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'name' => $faker->unique()->name,
                'email' => Str::random(10) . '@gmail.com',
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'create_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
