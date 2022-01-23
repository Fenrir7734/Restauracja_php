<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
           'name' => 'Karol Hetman',
           'email' => 'hitex1999@gmail.com',
           'email_verified_at' => '2022-01-07 13:01:54',
           'password' => Hash::make("qwertyuiop"),
           'role_as' => 0,
        ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => '2022-01-02 15:28:34',
            'password' => Hash::make("adminadmin"),
            'role_as' => 1,
        ]);
    }
}
