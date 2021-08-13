<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class food_tags_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('food_tags')->insert([
            'food_id' => '1',
            'tag_id' => '1',

        ]);
        DB::table('food_tags')->insert([
            'food_id' => '2',
            'tag_id' => '2',
        ]);
    }
}
