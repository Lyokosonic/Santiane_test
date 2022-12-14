<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('voyages')->insert([
            [
                'type' => 'plane',
                'number' => 'SK22',
                'departure' => 'Stockholm',
                'arrival' => 'New York JFK',
                'seat' => '7B',
                'gate' => '22',
                'baggage_drop' => '22',
            ],
            [
                'type' => 'plane',
                'number' => 'SK455',
                'departure' => 'Gerona Airport',
                'arrival' => 'Stockholm',
                'seat' => '3A',
                'gate' => '45B',
                'baggage_drop' => '344',
            ],
        ]);
    }
}
