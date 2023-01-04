<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Voyage;
use App\Steps;
use Validator;

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

    public function create(Request $request)
    {

        $name = htmlspecialchars($request->input('name'));
        $description = htmlspecialchars($request->input('description'));
        $steps = $request->input('steps');

        // Validation des données, etc.

        // Vérifie si il y a deux étapes qui ont la même ville de départ ou d'arrivée
        $departures = [];
        $arrivals = [];
        foreach ($steps as $step) {
            $departures[] = $step['departure'];
            $arrivals[] = $step['arrival'];
        }
        if (count(array_unique($departures)) != count($departures) || count(array_unique($arrivals)) != count($arrivals)) {
            return redirect()->back()->with('errors', 'Il ne faut pas passer deux fois dans la même ville !');
        }

        $voyage = Voyage::create(['name' => $name, 'description' => $description]);

        foreach ($steps as $step) {
            Steps::create([
                'voyage_id' => $voyage->id,
                'type' => htmlspecialchars($step['type']),
                'transport_number' => htmlspecialchars($step['transport_number']),
                'departure_date' => $step['departure_date'],
                'arrival_date' => $step['arrival_date'],
                'departure' => htmlspecialchars($step['departure']),
                'arrival' => htmlspecialchars($step['arrival']),
                'seat' => htmlspecialchars($step['seat']),
                'gate' => htmlspecialchars($step['gate']),
                'baggage_drop' => htmlspecialchars($step['baggage_drop']),
            ]);
        }

        return redirect()->back()->with('success', 'Le voyage a été créé avec succès !');
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
