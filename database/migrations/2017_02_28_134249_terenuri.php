<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Terenuri extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terenuri', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titlu_ro');
            $table->string('titlu_ru');
            $table->text('descrierea_ro');
            $table->text('descrierea_ru');
            $table->string('tip'); 

            $table->string('suprafata_terenului');
            $table->string('modul_de_folosinta');
			
			$table->string('apeduct')->nullable();
			$table->string('arteziana')->nullable();
			$table->string('retele_electrice')->nullable();
			$table->string('gaz')->nullable();
			$table->string('canalizare_locala')->nullable();
			$table->string('canalizare_centrala')->nullable();
			
            $table->string('sector');
            
            $table->integer('pret');
            $table->string('foto_1');
            $table->text('foto_2');
            $table->string('lat');
            $table->string('lng');
            $table->string('category')->default('terenuri');
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
        Schema::drop('terenuri');
    }
}
