<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class foods_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('foods')->insert([
            'name' => 'Bún cá',
            'category_id' => '1',
            'restaurant_id' => '1',
            'user_id' => '1'

        ]);

        DB::table('foods')->insert([
            'name' => 'Trà sữa trân châu',
            'category_id' => '2',
            'restaurant_id' => '2',
            'user_id' => '2'

        ]);
    }
}
