<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StepsAndVoyagesTest extends TestCase
{
    /**
     * Test pour vérifier que la création d'un voyage fonctionne correctement.
     *
     * @return void
     */
    public function testCreateVoyage()
    {
        $data = [
            'name' => 'Voyage test',
            'description' => 'Voyage de test',
            'steps' => [
                [
                    'type' => 'avion',
                    'transport_number' => '1234',
                    'departure_date' => '2022-01-01 10:00:00',
                    'arrival_date' => '2022-01-01 12:00:00',
                    'departure' => 'Paris',
                    'arrival' => 'Londres',
                    'seat' => '12A',
                    'gate' => '12',
                    'baggage_drop' => '123',
                ],
                [
                    'type' => 'train',
                    'transport_number' => '5678',
                    'departure_date' => '2022-01-01 14:00:00',
                    'arrival_date' => '2022-01-01 16:00:00',
                    'departure' => 'Londres',
                    'arrival' => 'Edimbourg',
                    'seat' => '34B',
                    'gate' => '34',
                    'baggage_drop' => '456',
                ],
            ],
        ];

        $response = $this->post('home', $data);

        $response->assertStatus(302);
    }
}
