<?php

use Illuminate\Database\Seeder;

class HobbyTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hobby_tag_master')->truncate();
        DB::table('hobby_tag_master')->insert(['genre_id' => '1', 'tag_name' => 'ELLEGARDEN', 'is_active' => 1,]);
        DB::table('hobby_tag_master')->insert(['genre_id' => '1', 'tag_name' => 'BUMP OF CHICKEN', 'is_active' => 1,]);
        DB::table('hobby_tag_master')->insert(['genre_id' => '18', 'tag_name' => 'RED HOT CHILI PEPERS', 'is_active' => 1,]);
        DB::table('hobby_tag_master')->insert(['genre_id' => '2', 'tag_name' => 'FINAL FANTASY', 'is_active' => 1,]);
        DB::table('hobby_tag_master')->insert(['genre_id' => '3', 'tag_name' => '鹿島アントラーズ', 'is_active' => 1,]);
        DB::table('hobby_tag_master')->insert(['genre_id' => '4', 'tag_name' => 'BALENCIAGA', 'is_active' => 1,]);
        DB::table('hobby_tag_master')->insert(['genre_id' => '5', 'tag_name' => '石原さとみ', 'is_active' => 1,]);
        DB::table('hobby_tag_master')->insert(['genre_id' => '6', 'tag_name' => 'イッテQ', 'is_active' => 1,]);
        DB::table('hobby_tag_master')->insert(['genre_id' => '7', 'tag_name' => '恋は雨上がりのように', 'is_active' => 1,]);
        DB::table('hobby_tag_master')->insert(['genre_id' => '8', 'tag_name' => '獺祭', 'is_active' => 1,]);
        DB::table('hobby_tag_master')->insert(['genre_id' => '9', 'tag_name' => 'センチュリー', 'is_active' => 1,]);
        DB::table('hobby_tag_master')->insert(['genre_id' => '10', 'tag_name' => '人間失格', 'is_active' => 1,]);
        DB::table('hobby_tag_master')->insert(['genre_id' => '11', 'tag_name' => 'テルマエ・ロマエ', 'is_active' => 1,]);
        DB::table('hobby_tag_master')->insert(['genre_id' => '12', 'tag_name' => '東方Project', 'is_active' => 1,]);
        DB::table('hobby_tag_master')->insert(['genre_id' => '13', 'tag_name' => 'Raspberry Pi', 'is_active' => 1,]);
        DB::table('hobby_tag_master')->insert(['genre_id' => '14', 'tag_name' => '音MAD', 'is_active' => 1,]);
        DB::table('hobby_tag_master')->insert(['genre_id' => '15', 'tag_name' => '白浜海岸', 'is_active' => 1,]);
        DB::table('hobby_tag_master')->insert(['genre_id' => '16', 'tag_name' => 'チワワ', 'is_active' => 1,]);
        DB::table('hobby_tag_master')->insert(['genre_id' => '17', 'tag_name' => '生命線', 'is_active' => 1,]);
    }
}
