<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Restaurant_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('restaurants')->insert([
            'name' => 'Quán bà Hằng',
            'address' => 'Hà Nội',
            'time_open' => '7:00',
            'time_close' => '21:00',
            'service' => '15000',
            'phone' => '0326222518',
            'explain' => 'ship',
        ]);

        DB::table('restaurants')->insert([
            'name' => 'TocoToco',
            'address' => 'Hà Nội',
            'time_open' => '7:00',
            'time_close' => '21:00',
            'service' => '15000',
            'phone' => '0326222518',
            'explain' => 'ship',
        ]);
    }
}
