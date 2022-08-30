<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


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
    // event(new \App\Events\playground("suck"));
    return view('welcome');
});

Route::get('/test', function () {
    event(new \App\Events\NewTrade("cum"));
    return response()->json(['message' => 'Successful'], 200);
});

Route::get('/testing', function () {
    // event(new \App\Events\playground("cum"));
    return view('test');
});
