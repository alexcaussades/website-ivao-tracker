<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\atc;

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

Route::get('/atc/add/{vid}', [atc::class, 'store']);
Route::get('/atc/view/{vid}', [atc::class, 'show']);
Route::get('/atc/delete/{vid}/{id}', [atc::class, 'delect']);