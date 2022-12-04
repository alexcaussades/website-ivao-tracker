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
use App\Http\Controllers\gestion_adminController;
use App\Http\Controllers\PasswordController;

use function Termwind\render;

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
    $data = [
        "name" => "Login the website",
        "description" => "Login page the website in AlexCaussades website",
    ];
    if (Auth()->user()) {
        return redirect()->intended('dashboard');
    } else {
        return view('login', ['data' => $data]);
    }

    return view('login', ["data" => $data]);
});

Route::post('/login', [LoginController::class, 'authenticate'], function (Request $request) {
    $token = $request->session()->token();
    $tokencsrf = csrf_token();

    if ($token != $tokencsrf) {
        return redirect()->intended('login');
    }

    return view('dashboard');
});

Route::get('/register', function () {
    $data = [
        "name" => "Registered the website",
        "description" => "register page the website for the user to register in AlexCaussades website",
    ];
    return view('register', ['data' => $data]);
});

Route::post('/creat_users', [LoginController::class, 'register'], function (Request $request) {
    $token = $request->session()->token();
    $tokencsrf = csrf_token();

    if ($token != $tokencsrf) {
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

Route::prefix('admin')->group(function () {
    Route::get('/gestion_adminstrateurs', [gestion_adminController::class, 'index'], function () {
        $data = Session::all();
        if ($data['admin'] == 2) {
            return view('gestion_adminstrateurs', gestion_adminController::class, 'index');
        }
        return abort(401);
    })->middleware('auth.basic');

    // route get gestion admin avec id
    Route::get('/gestion_adminstrateurs_users', [gestion_adminController::class, 'get_id'], function (Request $request) {
        $data = Session::all();
        if ($data['admin'] == 2) {
            return view('gestion_adminstrateurs_users', gestion_adminController::class, 'get_id');
        }
        return abort(401);
    })->middleware('auth.basic');

    Route::post('/gestion_adm_rm', [gestion_adminController::class, "update_admins"], function (Request $request) {
        $token = $request->session()->token();
        $tokencsrf = csrf_token();
        if ($token != $tokencsrf) {
            return redirect()->intended('login');
        }
        
        return view('gestion_adm_rm', [gestion_adminController::class, "update_admins"]);
    })->middleware('auth.basic');
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
