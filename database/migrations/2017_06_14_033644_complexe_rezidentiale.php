<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ComplexeRezidentiale extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complexe_rezidentiale', function (Blueprint $table) {
            $table->increments('id');

            $table->string('titlu_ro')->nullable();
            $table->string('titlu_ru')->nullable();
            $table->text('descrierea_ro')->nullable();
            $table->text('descrierea_ru')->nullable();
            $table->string('zona')->nullable();
            $table->string('tip_imobile')->nullable();
            $table->string('stadiu')->nullable();
            $table->string('dezvoltator')->nullable();

            $table->string('foto_1')->nullable();
            $table->text('foto_2')->nullable();
            $table->text('schite')->nullable();

            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
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
