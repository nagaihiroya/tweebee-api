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
        DB::table('hobby_category_master')->insert(['id' => '1', 'category_name' => '音楽', 'is_active' => 1,]);
        DB::table('hobby_category_master')->insert(['id' => '2', 'category_name' => 'ゲーム', 'is_active' => 1,]);
        DB::table('hobby_category_master')->insert(['id' => '3', 'category_name' => 'スポーツ', 'is_active' => 1,]);
        DB::table('hobby_category_master')->insert(['id' => '4', 'category_name' => 'ファッション', 'is_active' => 1,]);
        DB::table('hobby_category_master')->insert(['id' => '5', 'category_name' => '芸能人・有名人・お笑い', 'is_active' => 1,]);
        DB::table('hobby_category_master')->insert(['id' => '6', 'category_name' => 'TV番組', 'is_active' => 1,]);
        DB::table('hobby_category_master')->insert(['id' => '7', 'category_name' => 'アニメ・漫画', 'is_active' => 1,]);
        DB::table('hobby_category_master')->insert(['id' => '8', 'category_name' => 'グルメ・お酒', 'is_active' => 1,]);
        DB::table('hobby_category_master')->insert(['id' => '9', 'category_name' => '車・バイク', 'is_active' => 1,]);
        DB::table('hobby_category_master')->insert(['id' => '10', 'category_name' => '本', 'is_active' => 1,]);
        DB::table('hobby_category_master')->insert(['id' => '11', 'category_name' => '映画', 'is_active' => 1,]);
        DB::table('hobby_category_master')->insert(['id' => '12', 'category_name' => 'アート', 'is_active' => 1,]);
        DB::table('hobby_category_master')->insert(['id' => '13', 'category_name' => '学問・研究・開発', 'is_active' => 1,]);
        DB::table('hobby_category_master')->insert(['id' => '14', 'category_name' => 'PC・インターネット', 'is_active' => 1,]);
        DB::table('hobby_category_master')->insert(['id' => '15', 'category_name' => '旅行・レジャー', 'is_active' => 1,]);
        DB::table('hobby_category_master')->insert(['id' => '16', 'category_name' => 'ペット', 'is_active' => 1,]);
        DB::table('hobby_category_master')->insert(['id' => '17', 'category_name' => '占い', 'is_active' => 1,]);
    }
}
