<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_settings', function (Blueprint $table) {
            $table->id();
            $table->text('site_title')->nullable();
            $table->text('banner_title')->nullable();
            $table->text('banner_description')->nullable();
            $table->text('about_us')->nullable();
            $table->text('logo')->nullable();
            $table->text('icon')->nullable();
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
        Schema::dropIfExists('home_settings');
    }
}
