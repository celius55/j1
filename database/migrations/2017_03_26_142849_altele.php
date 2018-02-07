<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Altele extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('altele', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titlu_ro');
            $table->string('titlu_ru');
            $table->text('descrierea_ro');
            $table->text('descrierea_ru');
            $table->string('tip');

            $table->integer('suprafata_totala');
            $table->string('starea');
            $table->string('sector');
            
            $table->integer('pret');
            $table->string('foto_1');
            $table->string('foto_2');
            $table->string('foto_3');
            $table->string('foto_4');
            $table->string('foto_5');
            $table->string('foto_6');
            $table->string('foto_7');
            $table->string('foto_8');
            $table->string('foto_9');
            $table->string('foto_10');
            $table->string('foto_11');
            $table->string('foto_12');
            $table->string('foto_13');
            $table->string('foto_14');
            $table->string('foto_15');
            $table->string('lat');
            $table->string('lng');
            $table->string('category')->default('altele');
            $table->string('localitate');
            $table->string('locuinte_noi');
            $table->string('ofertele_noastre');
            $table->string('video');
            $table->string('publicat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('altele');
    }
}
