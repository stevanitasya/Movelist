<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    //

    public function moviePage(){
        $movies = DB::table('movies')->get();
        $genres = DB::table('genre')->get();
        $actors = DB::table('actors')->get();
        return view('movie', ['movies' => $movies,
                                          'genres' => $genres,
                                          'actors' => $actors]);
    }

    public function detailMovie($id)
    {
        $movies = Movie::find($id);
        return view('detailMovie', ['movies' => $movies]);
    }

    public function deleteMovie($id) {
        //
        $movies = Movie::find($id);

        if(isset($movies)){
            $movies->delete();
        }
        return redirect()->back();
    }

    public function insertMoviePage(){
        $movies = Movie::all();
        $genres = DB::table('genre')->get();
        $actors = DB::table('actors')->get();
        return view('insertMovie', ['movies' => $movies,
                                                'genres' => $genres,
                                                'actors' => $actors]);
    }

    public function insertMovie(Request $request){
        $this->validate($request, [
            'title' => 'required | min:2 | max:50',
            'description' => 'required | max:8',
            'genre' => 'required',
            'character_name' => 'required',
            'director' => 'required | min:3',
            'release_date' => 'required',
            'thumbnail' => 'required|mimes:jpeg,jpg,png,gif',
            'background' => 'required|mimes:jpeg,jpg,png,gif'
        ]);

        $imgT = $request->file('thumbnail');
        $imgB = $request->file('background');

        Storage::putFileAs('public/', $imgT, $imgT->getClientOriginalName());
        Storage::putFileAs('public/', $imgB, $imgB->getClientOriginalName());
       
        DB::table('movies')->insert([
            'title' => $request->title,
            'description' => $request->description,
            'director' => $request->director,
            'release_date' => $request->release_date,
            'thumbnail' => $request->file('thumbnail')->getClientOriginalName(),
            'background' => $request->file('background')->getClientOriginalName()
        ]);
        
        return redirect('home');
    }

    public function editMoviePage(Request $request){
        $movies = DB::table('movies')
        ->where('id', 'LIKE', $request->route('id'))
        ->first();
        $genres = DB::table('genre')->get();
        $actors = DB::table('actors')->get();
        $movieactors = $this->getMovieActors($movies->id);
        return view('insertMovie', ['movies' => $movies,
                                                'genres' => $genres,
                                                'actors' => $actors,
                                                'movieactors' => $movieactors]);
    }

    public function editMovie(Request $request){
        $this->validate($request, [
            'title' => 'required | min:2 | max:50',
            'description' => 'required | max:8',
            'genre' => 'required',
            'character_name' => 'required',
            'director' => 'required | min:3',
            'release_date' => 'required',
            'thumbnail' => 'required|mimes:jpeg,jpg,png,gif',
            'background' => 'required|mimes:jpeg,jpg,png,gif'
        ]);

        $movies_id = $request->route('id');
        $movies = Movie::find($movies_id);

        if($request->hasFile('thumbnail')){
            Storage::delete('thumbnails'.$movies->thumbnail);
            $thumbnail = $request->file('thumbnail')->getClientOriginalName();
            Storage::putFileAs('thumbnails', $request->file('thumbnail'), $thumbnail);
        }

        if($request->hasFile('background')){
            Storage::delete('backgrounds'.$movies->background);
            $background = $request->file('background')->getClientOriginalName();
            Storage::putFileAs('backgrounds', $request->file('background'), $background);
        }
       
        DB::table('movies')->where('id', $movies_id)
        ->update([
            'title' => $request->title,
            'description' => $request->description,
            'director' => $request->director,
            'release_date' => $request->release_date,
            'thumbnail' => $movies->thumbnail,
            'background' => $movies->background
        ]);

        DB::table('movie_genres')->where('movie_id', $movies_id)->delete();

        foreach($request->genres as $g){
            $genre_row = DB::table('genres')->where('genre', $g)->first();
            $genre_id = $genre_row->id;

            DB::table('movie_genres')
            ->insert([
                'genre_id' => $genre_id,
                'movie_id' => $movies_id
            ]);
        }

        DB::table('movie_actors')->where('movie_id', 'LIKE', $movies_id)->delete();

        $actors_id = DB::table('actors')
        ->where('name', $request->actors)->first()->id;
        DB::table('movie_actors')->where('movie_id', 'LIKE', $movies_id)
        ->insert([
            'movie_id' => $movies_id,
            'actor_id' => $actors_id,
            'character' => $request->character_name
        ]);

        return redirect('movie');
    }

    public function getMovieActors($id){
        return DB::table('movies')
            ->join('movieactors', 'movie_id','=', 'movies.id')
            ->join('actors', 'actor_id','=', 'actors.id')
            ->where('movie_id', $id)
            ->get();
    }

}
