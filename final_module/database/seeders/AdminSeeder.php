<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{ 
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'admin_name' => 'anh',
            'admin_email' => 'abc@gmail.com',
            'admin_password' => '123456',
            'admin_phone' => '0123456789'
        ]);
    }
}
