<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('steps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('voyage_id');
            $table->string('type');
            $table->string('transport_number');
            $table->dateTime('departure_date');
            $table->dateTime('arrival_date');
            $table->string('departure');
            $table->string('arrival');
            $table->string('seat')->nullable();
            $table->string('gate')->nullable();
            $table->string('baggage_drop')->nullable();
            $table->timestamps();

            $table->foreign('voyage_id')->references('id')->on('voyages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('steps');
    }
}
