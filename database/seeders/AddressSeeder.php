<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('address')->insert([
           'user_id' => '1',
            'first_name' => 'Karol',
            'last_name' => 'Hetman',
            'street' => 'Dominów',
            'house' => '152b',
            'flat' => null,
            'post_code' => '20388',
            'city' => 'Lublin',
            'phone' => '726380900'
        ]);
        DB::table('address')->insert([
            'user_id' => '2',
            'first_name' => 'Jan',
            'last_name' => 'Kowalski',
            'street' => 'Wilczopole',
            'house' => '15b',
            'flat' => null,
            'post_code' => '20389',
            'city' => 'Lublin',
            'phone' => '569419402'
        ]);
    }
}
