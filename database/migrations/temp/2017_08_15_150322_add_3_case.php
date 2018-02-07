<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add3Case extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('terenuri', function($table) {
			$table->string('strada')->nullable();
			$table->string('nume_agent')->nullable();
			$table->string('mobil_agent')->nullable();
			
			$table->text('minusuri')->nullable();
            $table->string('procent')->nullable();
            $table->string('nume_proprietar')->nullable();
            $table->string('data_nasterii_proprietar')->nullable();
            $table->string('telefon_proprietar')->nullable();
            $table->string('pret_minim')->nullable();
            $table->string('nume_cumparator')->nullable();
            $table->string('data_nasterii_cumparator')->nullable();
            $table->string('telefon_cumparator')->nullable();
		});
		
		Schema::table('garaje', function($table) {
			$table->string('strada')->nullable();
			$table->string('nume_agent')->nullable();
			$table->string('mobil_agent')->nullable();
			
			$table->text('minusuri')->nullable();
            $table->string('procent')->nullable();
            $table->string('nume_proprietar')->nullable();
            $table->string('data_nasterii_proprietar')->nullable();
            $table->string('telefon_proprietar')->nullable();
            $table->string('pret_minim')->nullable();
            $table->string('nume_cumparator')->nullable();
            $table->string('data_nasterii_cumparator')->nullable();
            $table->string('telefon_cumparator')->nullable();
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
