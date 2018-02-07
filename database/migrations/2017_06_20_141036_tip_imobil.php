<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TipImobil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tip_imobil', function (Blueprint $table) {
            $table->increments('id');

            $table->string('tip')->nullable();
            $table->string('numar_imobile_total')->nullable();
            $table->string('numar_imobile_disponibile')->nullable();
            $table->string('numar_de_camere')->nullable();
            $table->string('suprafata')->nullable();
            $table->string('pret_vinzare')->nullable();
            $table->string('pret_inchiriere')->nullable();
            $table->text('nota')->nullable();
            $table->string('complexul_rezidential')->nullable();
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
