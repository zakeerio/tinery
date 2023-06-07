<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItinerariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itineraries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->text('excerpt')->nullable();
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->string('seo_image')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->string('categories')->nullable();
            $table->string('tags')->nullable();
            $table->string('address_street')->nullable();
            $table->string('address_street_line1')->nullable();
            $table->string('address_city')->nullable();
            $table->string('address_state')->nullable();
            $table->string('address_zipcode')->nullable();
            $table->string('address_country')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('phone')->nullable();
            $table->string('website')->nullable();
            $table->text('additional_info')->nullable();
            $table->text('activities_data')->nullable();
            $table->enum('featured', [0, 1])->default(0);
            $table->enum('visibility', ['public', 'private'])->default('public');
            $table->enum('status', ['published', 'draft'])->default('published');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('duration')->default(0);
            $table->string('itinerary_status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itineraries');
    }
}
