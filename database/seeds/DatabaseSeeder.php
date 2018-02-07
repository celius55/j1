<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(apartamente::class);
        $this->call(case_si_vile::class);
        $this->call(comerciale::class);
        $this->call(industriale::class);
        $this->call(terenuri::class);
        $this->call(garaje::class);
    }
}
