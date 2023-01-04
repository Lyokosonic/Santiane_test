<?php

namespace Tests\Unit;

use Tests\TestCase;
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
        $response = $this->post('home', [
            'name' => 'Voyage de test',
            'description' => 'Ceci est un voyage de test',
            'steps' => [
                [
                    'type' => 'Avion',
                    'transport_number' => '12345',
                    'departure_date' => '2022-01-01T08:00',
                    'arrival_date' => '2022-01-01T10:00',
                    'departure' => 'Paris',
                    'arrival' => 'Londres',
                ],
                [
                    'type' => 'Train',
                    'transport_number' => '54321',
                    'departure_date' => '2022-01-02T10:00',
                    'arrival_date' => '2022-01-02T12:00',
                    'departure' => 'Londres',
                    'arrival' => 'Paris',
                ],
            ],
        ]);

        $response->assertRedirect();

        $response->assertStatus(302);
    }

    /** @test */
    public function a_voyage_cannot_be_created_if_two_steps_have_the_same_departure_or_arrival_city()
    {
        $response = $this->post('home', [
            'name' => 'Voyage de test',
            'description' => 'Ceci est un voyage de test',
            'steps' => [
                [
                    'type' => 'Flight',
                    'transport_number' => 'AF1154',
                    'departure_date' => '2022-06-20 13:00:00',
                    'arrival_date' => '2022-06-20 14:30:00',
                    'departure' => 'Paris',
                    'arrival' => 'Marseille',
                    'seat' => '15A',
                    'gate' => 'B45',
                    'baggage_drop' => '3',
                ],
                [
                    'type' => 'Flight',
                    'transport_number' => 'AF1155',
                    'departure_date' => '2022-06-21 16:00:00',
                    'arrival_date' => '2022-06-21 17:30:00',
                    'departure' => 'Marseille',
                    'arrival' => 'Paris',
                    'seat' => '15A',
                    'gate' => 'B45',
                    'baggage_drop' => '3',
                ],
            ],
        ]);
        $this->assertDatabaseMissing('voyages', ['name' => 'My trip']);
        $this->assertDatabaseMissing('steps', ['transport_number' => 'AF1154']);
        $this->assertDatabaseMissing('steps', ['transport_number' => 'AF1155']);
    }
}
