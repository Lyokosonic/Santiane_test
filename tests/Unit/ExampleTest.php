<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->post('home', [
            'type'    => 'bus',
            'number'  => '123456789',
            'departure'    => 'Cannes',
            'arrival'   => 'Antibes',
            'departure_date'   => '2022-12-30 20:00:00',
            'arrival_date'   => '2022-12-30 20:30:00',
        ]);
        $response->assertStatus(302);
    }
}
