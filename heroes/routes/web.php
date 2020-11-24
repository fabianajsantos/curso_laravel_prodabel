<?php

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

Route::get('/herois', "HeroiController@index");
Route::post('/herois', "HeroiController@index");
Route::get('/herois/teste', "HeroiController@teste");

Route::get('/herois/save', "HeroiController@save");
Route::post('/herois/save', "HeroiController@save");

