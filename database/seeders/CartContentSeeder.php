<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cart_content')->insert([
            'cart_id' => 1,
            'product_id' => 2,
            'quantity' => 1,
            'amount' => 29.90,
        ]);
        DB::table('cart_content')->insert([
            'cart_id' => 2,
            'product_id' => 1,
            'quantity' => 4,
            'amount' => 99.60,
        ]);
        DB::table('cart_content')->insert([
            'cart_id' => 2,
            'product_id' => 5,
            'quantity' => 2,
            'amount' => 59.80,
        ]);
        DB::table('cart_content')->insert([
            'cart_id' => 3,
            'product_id' => 5,
            'quantity' => 1,
            'amount' => 29.90,
        ]);
        DB::table('cart_content')->insert([
            'cart_id' => 3,
            'product_id' => 6,
            'quantity' => 1,
            'amount' => 25.00,
        ]);
    }
}
