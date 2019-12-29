<?php

use Illuminate\Http\Request;

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

//list entries

Route::get('entries', 'EntryController@index');

// list Single Entry
Route::get('entry{id}', 'EntryController@show');

// Create Entry
Route::post('entry', 'EntryController@store');

// Update Article
Route::put('entries', 'EntryController@index');

// Delete Article
Route::delete('entries', 'EntryController@destroy');
