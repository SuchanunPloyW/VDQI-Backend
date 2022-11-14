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
        Schema::create('carform_db', function (Blueprint $table) {
            $table->increments('form_id');
            $table->string('person');
            $table->string('team');
            $table->string('branch');
            $table->string('car_chassis', 17);
            $table->integer('Topic_1',);
            $table->integer('Topic_2',);
            $table->integer('Topic_3', );
            $table->integer('Topic_4', );
            $table->integer('Topic_5', );
            $table->integer('Topic_6', );
            $table->integer('Topic_7', );
            $table->integer('Topic_8', );
            $table->integer('Topic_9', );
            $table->string('detail');
            $table->string('image');
            $table->date('date');
            $table->time('time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carform_db');
    }
};