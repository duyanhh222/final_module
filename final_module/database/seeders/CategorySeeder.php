<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use  Illuminate\Support\Str;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'bún',
            'image' => 'aa.jpg'
        ]);
        DB::table('categories')->insert([
            'name' => 'trà sữa',
            'image' => 'bb.jpg'
        ]);
    }
}
