<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WatchlistController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('/', function () {
//     return view('logIn');
// });
Route::get('/', [AuthController::class, 'loginPage']);
Route::post('/', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/register', [AuthController::class, 'registerPage']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/home', [HomeController::class, 'home']);
Route::get('/search', [HomeController::class, 'search']);
Route::get('/latest', [HomeController::class, 'latest']);
Route::get('/asc', [HomeController::class, 'asc']);
Route::get('/desc', [HomeController::class, 'desc']);

Route::get('/insert-movie', [MovieController::class, 'insertMoviePage'])
->middleware('admin');
Route::post('/insert-movie', [MovieController::class, 'insertMovie'])
->middleware('admin');
Route::get('/edit-movie/{id}', [MovieController::class, 'editMoviePage'])
->middleware('admin');
Route::post('/edit-movie/{id}', [MovieController::class, 'editMovie'])
->middleware('admin');
Route::get('/movie/{id}', [MovieController::class, 'detailMovie']);
Route::get('/movie', [MovieController::class, 'moviePage']);
Route::delete('/movie/{id}', [MovieController::class, 'deleteMovie']);

Route::get('/actor', [ActorController::class, 'actor']);
Route::get('/actor/{id}', [ActorController::class, 'detailActor'])->middleware('admin');
Route::get('/insert-actor', [ActorController::class, 'insertActorPage'])->middleware('admin');
Route::post('/insert-actor', [ActorController::class, 'insertActor'])->middleware('admin');
Route::get('/edit-actor/{id}', [ActorController::class, 'editActorPage'])->middleware('admin');
Route::post('/edit-actor/{id}', [ActorController::class, 'editActor'])->middleware('admin');
Route::delete('/actor/{id}', [ActorController::class, 'deleteActor'])->middleware('admin');

Route::get('/profile', [UserController::class, 'profilePage'])
->middleware('user');
Route::post('/profile', [UserController::class, 'profile'])
->middleware('user');
Route::post('/modal', [UserController::class, 'modal'])
->middleware('user');

Route::get('/watchlist', [WatchlistController::class, 'watchlistPage'])
->middleware('user');
Route::get('/search', [WatchlistController::class, 'search'])
->middleware('user');
Route::get('/filter', [WatchlistController::class, 'latest'])
->middleware('user');
Route::post('/modalWa', [WatchlistController::class, 'modal'])
->middleware('user');
Route::get('/addWathclist', [WatchlistController::class, 'addWathclist'])
->middleware('user');
