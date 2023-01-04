<?php

namespace App\Http\Controllers;

use App\Models\Steps;
use App\Models\Voyage;
use Illuminate\Http\Request;

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

        // Validation des données
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'steps' => 'required|array',
            'steps.*.type' => 'required|max:255',
            'steps.*.transport_number' => 'required|max:255',
            'steps.*.departure_date' => 'required|date',
            'steps.*.arrival_date' => 'required|date',
            'steps.*.departure' => 'required|max:255',
            'steps.*.arrival' => 'required|max:255',
            'steps.*.seat' => 'nullable|max:255',
            'steps.*.gate' => 'nullable|max:255',
            'steps.*.baggage_drop' => 'nullable|max:255',
        ]);

        // Vérifie si il y a deux étapes qui ont la même ville de départ ou d'arrivée
        $departures = [];
        $arrivals = [];
        foreach ($request->input('steps') as $step) {
            $departures[] = $step['departure'];
            $arrivals[] = $step['arrival'];
        }
        if (count(array_unique($departures)) != count($departures) || count(array_unique($arrivals)) != count($arrivals)) {
            return redirect()->back()->with('errors', 'Il ne faut pas passer deux fois dans la même ville !');
        }

        $voyage = Voyage::create([
            'name' => htmlspecialchars($request->input('name')),
            'description' => htmlspecialchars($request->input('description')),
        ]);

        Steps::insert(array_map(function ($step) use ($voyage) {
            return [
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
            ];
        }, $request->input('steps')));

        // Stockage du message de succès dans la session
        session()->flash('success', 'Le voyage a été créé avec succès !');

        // Redirection vers la page précédente
        return redirect()->back();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
