<!-- Sector -->
<div class="form-group"> 
	<button class="btn btn-primary collapse-search" type="button" data-toggle="collapse" data-target="#sector" aria-expanded="false">
		<i class="fa fa-plus"></i> {{ trans('all.regiunea') }}
	</button>
	<div class="collapse" id="sector">
		<div class="card card-block">
			<div class="d-inline">
				{!! Form::checkbox('chisinau-sector', 'Chișinău sector', null, ['class' => 'chisinau-sector']) !!} 
				<span class="chisinau-sector">{{ trans('all.chisinau_sector') }}</span>
			</div>

			<div class="sub-item sub-item-chisinau-sector">
				<!-- <div class="d-inline">
					{!! Form::checkbox('aeroport', 'Aeroport', null, ['class' => 'field']) !!} 
					<span onclick="check_item('aeroport')">Aeroport</span>
				</div> -->
				<div class="d-inline">
					{!! Form::checkbox('botanica', 'Botanica', null, ['class' => 'field']) !!} 
					<span onclick="check_item('botanica')">{{ trans('all.botanica') }}</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('buiucani', 'Buiucani', null, ['class' => 'field']) !!}
					<span onclick="check_item('buiucani')">{{ trans('all.buiucani') }}</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('centru', 'Centru', null, ['class' => 'field']) !!} 
					<span onclick="check_item('centru')">{{ trans('all.centru') }}</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('ciocana', 'Ciocana', null, ['class' => 'field']) !!}
					<span onclick="check_item('ciocana')">{{ trans('all.ciocana') }}</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('durlesti', 'Durlești', null, ['class' => 'field']) !!}
					<span onclick="check_item('durlesti')">{{ trans('all.durlesti') }}</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('posta_veche', 'Poșta Veche', null, ['class' => 'field']) !!}
					<span onclick="check_item('posta_veche')">{{ trans('all.posta_veche') }}</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('riscani', 'Rîșcani', null, ['class' => 'field']) !!}
					<span onclick="check_item('riscani')">{{ trans('all.riscani') }}</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('sculeni', 'Sculeni', null, ['class' => 'field']) !!}
					<span onclick="check_item('sculeni')">{{ trans('all.sculeni') }}</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('telecentru', 'Telecentru', null, ['class' => 'field']) !!}
					<span onclick="check_item('telecentru')">{{ trans('all.telecentru') }}</span>
				</div>
			</div>

			<div class="d-inline">
				{!! Form::checkbox('chisinau_suburbii', 'Chișinău suburbii', null, ['class' => 'field']) !!} 
				<!-- <span class="chisinau-municipiul">Chișinău municipiul</span> -->
				<span onclick="check_item('chisinau_suburbii')">{{ trans('all.chisinau_suburbii') }}</span>
			</div>

			<div class="d-inline">
				{!! Form::checkbox('alte_localitati', 'Alte localități', null, ['class' => 'field']) !!} 
				<!-- <span class="alte-localitati">Alte localități</span> -->
				<span onclick="check_item('alte_localitati')">{{ trans('all.alte_localitati') }}</span>
			</div>
		</div>

		<!-- <div class="card card-block">
			<div class="d-inline">
				{!! Form::checkbox('chisinau_suburbii', 'Chișinău suburbii', null, ['class' => 'field']) !!} 
				<span class="chisinau-municipiul">Chișinău municipiul</span>
				<span onclick="check_item('chisinau_suburbii')">Chișinău suburbii</span>
			</div>

			<div class="sub-item sub-item-chisinau-municipiul">
				<div class="d-inline">
					{!! Form::checkbox('bacioi', 'Bacioi', null, ['class' => 'field']) !!} 
					<span onclick="check_item('bacioi')">Bacioi</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('bic', 'Bîc', null, ['class' => 'field']) !!} 
					<span onclick="check_item('bic')">Bîc</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('braila', 'Brăila', null, ['class' => 'field']) !!} 
					<span onclick="check_item('braila')">Brăila</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('bubuieci', 'Bubuieci', null, ['class' => 'field']) !!} 
					<span onclick="check_item('bubuieci')">Bubuieci</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('budesti', 'Budești', null, ['class' => 'field']) !!} 
					<span onclick="check_item('budesti')">Budești</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('buneti', 'Buneți', null, ['class' => 'field']) !!} 
					<span onclick="check_item('buneti')">Buneți</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('ceroborta', 'Ceroborta', null, ['class' => 'field']) !!} 
					<span onclick="check_item('ceroborta')">Ceroborta</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('cheltuitor', 'Cheltuitor', null, ['class' => 'field']) !!} 
					<span onclick="check_item('cheltuitor')">Cheltuitor</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('ciorescu', 'Ciorescu', null, ['class' => 'field']) !!} 
					<span onclick="check_item('ciorescu')">Ciorescu</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('codru', 'Codru', null, ['class' => 'field']) !!} 
					<span onclick="check_item('codru')">Codru</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('colonita', 'Colonița', null, ['class' => 'field']) !!} 
					<span onclick="check_item('colonita')">Colonița</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('cricova', 'Cricova', null, ['class' => 'field']) !!} 
					<span onclick="check_item('cricova')">Cricova</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('cruzesti', 'Cruzești', null, ['class' => 'field']) !!} 
					<span onclick="check_item('cruzesti')">Cruzești</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('dobruja', 'Dobruja', null, ['class' => 'field']) !!} 
					<span onclick="check_item('dobruja')">Dobruja</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('dumbrava', 'Dumbrava', null, ['class' => 'field']) !!} 
					<span onclick="check_item('dumbrava')">Dumbrava</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('fauresti', 'Făurești', null, ['class' => 'field']) !!} 
					<span onclick="check_item('fauresti')">Făurești</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('frumusica', 'Frumușica', null, ['class' => 'field']) !!} 
					<span onclick="check_item('frumusica')">Frumușica</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('ghidighici', 'Ghidighici', null, ['class' => 'field']) !!} 
					<span onclick="check_item('ghidighici')">Ghidighici</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('goian', 'Goian', null, ['class' => 'field']) !!} 
					<span onclick="check_item('goian')">Goian</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('goianul_nou', 'Goianul Nou', null, ['class' => 'field']) !!} 
					<span onclick="check_item('goianul_nou')">Goianul Nou</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('gratiesti', 'Grătiești', null, ['class' => 'field']) !!} 
					<span onclick="check_item('gratiesti')">Grătiești</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('hulboaca', 'Hulboaca', null, ['class' => 'field']) !!} 
					<span onclick="check_item('hulboaca')">Hulboaca</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('humulesti', 'Humulești', null, ['class' => 'field']) !!} 
					<span onclick="check_item('humulesti')">Humulești</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('revaca', 'Revaca', null, ['class' => 'field']) !!} 
					<span onclick="check_item('revaca')">Revaca</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('singera', 'Sîngera', null, ['class' => 'field']) !!} 
					<span onclick="check_item('singera')">Sîngera</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('stauceni', 'Stăuceni', null, ['class' => 'field']) !!} 
					<span onclick="check_item('stauceni')">Stăuceni</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('straisteni', 'Străisteni', null, ['class' => 'field']) !!} 
					<span onclick="check_item('straisteni')">Străisteni</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('tohatin', 'Tohatin', null, ['class' => 'field']) !!} 
					<span onclick="check_item('tohatin')">Tohatin</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('truseni', 'Trușeni', null, ['class' => 'field']) !!} 
					<span onclick="check_item('truseni')">Trușeni</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('vaduleni', 'Văduleni', null, ['class' => 'field']) !!} 
					<span onclick="check_item('vaduleni')">Văduleni</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('vadul_lui_voda', 'Vadul lui Vodă', null, ['class' => 'field']) !!} 
					<span onclick="check_item('vadul_lui_voda')">Vadul lui Vodă</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('vatra', 'Vatra', null, ['class' => 'field']) !!} 
					<span onclick="check_item('vatra')">Vatra</span>
				</div>
			</div>
		</div> -->

		<!-- <div class="card card-block">
			<div class="d-inline">
				{!! Form::checkbox('alte_localitati', 'Alte localități', null, ['class' => 'field']) !!} 
				<span class="alte-localitati">Alte localități</span>
				<span onclick="check_item('alte_localitati')">Alte localități</span>
			</div>

			<div class="sub-item sub-item-alte-localitati">
				<div class="d-inline">
					{!! Form::checkbox('balti_mun', 'Bălți mun.', null, ['class' => 'field']) !!} 
					<span onclick="check_item('mun_balti')">Bălți mun.</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('tiraspol', 'Tiraspol', null, ['class' => 'field']) !!} 
					<span onclick="check_item('tiraspol')">Tiraspol</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('cahul', 'Cahul', null, ['class' => 'field']) !!} 
					<span onclick="check_item('cahul')">Cahul</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('anenii_noi', 'Anenii Noi', null, ['class' => 'field']) !!} 
					<span onclick="check_item('anenii_noi')">Anenii Noi</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('basarabeasca', 'Basarabeasca', null, ['class' => 'field']) !!} 
					<span onclick="check_item('basarabeasca')">Basarabeasca</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('bender_mun', 'Bender mun.', null, ['class' => 'field']) !!} 
					<span onclick="check_item('bender_mun')">Bender mun.</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('briceni', 'Briceni', null, ['class' => 'field']) !!} 
					<span onclick="check_item('briceni')">Briceni</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('calarasi', 'Călărași', null, ['class' => 'field']) !!} 
					<span onclick="check_item('calarasi')">Călărași</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('camenca', 'Camenca', null, ['class' => 'field']) !!} 
					<span onclick="check_item('camenca')">Camenca</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('cantemir', 'Cantemir', null, ['class' => 'field']) !!} 
					<span onclick="check_item('cantemir')">Cantemir</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('causeni', 'Căușeni', null, ['class' => 'field']) !!} 
					<span onclick="check_item('causeni')">Căușeni</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('ciadir_lunga', 'Ciadîr-Lunga', null, ['class' => 'field']) !!} 
					<span onclick="check_item('ciadir_lunga')">Ciadîr-Lunga</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('cimislia', 'Cimișlia', null, ['class' => 'field']) !!} 
					<span onclick="check_item('cimislia')">Cimișlia</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('comrat', 'Comrat', null, ['class' => 'field']) !!} 
					<span onclick="check_item('comrat')">Comrat</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('criuleni', 'Criuleni', null, ['class' => 'field']) !!} 
					<span onclick="check_item('criuleni')">Criuleni</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('dnestrovsk', 'Dnestrovsk', null, ['class' => 'field']) !!} 
					<span onclick="check_item('dnestrovsk')">Dnestrovsk</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('donduseni', 'Dondușeni', null, ['class' => 'field']) !!} 
					<span onclick="check_item('donduseni')">Dondușeni</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('drochia', 'Drochia', null, ['class' => 'field']) !!} 
					<span onclick="check_item('drochia')">Drochia</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('dubasari', 'Dubăsari', null, ['class' => 'field']) !!} 
					<span onclick="check_item('dubasari')">Dubăsari</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('edinet', 'Edineț', null, ['class' => 'field']) !!} 
					<span onclick="check_item('edinet')">Edineț</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('falesti', 'Fălești', null, ['class' => 'field']) !!} 
					<span onclick="check_item('falesti')">Fălești</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('floresti', 'Florești', null, ['class' => 'field']) !!} 
					<span onclick="check_item('floresti')">Florești</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('glodeni', 'Glodeni', null, ['class' => 'field']) !!} 
					<span onclick="check_item('glodeni')">Glodeni</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('grigoriopol', 'Grigoriopol', null, ['class' => 'field']) !!} 
					<span onclick="check_item('grigoriopol')">Grigoriopol</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('hincesti', 'Hîncești', null, ['class' => 'field']) !!} 
					<span onclick="check_item('hincesti')">Hîncești</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('ialoveni', 'Ialoveni', null, ['class' => 'field']) !!} 
					<span onclick="check_item('ialoveni')">Ialoveni</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('leova', 'Leova', null, ['class' => 'field']) !!} 
					<span onclick="check_item('leova')">Leova</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('nisporeni', 'Nisporeni', null, ['class' => 'field']) !!} 
					<span onclick="check_item('nisporeni')">Nisporeni</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('ocnita', 'Ocnița', null, ['class' => 'field']) !!} 
					<span onclick="check_item('ocnita')">Ocnița</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('orhei', 'Orhei', null, ['class' => 'field']) !!} 
					<span onclick="check_item('orhei')">Orhei</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('rezina', 'Rezina', null, ['class' => 'field']) !!} 
					<span onclick="check_item('rezina')">Rezina</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('ribnita', 'Rîbnița', null, ['class' => 'field']) !!} 
					<span onclick="check_item('ribnita')">Rîbnița</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('riscani', 'Rîșcani', null, ['class' => 'field']) !!} 
					<span onclick="check_item('riscani')">Rîșcani</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('singerei', 'Sîngerei', null, ['class' => 'field']) !!} 
					<span onclick="check_item('singerei')">Sîngerei</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('slobozia', 'Slobozia', null, ['class' => 'field']) !!} 
					<span onclick="check_item('slobozia')">Slobozia</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('soldanesti', 'Șoldănești', null, ['class' => 'field']) !!} 
					<span onclick="check_item('soldanesti')">Șoldănești</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('soroca', 'Soroca', null, ['class' => 'field']) !!} 
					<span onclick="check_item('soroca')">Soroca</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('stefan_voda', 'Ștevan Vodă', null, ['class' => 'field']) !!} 
					<span onclick="check_item('stefan_voda')">Ștevan Vodă</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('straseni', 'Strășeni', null, ['class' => 'field']) !!} 
					<span onclick="check_item('straseni')">Strășeni</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('taraclia', 'Taraclia', null, ['class' => 'field']) !!} 
					<span onclick="check_item('taraclia')">Taraclia</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('telenesti', 'Telenești', null, ['class' => 'field']) !!} 
					<span onclick="check_item('telenesti')">Telenești</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('ungheni', 'Ungheni', null, ['class' => 'field']) !!} 
					<span onclick="check_item('ungheni')">Ungheni</span>
				</div>
				<div class="d-inline">
					{!! Form::checkbox('vulcanesti', 'Vulcănești', null, ['class' => 'field']) !!} 
					<span onclick="check_item('vulcanesti')">Vulcănești</span>
				</div>
			</div>
		</div>  -->
	</div>
</div>