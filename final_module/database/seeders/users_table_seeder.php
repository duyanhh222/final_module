<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class users_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'user_name' => 'Tran Van An',
            'user_email' => 'an@gmail.com',
            'user_password' => '1',
            'user_phone' => '123456789',
            'user_address' => 'HN',
            'user_restaurent' => '1'

        ]);

        DB::table('users')->insert([
            'user_name' => 'Tran Van An',
            'user_email' => 'an1@gmail.com',
            'user_password' => '1',
            'user_phone' => '234567891',
            'user_address' => 'HN',
            'user_restaurent' => '2'

        ]);
    }
}
