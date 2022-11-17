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
        Schema::create('evaluation_db', function (Blueprint $table) {
            $table->id('evaluation_id');
            $table->string('person');
            $table->string('team');
            $table->string('car_chassis');
            $table->string('branch');
            $table->integer('topic_1');
            $table->integer('topic_2');
            $table->integer('topic_3');
            $table->integer('topic_4');
            $table->integer('topic_5');
            $table->integer('topic_6');
            $table->integer('topic_7');
            $table->integer('topic_8');
            $table->integer('topic_9');
            $table->string('detail')->nullable();
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
        Schema::dropIfExists('evaluation_db');
    }
};