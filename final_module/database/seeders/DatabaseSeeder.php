<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(Restaurant_table_seeder::class);
         $this->call(tag_table_seeder::class);
         $this->call(CategorySeeder::class);
         $this->call(users_table_seeder::class);
         $this->call(foods_table_seeder::class);
         $this->call(food_tags_table_seeder::class);
    }
}
