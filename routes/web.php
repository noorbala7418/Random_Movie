<?php

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

Route::get('/', [
    'uses' => 'MovieController@index',
    'as' => 'list',
]);

Route::post('/',[
    'uses' => 'MovieController@new',
    'as' => 'new',
]);

Route::delete('/{id}',[
    'uses' => 'MovieController@remove',
    'as' => 'remove',
]);

Route::get('/random',[
    'uses' => 'MovieController@random',
    'as' => 'random',
]);

