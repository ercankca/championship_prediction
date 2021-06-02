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

Route::get('/', 'MainController@getStarting');
Route::get('/reset-all', 'MainController@resetAll');
Route::get('/standings', 'MainController@getStandings');
Route::get('/fixtures', 'MainController@getFixtures');


Route::get('/prediction', 'PredictionController@getPrediction');


Route::get('/play-all-weeks', 'SimulatorController@playAllWeeks');
Route::get('/play-week/{weekId}', 'SimulatorController@playWeekly');


