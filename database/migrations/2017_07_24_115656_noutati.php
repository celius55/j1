<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Noutati extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informatii_utile', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titlu_ro')->nullable();
            $table->string('titlu_ru')->nullable();
            $table->string('img')->nullable();
            $table->text('descrierea_ro')->nullable();
            $table->text('descrierea_ru')->nullable();
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
        //
    }
}
