<?php

use Illuminate\Database\Seeder;

class apartamente extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$descrierea = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur hendrerit sit amet dolor non tempor. Quisque ut magna eu neque lobortis porta. Praesent porttitor facilisis eros nec commodo. Nulla pretium purus non purus aliquam imperdiet. Vivamus semper a dui placerat euismod. Donec tempor suscipit augue eu ullamcorper. Cras et bibendum elit.
			Nam molestie magna eu fringilla condimentum. Sed mattis sem elit, sit amet dignissim dolor volutpat id. Sed sed suscipit leo. Sed quis ornare mi. Curabitur vulputate a lorem in euismod. Curabitur sagittis purus ac elit molestie, id vehicula justo hendrerit. Duis tempor bibendum mattis. Nam rutrum aliquet nunc, nec dignissim nulla ultricies ac. Vivamus ut felis dapibus, dapibus mauris id, euismod lorem. Pellentesque in dolor nisl. Praesent rhoncus molestie nisl nec finibus. Integer sed laoreet enim.
			Mauris suscipit arcu sed pretium finibus. Mauris bibendum congue purus non blandit. Nulla ut malesuada leo, in sollicitudin augue. Ut sit amet lorem et lorem convallis feugiat. Nulla sollicitudin consequat metus, ultrices auctor dolor. Maecenas molestie, quam vel gravida viverra, enim orci mollis diam, et tempus ante augue mollis enim. Curabitur sodales leo non mauris pharetra venenatis. Sed luctus posuere libero. Etiam laoreet, quam eu dictum elementum, felis leo pharetra dui, vitae interdum quam eros non ante. Aliquam vitae hendrerit augue, eget egestas velit. Morbi in lorem et nunc dictum dignissim imperdiet ut dolor. Sed malesuada placerat quam, eu ultrices eros feugiat interdum. Sed rutrum ornare pulvinar.
			Phasellus malesuada ligula tellus, non ullamcorper nisl ultrices a. Donec fringilla ut lacus et maximus. Donec non justo ornare, scelerisque ligula in, finibus purus. Suspendisse feugiat elementum augue nec fringilla. Proin ornare ac turpis quis ultrices. Aenean enim ex, vulputate eu quam in, sodales porttitor sem. Aliquam vitae libero dolor. Vivamus eu nunc accumsan, blandit tellus ac, blandit lorem. Nulla vitae mi neque.
			Pellentesque semper elit est, quis luctus justo bibendum sed. Morbi venenatis mi at est vestibulum fringilla. In hac habitasse platea dictumst. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse ut commodo erat. Aliquam luctus sapien quis libero vulputate, eget laoreet tortor mollis. Sed sagittis leo sed dolor dapibus dapibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis ipsum felis, convallis ac aliquam eleifend, egestas ut justo. Aliquam faucibus consequat nunc, ut pharetra odio aliquet id. Curabitur finibus laoreet est, sit amet sollicitudin turpis scelerisque nec.';
		$tip = array(
			'Vînzare',
			'Arendă'
		);
		$tipul_cladirii = array(
			'Beton',
			'Beton celular',
			'Blocuri',
			'Cărămidă',
			'Combinat',
			'Cotileț',
			'Lemn',
			'Monolit',
			'Panouri'
		);
		$planul_cladirii = array(
			'102',
			'135',
			'143',
			'Ap. "Gostinca"',
			'Brj (Brejnevka)',
			'Cămin familial',
			'Cș (Ceșka)',
			'Hrușciovka',
			'Individuală',
			'Ms (serie moldovenească)',
			'Pe pămînt',
			'Rubașka',
			'St (Stalinka)',
			'Varț (Varnițkaia)'
		);
		$starea = array(
			'Reparație simplă',
			'Necesită reparație',
			'Euroreparație'
		);
		$balcon = array(
			'1',
			'2',
			'3',
			'4 și mai multe',
			'nu'
		);
		$baie = array(
			'1',
			'2',
			'3',
			'4 și mai multe',
			'nu'
		);
		$parcare = array(
			'Deschis',
			'Garaj',
			'Sub acoperiș',
			'Subterană'
		);
		$sector = array(
			'Botanica',
			'Rîșcani',
			'Buiucani',
			'Ciocana',
			'Telecentru'
		);

		for ($i=0; $i<50; $i++)
		{
	        DB::table('apartamente')->insert([
	        	// 'titlu' => 'apartament '.rand(1, 100),
	        	// 'descrierea' => $descrierea,
	        	'tip' => $tip[array_rand($tip)],
	        	'numar_de_camere' => rand(1, 4),
	        	'nivelul' => rand(1, 11),
	        	'numar_de_nivele' => rand(1, 11),
	        	'tipul_cladirii' => $tipul_cladirii[array_rand($tipul_cladirii)],
	        	'planul_cladirii' => $planul_cladirii[array_rand($planul_cladirii)],
	        	'suprafata_totala' => rand(40, 120),
	        	'starea' => $starea[array_rand($starea)],
	        	'balcon' => $balcon[array_rand($balcon)],
	        	'baie' => $baie[array_rand($baie)],
	        	'parcare' => $parcare[array_rand($parcare)],
	        	'sector' => $sector[array_rand($sector)],
	        	'pret' => rand(10000, 50000),
	        	'foto_1' => rand(1, 9).'.jpg',
	        	'lat' => '47.'.rand(100000, 999999),
	        	'lng' => '28.'.rand(100000, 999999)
	    	]);
    	}
    }
}
