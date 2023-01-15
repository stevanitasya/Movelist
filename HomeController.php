<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    //
    public function home(Request $request){

        $movies = $this->getMovies();
        $genres = $this->getGenre();
        $rMovies = $this->randomCarousel();
        return view('home', ['rMovies' => $rMovies,
                                         'genres' => $genres,
                                         'movies' => $movies]);
    }

    public function randomCarousel(){
        return Movie::inRandomOrder()->limit(3)->get();
    }

    public function getGenre(){
        return DB::table('genre')->simplePaginate(9);
    }

    public function getMovies(){
        // return DB::table('movies')->simplePaginate(5);
        return Movie::simplePaginate(5);
    }

    public function search(Request $request) {
        $genres = $this->getGenre();
        $rMovies = $this->randomCarousel();
        $movies = Movie::where('title', 'LIKE', "%$request->search%")->simplePaginate(5);
        return view('home')->with(['rMovies' => $rMovies,
                                              'genres' => $genres,
                                              'movies' => $movies]);
    }

    public function latest() {
        //
        $genres = $this->getGenre();
        $rMovies = $this->randomCarousel();
        $movies = DB::table('movies')
        ->select('title', 'thumbnail', 'release_date')
        ->orderBy('release_date')->simplePaginate(5);
        return view('home')->with(['rMovies' => $rMovies,
                                              'genres' => $genres,
                                              'movies' => $movies]);
    }

    public function asc() {
        //
        $genres = $this->getGenre();
        $rMovies = $this->randomCarousel();
        $movies = DB::table('movies')->orderBy('title', 'asc')
        ->simplePaginate(5);
        return view('home')->with(['rMovies' => $rMovies,
                                              'genres' => $genres,
                                              'movies' => $movies]);
    }

    public function desc() {
        //
        $genres = $this->getGenre();
        $rMovies = $this->randomCarousel();
        $movies = DB::table('movies')->orderBy('title', 'desc')->simplePaginate(5);
        return view('home')->with(['rMovies' => $rMovies,
                                              'genres' => $genres,
                                              'movies' => $movies]);
    }
}
