<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddApartamente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('apartamente', function($table) {
            $table->string('usi_de_interior_lemn')->nullable();
            $table->string('usi_de_interior_mdf')->nullable();
            $table->string('usi_de_interior_termopan')->nullable();
            $table->string('usi_de_interior_metal')->nullable();
            $table->string('usi_de_interior_extensibile')->nullable();
            
            $table->string('usi_de_exterior_lemn')->nullable();
            $table->string('usi_de_exterior_termopan')->nullable();
            $table->string('usi_de_exterior_metal')->nullable();
            $table->string('usi_de_exterior_bronate')->nullable();
            
            $table->string('tavane_extensibile')->nullable();
            $table->string('tavane_suspendate')->nullable();
            $table->string('tavane_tencuiala')->nullable();
            $table->string('tavane_lambriuri_din_pvc')->nullable();
            $table->string('tavane_gips_carton')->nullable();
            $table->string('tavane_placaj')->nullable();
            
            $table->string('ferestre_termopan')->nullable();
            $table->string('ferestre_lemn')->nullable();
            $table->string('ferestre_metal')->nullable();
            $table->string('ferestre_vitralii')->nullable();
            
            $table->string('acoperiri_gresie')->nullable();
            $table->string('acoperiri_parchet')->nullable();
            $table->string('acoperiri_linoleum')->nullable();
            $table->string('acoperiri_laminat')->nullable();
            $table->string('acoperiri_lemn')->nullable();
            $table->string('acoperiri_ciment')->nullable();
            $table->string('acoperiri_industriale')->nullable();
            $table->string('acoperiri_covor')->nullable();
            $table->string('acoperiri_epoxidice')->nullable();
            $table->string('acoperiri_elastice')->nullable();
            
            $table->string('peretii_interiori_tapete')->nullable();
            $table->string('peretii_interiori_tapete_decorative')->nullable();
            $table->string('peretii_interiori_gresie')->nullable();
            $table->string('peretii_interiori_lambriuri_din_lemn')->nullable();
            $table->string('peretii_interiori_lambriuri_din_pvc')->nullable();
            $table->string('peretii_interiori_tencuiala_decorativa')->nullable();
            $table->string('peretii_interiori_gips_carton')->nullable();
            $table->string('peretii_interiori_placaj')->nullable(); 
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
