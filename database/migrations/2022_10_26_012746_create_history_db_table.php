<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_db', function (Blueprint $table) {
            $table->increments('his_id');
            $table->string('car_chassis');
            $table->integer('car_status');
            $table->integer('car_where');
            $table->string('fullname');
            $table->string('lastname');
            $table->string('date');
            $table->string('time');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history_db');
    }
};