<?php

use Illuminate\Http\Request;
use App\Http\Controllers\atc;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\RouteRegistrar;
use Database\Seeders\atc as SeedersAtc;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\friendsController;
use App\Http\Controllers\PasswordController;

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

Route::get('/login',  function () {
    return view('login');
});

Route::post('/login', [LoginController::class, 'authenticate'], function (Request $request) {
    $token = $request->session()->token();
    $tokencsrf = csrf_token();

    if($token != $tokencsrf){
        return redirect()->intended('login');
    }
    
    return view('dashboard');
});

Route::post('/creat_users', [LoginController::class, 'register'], function (Request $request) {
    $token = $request->session()->token();
    $tokencsrf = csrf_token();

    if($token != $tokencsrf){
        return redirect()->intended('login');
    }

    return view('login');
});

Route::get('/logout', [LoginController::class, "logout"], function () {
    return view('login');
});


Route::get('/dashboard', function () {
    $data = Session::all();
    return view('dashboard', ['data' => $data]);
})->middleware('auth.basic');

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

Route::prefix("auth")->group(function () {
    route::get('login', [LoginController::class, 'login']);
    route::get('logout', [LoginController::class, 'logout']);
    route::get('register', [LoginController::class, 'register']);
});



// route pour la protection return 404 si pas connecté
