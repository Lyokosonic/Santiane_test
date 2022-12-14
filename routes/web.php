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
    $voyages_plane = DB::table('voyages')->where('type', 'plane')->orderBy('departure_date', 'asc')->get();
    $voyages_bus = DB::table('voyages')->where('type', 'bus')->orderBy('departure_date', 'asc')->get();
    $voyages_train = DB::table('voyages')->where('type', 'train')->orderBy('departure_date', 'asc')->get();
    return view('welcome')->with('voyages_plane', $voyages_plane)->with('voyages_bus', $voyages_bus)->with('voyages_train', $voyages_train);
});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

Route::post('home', function () {
    $travel = new App\Voyages;
    $travel->type = request('type');
    $travel->number = request('number');
    $travel->departure = request('departure');
    $travel->arrival = request('arrival');
    $travel->seat = request('seat');
    $travel->gate = request('gate');
    $travel->baggage_drop = request('baggage_drop');
    $travel->departure_date = request('departure_date');
    $travel->arrival_date = request('arrival_date');

    $travel->save();

    return redirect('/');
})->name('home');

