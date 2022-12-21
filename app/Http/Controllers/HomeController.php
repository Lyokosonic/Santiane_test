<?php

namespace App\Http\Controllers;

use App\Voyages;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $travel = new \App\Voyages;
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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
}
