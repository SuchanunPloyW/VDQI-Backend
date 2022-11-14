<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('car_db', function (Blueprint $table) {
            $table->increments('car_id');
            $table->string('car_chassis', 17);
            $table->integer('posit_id');
            $table->string('car_status');
            $table->string('fullname');
            $table->string('lastname');
            $table->string('date');
            $table->string('time');
            $table->string('sort');
        });
    }


    public function down()
    {
        Schema::dropIfExists('car_db');
    }
};