<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CaseSiVile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_si_vile', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titlu_ro');
            $table->string('titlu_ru');
            $table->text('descrierea_ro');
            $table->text('descrierea_ru');
            $table->string('tip');
            $table->string('numar_de_camere');
            $table->string('numar_de_nivele');
            $table->string('tipul_cladirii');
            $table->integer('suprafata_totala');
            $table->integer('suprafata_terenului');
            $table->string('starea');
            $table->string('balcon');
            $table->string('bloc_sanitar');
            $table->string('sector');
            $table->integer('pret');
            $table->string('foto_1');
            $table->text('foto_2');
            $table->string('lat');
            $table->string('lng');
            $table->string('category')->default('case');
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
        Schema::drop('case_si_vile');
    }
}
