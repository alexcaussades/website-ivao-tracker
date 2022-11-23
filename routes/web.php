<?php

use App\Http\Controllers\atc;
use Illuminate\Support\Facades\Route;
use Database\Seeders\atc as SeedersAtc;
use App\Http\Controllers\friendsController;
use Illuminate\Routing\RouteRegistrar;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('atc')->group(function () {
    route::get('/', [atc::class, 'index']);
    route::get('view/{vid}', [atc::class, 'show']);
    route::get('add/{vid}', [atc::class, 'store']);
    route::get('delete/{vid}/{id}', [atc::class, 'delect']);
});

Route::prefix('friends')->group(function () {
    route::get('add/{vid}/{vid_friend}', [friendsController::class, 'addFriends']);
    route::get('remove/{vid}/{vid_friend}', [friendsController::class, 'removeFriends']);
    route::get('get/{vid}', [friendsController::class, 'getFriends']);
});

// route pour la protection return 404 si pas connecté
