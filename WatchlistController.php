<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\WatchList;
use App\Models\WatchListItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WatchlistController extends Controller
{
    //
    public function watchlistPage(){
        $watchlistitems = DB::table('watchlist_item')->get();
        $movies = DB::table('movies')->get();
        return view('watchlist', ['watchlistitems' => $watchlistitems,
                                              'movies' => $movies]);
    }

    public function searchWa(Request $request) {
        $watchlistitems = DB::table('movies')
        ->where('title', 'like', "%$request->search%")->simplePaginate(4);
        $movies = DB::table('movies')->get();
        return view('home')->with(['watchlistitems' => $watchlistitems,
                                            'movies' => $movies]);
    }

    public function all(){
        $watchlistitems = DB::table('watchlist_item')->simplePaginate(4);
        $movies = DB::table('movies')->get();
        return view('watchlist', ['watchlistitems' => $watchlistitems,
                                              'movies' => $movies]);
    }

    public function filter(Request $request){
        $watchlistitems = DB::table('movies')->join('watchlist', 'movie_id', '=', 'movies.id')
        ->where([['user_id', Auth::user()->id],
                         ['status', $request->filter]])->simplePaginate(4);
        $movies = DB::table('movies')->get();
        return view('watchlist', ['watchlistitems' => $watchlistitems,
                                              'movies' => $movies]);
    }

    public function modal(Request $request, $id){
        DB::table('watchlist_item')->where([['user_id', Auth::user()->id],
                                                           ['movies_id', $id]])
        ->update(['status' => $request->status]);

        return redirect('watchlist');
    }

    public function addWathclist($id){
        $users_id = Auth::user()->id;
        $watchlist = WatchList::where('users_id', $users_id)->where('active', TRUE)->first();

        if($watchlist == NULL){
            DB::table('watchlist')->insert([
                'users_id' => $users_id,
                'active' => TRUE
            ]);
            $watchlist = WatchList::where('users_id', $users_id)->where('active', TRUE)->first();
        }

        $watchlistitems = WatchListItem::where('movies_id', $id)->where('active', TRUE)->first();

        DB::table('watchlist_items')->insert([
            'watchlist_id' => $watchlist->id,
            'movies_id' => $id
        ]);

        return view('watchlist');
    }

}
