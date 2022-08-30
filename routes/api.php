<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Http;




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Broadcast::routes(['middleware' => ['auth:sanctum']]);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/messageWebhook', function (Request $request) {
    event(new \App\Events\NewTrade($request->message));
    return response()->json(['message' => $request->all()], 200);
});

Route::post('/messageWebhook1', function (Request $request) { //making external request NB won't work making request to itself
    $url = 'http://127.0.0.1:8000/api/ade';
    $response = Http::post($url);
    event(new \App\Events\NewTrade($response['message']));
    return response()->json(['message' => $request->all(), 'test' => $response['message']], 200);
});
