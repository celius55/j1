<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add2Apartamente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('apartamente', function($table) {
            $table->string('podele_parchet')->nullable();
            $table->string('podele_gresie')->nullable();
            $table->string('podele_laminat')->nullable();
            $table->string('podele_linoleum')->nullable();
            
			$table->string('utilitati_electricitate')->nullable();
			$table->string('utilitati_apeduct')->nullable();
			$table->string('utilitati_gazificat')->nullable();
			$table->string('utilitati_climatizare')->nullable();
			$table->string('utilitati_acces_internet')->nullable();
			$table->string('utilitati_interfon')->nullable();
			$table->string('utilitati_ascensor')->nullable();
			$table->string('utilitati_supraveghere_video')->nullable();
			$table->string('utilitati_sistem_antiincendiar')->nullable();
			
			$table->string('incalzire_centralizata')->nullable();
			$table->string('incalzire_autonoma')->nullable();
			
			$table->text('vecinatati_ro')->nullable();
			$table->text('vecinatati_ru')->nullable();
			
			$table->text('alte_dotari_ro')->nullable();
			$table->text('alte_dotari_ru')->nullable();
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
