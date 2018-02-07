<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExclusiv extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('apartamente', function($table) {
          $table->string('exclusiv')->nullable();
        });
        Schema::table('case_si_vile', function($table) {
          $table->string('exclusiv')->nullable();
        });
        Schema::table('comerciale', function($table) {
          $table->string('exclusiv')->nullable();
        });
        Schema::table('industriale', function($table) {
          $table->string('exclusiv')->nullable();
        });
        Schema::table('terenuri', function($table) {
          $table->string('exclusiv')->nullable();
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
