<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cart')->insert([
           'user_id' => '1',
           'address_id' => '1',
           'description' => 'Jeżeli nie będzie mnie w domu proszę o pozostawienie zamówienia przed drzwiami wejściowymi',
           'status' => 4,
           'amount' => 29.90,
           'ordered_at' => '2022-01-21 17:01:19',
           'delivered_at' => '2022-01-21 18:31:25'
        ]);
        DB::table('cart')->insert([
            'user_id' => '1',
            'address_id' => '1',
            'description' => null,
            'status' => 1,
            'amount' => 159.40,
            'ordered_at' => '2022-01-20 20:01:29',
            'delivered_at' => null
        ]);
        DB::table('cart')->insert([
            'user_id' => '2',
            'address_id' => '2',
            'description' => null,
            'status' => 4,
            'amount' => 54.90,
            'ordered_at' => '2022-01-02 05:01:52',
            'delivered_at' => '2022-01-02 07:21:45'
        ]);
    }
}
