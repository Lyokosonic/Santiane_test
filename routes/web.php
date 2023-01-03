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

    $departureLocation = $request->query('departure_location');
    $arrivalLocation = $request->query('arrival_location');

    var_dump($departureLocation);
    var_dump($arrivalLocation);

    if (isset($departureLocation))
    {
        if (isset($arrivalLocation))
        {
            $voyages = Voyage::with(['steps' => function($query) {
                $query->orderBy('departure_date', 'asc');
            }])->whereHas('steps', function($query) use ($departureLocation, $arrivalLocation) {
                $query->where('departure', 'like', '%' . $departureLocation . '%')
                    ->where('arrival', 'like', '%' . $arrivalLocation . '%');
            })->get();

            var_dump($voyages);
        } else {
            $voyages = Voyage::with(['steps' => function($query) {
                $query->orderBy('departure_date', 'asc');
            }])->get();
        }
    } else {
        $voyages = Voyage::with(['steps' => function($query) {
            $query->orderBy('departure_date', 'asc');
        }])->get();
    }
    return view('welcome', compact('voyages'));
});



Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

Route::post('home', 'HomeController@create')->name('home');

