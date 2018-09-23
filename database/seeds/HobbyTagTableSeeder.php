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
        DB::table('hobby_tag_master')->insert(['genre_id' => '1', 'tag_name' => 'ELLEGARDEN',]);
        DB::table('hobby_tag_master')->insert(['genre_id' => '1', 'tag_name' => 'BUMP OF CHICKEN',]);
        DB::table('hobby_tag_master')->insert(['genre_id' => '18', 'tag_name' => 'RED HOT CHILI PEPERS',]);
        DB::table('hobby_tag_master')->insert(['genre_id' => '2', 'tag_name' => 'FINAL FANTASY',]);
        DB::table('hobby_tag_master')->insert(['genre_id' => '3', 'tag_name' => '鹿島アントラーズ',]);
        DB::table('hobby_tag_master')->insert(['genre_id' => '4', 'tag_name' => 'BALENCIAGA',]);
        DB::table('hobby_tag_master')->insert(['genre_id' => '5', 'tag_name' => '石原さとみ',]);
        DB::table('hobby_tag_master')->insert(['genre_id' => '6', 'tag_name' => 'イッテQ',]);
        DB::table('hobby_tag_master')->insert(['genre_id' => '7', 'tag_name' => '恋は雨上がりのように',]);
        DB::table('hobby_tag_master')->insert(['genre_id' => '8', 'tag_name' => '獺祭',]);
        DB::table('hobby_tag_master')->insert(['genre_id' => '9', 'tag_name' => 'センチュリー',]);
        DB::table('hobby_tag_master')->insert(['genre_id' => '10', 'tag_name' => '人間失格',]);
        DB::table('hobby_tag_master')->insert(['genre_id' => '11', 'tag_name' => 'テルマエ・ロマエ',]);
        DB::table('hobby_tag_master')->insert(['genre_id' => '12', 'tag_name' => '東方Project',]);
        DB::table('hobby_tag_master')->insert(['genre_id' => '13', 'tag_name' => 'Raspberry Pi',]);
        DB::table('hobby_tag_master')->insert(['genre_id' => '14', 'tag_name' => '音MAD',]);
        DB::table('hobby_tag_master')->insert(['genre_id' => '15', 'tag_name' => '白浜海岸',]);
        DB::table('hobby_tag_master')->insert(['genre_id' => '16', 'tag_name' => 'チワワ',]);
        DB::table('hobby_tag_master')->insert(['genre_id' => '17', 'tag_name' => '生命線',]);
    }
}
