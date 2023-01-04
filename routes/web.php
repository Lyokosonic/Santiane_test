<?php

use Illuminate\Http\Request;
use App\Voyage;

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

Route::get('/', function (Request $request) {
    $voyages = Voyage::with(['steps' => function($query) {
        $query->orderBy('departure_date', 'asc');
    }])->get();
    return view('welcome', compact('voyages'));
});



Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

Route::post('home', 'HomeController@create')->name('home');

