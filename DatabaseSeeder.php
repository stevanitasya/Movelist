<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        $this->call(UserSeeder::class);
        $this->call(MovieSeeder::class);
        $this->call(ActorSeeder::class);
        $this->call(GenreSeeder::class);
        $this->call(MovieActorsSeeder::class);
        $this->call(MovieGenreSeeder::class);
    }
}
