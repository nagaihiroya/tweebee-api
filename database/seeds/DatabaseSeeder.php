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
        $this->call(HobbyCategoryTableSeeder::class);
        $this->call(HobbyTagTableSeeder::class);
        $this->call(HobbyGenreTableSeeder::class);
    }
}
