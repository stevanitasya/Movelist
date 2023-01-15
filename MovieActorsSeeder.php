<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieActorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('movieactors')->insert([[
            'actors_id' => 1,
            'movies_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'actors_id' => 2,
            'movies_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'actors_id' => 3,
            'movies_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'actors_id' => 4,
            'movies_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'actors_id' => 5,
            'movies_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'actors_id' => 6,
            'movies_id' => 4,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'actors_id' => 7,
            'movies_id' => 4,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'actors_id' => 8,
            'movies_id' => 5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'actors_id' => 9,
            'movies_id' => 5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'actors_id' => 10,
            'movies_id' => 5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]]);
    }
}
