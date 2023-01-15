<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\MovieActors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ActorController extends Controller
{
    public function actor()
    {
        $actors = MovieActors::all();
        return view('pages.actor.actor', [
            'actors' => $actors
        ]);
    }

    public function detailActor($id)
    {
        $actors = MovieActors::find($id);
        return view('pages.actor.detailActor', [
            'actors' => $actors
        ]);
    }

    public function deleteActor($id) {
        //
        $actors = Actor::find($id);

        if(isset($actors)){
            $actors->delete();
        }
        return redirect()->back();
    }

    public function insertActorPage(){
        $actors = Actor::all();
        $movies = DB::table('movies')->get();
       return view('pages.actor.insertActor', ['actors' => $actors,
                                                 'movies' => $movies]);
    }
    
    public function insertActor(Request $request){
       $this->validate($request, [
          'name' => 'required | min:3',
          'gender' => 'required',
          'biography' => 'required | max:10',
          'birthday' => 'required',
          'place_of_brith' => 'required',
          'image' => 'required|mimes:jpeg,jpg,png,gif',
          'popularity' => 'required'
        ]);

        $imgA = $request->file('actor');

        Storage::putFileAs('public/', $imgA, $imgA->getClientOriginalName());
       
        DB::table('actors')->insert([
            'name' => $request->name,
            'gender' => $request->gender,
            'biography' => $request->biography,
            'birthday' => $request->birthday,
            'place_of_brith' => $request->place_of_brith,
            'image' => $request->file('actor')->getClientOriginalName(),
            'popularity' => $request->popularity
       ]);
        
       return redirect('actor');
    }   

    public function editActorPage(Request $request){
        $actors = DB::table('actors')
        ->where('id', 'LIKE', $request->route('id'))
        ->first();
        $movies = $this->getMovies($actors->id);
        return view('insertMovie', ['actors' => $actors,
                                                'movies' => $movies]);
    }

    public function editActor(Request $request){
        $this->validate($request, [
            'name' => 'required | min:3',
            'gender' => 'required',
            'biography' => 'required | max:10',
            'birthday' => 'required',
            'place_of_brith' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif',
            'popularity' => 'required'
        ]);

        $actors_id = $request->route('id');
        $actors = Actor::find($actors_id);

        if($request->hasFile('actor')){
            Storage::delete('actor'.$actors->thumbnail);
            $actors = $request->file('actor')->getClientOriginalName();
            Storage::putFileAs('actor', $request->file('actor'), $actors);
        }

        DB::table('actors')->where('id', $actors_id)
        ->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'biography' => $request->biography,
            'birthday' => $request->birthday,
            'place_of_brith' => $request->place_of_brith,
            'image' => $request->file('actor')->getClientOriginalName(),
            'popularity' => $request->popularity
        ]);

        return redirect('actor-detail'.$actors_id);
    }
}
