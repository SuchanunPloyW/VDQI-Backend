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
        Schema::create('car_request', function (Blueprint $table) {
            $table->increments('req_id');
            $table->string('car_chassis' ,17);
            $table->string('fullname');
            $table->string('lastname');
            $table->string('req_date');
            $table->string('req_time');
            $table->string('car_position');
            $table->string('car_where');
            $table->string('req_status');
            $table->string('req_station');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_request');
    }
};
