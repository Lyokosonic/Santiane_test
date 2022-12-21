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
    $search_text = request('search');
    $voyages_plane = DB::table('voyages')
        ->where([
            ['type', 'plane'],
            ['departure', '' . $search_text . ''],
        ])
        ->orWhere([
            ['type', 'plane'],
            ['arrival', '' . $search_text . ''],
        ])
        ->orderBy('departure_date', 'asc')->get();
    $voyages_bus = DB::table('voyages')
        ->where([
            ['type', 'bus'],
            ['departure', '' . $search_text . ''],
        ])
        ->orWhere([
            ['type', 'bus'],
            ['arrival', '' . $search_text . ''],
        ])
        ->orderBy('departure_date', 'asc')->get();
    $voyages_train = DB::table('voyages')
        ->where([
            ['type', 'train'],
            ['departure', '' . $search_text . ''],
        ])
        ->orWhere([
            ['type', 'train'],
            ['arrival', '' . $search_text . ''],
        ])
        ->orderBy('departure_date', 'asc')->get();
    return view('welcome')->with('voyages_plane', $voyages_plane)->with('voyages_bus', $voyages_bus)->with('voyages_train', $voyages_train)->with('search_text', $search_text);
});



Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

Route::post('home', 'HomeController@create')->name('home');

