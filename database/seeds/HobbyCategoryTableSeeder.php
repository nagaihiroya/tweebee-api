<?php

use Illuminate\Database\Seeder;

class HobbyCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hobby_category_master')->truncate();
        DB::table('hobby_category_master')->insert(['id' => '1', 'category_name' => '音楽',]);
        DB::table('hobby_category_master')->insert(['id' => '2', 'category_name' => 'ゲーム',]);
        DB::table('hobby_category_master')->insert(['id' => '3', 'category_name' => 'スポーツ',]);
        DB::table('hobby_category_master')->insert(['id' => '4', 'category_name' => 'ファッション',]);
        DB::table('hobby_category_master')->insert(['id' => '5', 'category_name' => '芸能人・有名人・お笑い',]);
        DB::table('hobby_category_master')->insert(['id' => '6', 'category_name' => 'TV番組',]);
        DB::table('hobby_category_master')->insert(['id' => '7', 'category_name' => 'アニメ・漫画',]);
        DB::table('hobby_category_master')->insert(['id' => '8', 'category_name' => 'グルメ・お酒',]);
        DB::table('hobby_category_master')->insert(['id' => '9', 'category_name' => '車・バイク',]);
        DB::table('hobby_category_master')->insert(['id' => '10', 'category_name' => '本',]);
        DB::table('hobby_category_master')->insert(['id' => '11', 'category_name' => '映画',]);
        DB::table('hobby_category_master')->insert(['id' => '12', 'category_name' => 'アート',]);
        DB::table('hobby_category_master')->insert(['id' => '13', 'category_name' => '学問・研究・開発',]);
        DB::table('hobby_category_master')->insert(['id' => '14', 'category_name' => 'PC・インターネット',]);
        DB::table('hobby_category_master')->insert(['id' => '15', 'category_name' => '旅行・レジャー',]);
        DB::table('hobby_category_master')->insert(['id' => '16', 'category_name' => 'ペット',]);
        DB::table('hobby_category_master')->insert(['id' => '17', 'category_name' => '占い',]);
    }
}
