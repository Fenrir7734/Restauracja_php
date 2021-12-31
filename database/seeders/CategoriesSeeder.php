<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'PIZZA & MAKARONY',
            'photo' => 'pizza_img_banner.jpg'
        ]);
        DB::table('categories')->insert([
            'name' => 'HAMBURGER',
            'photo' => 'burger_img_banner.jpg'
        ]);
        DB::table('categories')->insert([
            'name' => 'DODATKI',
            'photo' => 'sides_img_banner.jpg'
        ]);
    }
}
