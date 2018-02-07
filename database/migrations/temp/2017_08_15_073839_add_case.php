<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('case_si_vile', function($table) {
            $table->string('usi_de_interior_lemn')->nullable();
            $table->string('usi_de_interior_mdf')->nullable();
            $table->string('usi_de_interior_termopan')->nullable();
            $table->string('usi_de_interior_metal')->nullable();
            $table->string('usi_de_interior_extensibile')->nullable();
            
            $table->string('usi_de_exterior_lemn')->nullable();
			$table->string('usi_de_exterior_mdf')->nullable();
            $table->string('usi_de_exterior_termopan')->nullable();
            $table->string('usi_de_exterior_metal')->nullable();
            $table->string('usi_de_exterior_bronate')->nullable();
			$table->string('usi_de_exterior_culisante')->nullable();
            
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
			$table->string('peretii_interiori_glet')->nullable();
            $table->string('peretii_interiori_tencuiala_decorativa')->nullable();
            $table->string('peretii_interiori_gips_carton')->nullable();
            $table->string('peretii_interiori_placaj')->nullable(); 
			
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
		
		Schema::table('comerciale', function($table) {
            $table->string('usi_de_interior_lemn')->nullable();
            $table->string('usi_de_interior_mdf')->nullable();
            $table->string('usi_de_interior_termopan')->nullable();
            $table->string('usi_de_interior_metal')->nullable();
            $table->string('usi_de_interior_extensibile')->nullable();
            
            $table->string('usi_de_exterior_lemn')->nullable();
			$table->string('usi_de_exterior_mdf')->nullable();
            $table->string('usi_de_exterior_termopan')->nullable();
            $table->string('usi_de_exterior_metal')->nullable();
            $table->string('usi_de_exterior_bronate')->nullable();
			$table->string('usi_de_exterior_culisante')->nullable();
            
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
			$table->string('peretii_interiori_glet')->nullable();
            $table->string('peretii_interiori_tencuiala_decorativa')->nullable();
            $table->string('peretii_interiori_gips_carton')->nullable();
            $table->string('peretii_interiori_placaj')->nullable(); 
			
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
		
		Schema::table('industriale', function($table) {
            $table->string('usi_de_interior_lemn')->nullable();
            $table->string('usi_de_interior_mdf')->nullable();
            $table->string('usi_de_interior_termopan')->nullable();
            $table->string('usi_de_interior_metal')->nullable();
            $table->string('usi_de_interior_extensibile')->nullable();
            
            $table->string('usi_de_exterior_lemn')->nullable();
			$table->string('usi_de_exterior_mdf')->nullable();
            $table->string('usi_de_exterior_termopan')->nullable();
            $table->string('usi_de_exterior_metal')->nullable();
            $table->string('usi_de_exterior_bronate')->nullable();
			$table->string('usi_de_exterior_culisante')->nullable();
            
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
			$table->string('peretii_interiori_glet')->nullable();
            $table->string('peretii_interiori_tencuiala_decorativa')->nullable();
            $table->string('peretii_interiori_gips_carton')->nullable();
            $table->string('peretii_interiori_placaj')->nullable(); 
			
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
