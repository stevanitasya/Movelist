<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genre')->insert([[
            'name' => 'Action', //1
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'Sci-Fi', //2
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'Horror',//3
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'Adventure',//4
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'Thriller',//5
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'Comedy',//6
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()

        ],
        [
            'name' => 'Animation',//7
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()   
        ],
        [
            'name' => 'Family',//8
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'Fantasy',//9
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()    
        ]]);
    }
}
