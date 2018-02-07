<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add3Apartamente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('apartamente', function($table) {
			$table->string('usi_de_exterior_mdf')->nullable();
			$table->string('usi_de_exterior_culisante')->nullable();
			$table->string('peretii_interiori_glet')->nullable();
			$table->string('peretii_exteriori_tencuiala_decorativa')->nullable();
			$table->string('peretii_exteriori_mozaic')->nullable();
			$table->string('peretii_exteriori_gresie')->nullable();
			$table->string('peretii_exteriori_lambriuri_din_pvc')->nullable();
			$table->string('peretii_exteriori_lambriuri_din_lemn')->nullable();
			$table->string('peretii_exteriori_ciment')->nullable();
			$table->string('peretii_exteriori_termoizolata_cu_vata_minerala')->nullable();
			$table->string('peretii_exteriori_termoizolata_cu_polistiren')->nullable();
			$table->string('peretii_exteriori_piatra_decorativa')->nullable();
			$table->string('peretii_exteriori_palacaj')->nullable();
			$table->string('peretii_exteriori_fatada_ventilata')->nullable();
			$table->string('peretii_exteriori_arhitectura_istorica')->nullable();
			
            $table->string('numar_apartament')->nullable();
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
