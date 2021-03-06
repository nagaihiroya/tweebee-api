<?php

use Illuminate\Database\Seeder;

class HobbyGenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hobby_genre_master')->truncate();
        DB::table('hobby_genre_master')->insert(['id' => '1', 'category_id' => '1', 'genre_name' => '邦ロック',]);
        DB::table('hobby_genre_master')->insert(['id' => '18', 'category_id' => '1', 'genre_name' => '洋ロック',]);
        DB::table('hobby_genre_master')->insert(['id' => '2', 'category_id' => '2', 'genre_name' => 'RPG',]);
        DB::table('hobby_genre_master')->insert(['id' => '3', 'category_id' => '3', 'genre_name' => 'サッカー',]);
        DB::table('hobby_genre_master')->insert(['id' => '4', 'category_id' => '4', 'genre_name' => 'ストリート系',]);
        DB::table('hobby_genre_master')->insert(['id' => '5', 'category_id' => '5', 'genre_name' => '女優',]);
        DB::table('hobby_genre_master')->insert(['id' => '6', 'category_id' => '6', 'genre_name' => 'コメディー',]);
        DB::table('hobby_genre_master')->insert(['id' => '7', 'category_id' => '7', 'genre_name' => '青春',]);
        DB::table('hobby_genre_master')->insert(['id' => '8', 'category_id' => '8', 'genre_name' => '日本酒',]);
        DB::table('hobby_genre_master')->insert(['id' => '9', 'category_id' => '9', 'genre_name' => 'トヨタ',]);
        DB::table('hobby_genre_master')->insert(['id' => '10', 'category_id' => '10', 'genre_name' => '小説',]);
        DB::table('hobby_genre_master')->insert(['id' => '11', 'category_id' => '11', 'genre_name' => '邦画',]);
        DB::table('hobby_genre_master')->insert(['id' => '12', 'category_id' => '12', 'genre_name' => 'イラスト',]);
        DB::table('hobby_genre_master')->insert(['id' => '13', 'category_id' => '13', 'genre_name' => '電子工作',]);
        DB::table('hobby_genre_master')->insert(['id' => '14', 'category_id' => '14', 'genre_name' => 'ニコニコ動画',]);
        DB::table('hobby_genre_master')->insert(['id' => '15', 'category_id' => '15', 'genre_name' => '海水浴',]);
        DB::table('hobby_genre_master')->insert(['id' => '16', 'category_id' => '16', 'genre_name' => '犬',]);
        DB::table('hobby_genre_master')->insert(['id' => '17', 'category_id' => '17', 'genre_name' => '手相',]);
    }
}
