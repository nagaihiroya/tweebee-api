<?php

use Illuminate\Database\Seeder;

class UserHobbiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_hobbies')->truncate();
        DB::table('user_hobbies')->insert(['user_id' => '1260664039', 'category_id' => '1', 'genre_id' => '1', 'tag_id' => '1', 'rank' => 1]);
        DB::table('user_hobbies')->insert(['user_id' => '1260664039', 'category_id' => '1', 'genre_id' => '1', 'tag_id' => '2', 'rank' => 2]);
        DB::table('user_hobbies')->insert(['user_id' => '1260664039', 'category_id' => '2', 'genre_id' => '2', 'tag_id' => '3', 'rank' => 3]);
        DB::table('user_hobbies')->insert(['user_id' => '1260664039', 'category_id' => '3', 'genre_id' => '3', 'tag_id' => '4', 'rank' => 4]);
        DB::table('user_hobbies')->insert(['user_id' => '1260664039', 'category_id' => '4', 'genre_id' => '4', 'tag_id' => '5', 'rank' => 5]);
    }
}
