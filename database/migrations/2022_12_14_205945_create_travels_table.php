<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voyages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->string('number');
            $table->string('departure');
            $table->string('arrival');
            $table->string('seat')->nullable();
            $table->string('gate');
            $table->string('baggage_drop');
            $table->Datetime('departure_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->Datetime('arrival_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voyages');
    }
}
