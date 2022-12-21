<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Voyages extends TestCase
{
    /**
     * create_new_travel
     *
     * @return void
     */
    public function create_new_travel()
    {
        $response = $this->post('home', [
            'type'    => 'bus',
            'number'  => '123456789',
            'departure'    => 'Cannes',
            'arrival'   => 'Antibes',
            'departure_date'   => '2022-12-30 20:00:00',
            'arrival_date'   => '2022-12-30 20:30:00',
        ]);
        $response->assertStatus(200);
    }

    /**
     * get_travel
     *
     * @return void
     */
    public function get_travel()
    {


        /*global $voyages_plane;

        $voyages_plane->assertStatus();*/
    }
}
