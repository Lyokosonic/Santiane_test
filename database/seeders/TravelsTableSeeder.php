<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Voyage;
use App\Models\Steps;

class TravelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Création d'un voyage
        $voyage = new Voyage;
        $voyage->name = 'Voyage vers Poudlard';
        $voyage->description = 'Voyage de démonstration avec plusieurs étapes';
        $voyage->save();

        // Ajout d'étapes au voyage
        $etapes = [
            [
                'type' => 'bus',
                'number' => 'B1',
                'departure_date' => '2022-01-01 08:00:00',
                'arrival_date' => '2022-01-01 10:00:00',
                "departure" => "Grasse",
                "arrival" => "Cannes",
                "seat" => null,
            ],
            [
                'type' => 'train',
                'number' => 'TER-A',
                'departure_date' => '2022-01-01 12:00:00',
                'arrival_date' => '2022-01-01 14:00:00',
                "departure" => "Cannes",
                "arrival" => "Nice Riquier",
                "seat" => null,
            ],
            [
                'type' => 'bus',
                'number' => 'TER-A',
                'departure_date' => '2022-01-01 14:30:00',
                'arrival_date' => '2022-01-01 15:00:00',
                "departure" => "Nice Riquier",
                "arrival" => "Nice",
                "seat" => null,
            ],
            [
                'type' => 'plane',
                'number' => 'P455',
                'departure_date' => '2022-01-01 17:00:00',
                'arrival_date' => '2022-01-01 21:00:00',
                "departure" => "Nice",
                "arrival" => "Paris",
                "seat" => "3A",
                "gate" => "45B",
                "baggage_drop" => null,
            ],
            [
                'type' => 'plane',
                'number' => 'P42',
                'departure_date' => '2022-01-01 22:00:00',
                'arrival_date' => '2022-01-01 22:30:00',
                "departure" => "Paris",
                "arrival" => "Londres",
                "seat" => "96B",
                "gate" => "12",
                "baggage_drop" => "123",
            ],
            [
                'type' => 'train',
                'number' => 'T9 3/4',
                'departure_date' => '2022-01-02 07:00:00',
                'arrival_date' => '2022-01-02 08:30:00',
                "departure" => "Londres",
                "arrival" => "Hogwarts Castle",
                "seat" => "6",
            ],
        ];

        foreach ($etapes as $etape) {
            $step = new Steps;
            $step->type = $etape['type'];
            $step->transport_number = $etape['number'];
            $step->departure_date = $etape['departure_date'];
            $step->arrival_date = $etape['arrival_date'];
            $step->departure = $etape['departure'];
            $step->arrival = $etape['arrival'];
            $step->seat = $etape['seat'];
            if (isset($etape['gate'])) {
                $step->gate = $etape['gate'];
            } else {
                $step->gate = null;
            }
            if (isset($etape['baggage_drop'])) {
                $step->baggage_drop = $etape['baggage_drop'];
            } else {
                $step->baggage_drop = null;
            }
            $step->voyage_id = $voyage->id;
            $step->save();
        }
    }
}
