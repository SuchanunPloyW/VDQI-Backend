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
        Schema::create('car', function (Blueprint $table) {
            $table->increments('car_id');
            $table->string('car_chassis' ,17);
            $table->string('car_status')->default('STOCK');
            $table->string('car_where');
            $table->string('car_position');
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
        Schema::dropIfExists('car');
    }
};
