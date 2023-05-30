<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItineraryActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itinerary_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('itineraries_id')->references('id')->on('itineraries');
            $table->foreignId('days_id')->references('id')->on('itinerary_days');
            $table->string('tempid')->nullable();
            $table->string('title')->nullable();
            $table->string('starttime')->nullable();
            $table->string('endtime')->nullable();
            $table->longtext('description')->nullable();
            $table->string('location')->nullable();
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
        Schema::dropIfExists('itinerary_activities');
    }
}
