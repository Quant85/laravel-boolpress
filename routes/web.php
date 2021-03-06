<?php

use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('pages.home');
});


Route::get('blog','PageController@post_list');

Route::resource('panel', 'PostController');

Route::resource('category', 'CategoryController');

Route::resource('tag', 'TagController');

/* ---------------------------- search ------------------------- */
Route::post('/search','PostController@search')->name('search');