<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'username' => 'user1',
            'email' => 'user1@gmail.com',
            'password' => bcrypt('user123')
        ]);

        DB::table('users')->insert([
            'username' => 'admin1',
            'email' => 'admin1@gmail.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin'
        ]);
    }
}
