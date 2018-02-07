<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add2Case extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('case_si_vile', function($table) {
			$table->string('strada')->nullable();
			$table->string('nume_agent')->nullable();
			$table->string('mobil_agent')->nullable();
		});
		
		Schema::table('industriale', function($table) {
			$table->string('strada')->nullable();
			$table->string('nume_agent')->nullable();
			$table->string('mobil_agent')->nullable();
		});
		
		Schema::table('comerciale', function($table) {
			$table->string('strada')->nullable();
			$table->string('nume_agent')->nullable();
			$table->string('mobil_agent')->nullable();
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
