<?php

namespace Database\Seeders;

use App\Models\Actor;
use App\Models\Director;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    Movie::factory(50)
        ->create()
        ->each(function ($movie) {

            $movie->genres()->attach(

                Genre::inRandomOrder()
                    ->limit(rand(1,3))
                    ->pluck('id')
            );

            $movie->actors()->attach(

                Actor::inRandomOrder()
                    ->limit(rand(3,8))
                    ->pluck('id')
            );

            $movie->directors()->attach(

                Director::inRandomOrder()
                    ->limit(rand(1,2))
                    ->pluck('id')
            );
        });
}
}
