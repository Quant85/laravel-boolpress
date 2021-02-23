<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('posts', function (){
    //dammi un file json
    //restituiscimi una risposta in formato json
    return response()->json([
        //che cosa voglio mostrare
        'success' => true,
        'resources' => App\Post::all()
    ], 200);
});