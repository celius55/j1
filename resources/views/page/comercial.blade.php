@extends('head')

@foreach ($result as $r)
	@section('title')Comercial - {{ $r->suprafata_totala }} (m2) - {{ $r->sector }}@endsection
	@section('keywords')
		<?php 
			$res = str_replace(' ', ', ', $r->titlu_ro); 
			echo str_replace('.', ' ', $res);
		?>
	@endsection
	@section('description'){{ $r->titlu_ro }}@endsection
@endforeach

@section('content')

<script>
	function initMap()  
	{
		@foreach ($result as $r)
			var myLatlng = new google.maps.LatLng({{ $r->lat }}, {{ $r->lng }});
		@endforeach
		var mapOptions = {
		  center: myLatlng,
		  scrollwheel: true,
		  zoom: 11,
		  mapTypeId: google.maps.MapTypeId.ROADMAP
		}
		var map = new google.maps.Map(document.getElementById("map"), mapOptions);

		@foreach ($result as $r)
		  // var image = '/img/icon/{{ $r->tip }}.png';
		  var image = '/public/img/map-icon-50.png';
		  var marker{{ $r->id }} = new google.maps.Marker({
			position: {lat: {{ $r->lat }}, lng: {{ $r->lng }} },
			map: map,
			icon: image
		  });
		  var infowindow{{ $r->id }} = new google.maps.InfoWindow({
			content: '<center> <h4>Comercial - {{ $r->suprafata_totala }} (m2) - {{ $r->sector }}</h4> <img src="/img/{{ $r->foto_1 }}?w=150&h=150&fit=crop">  <br><br> <a href="{{ url("/") }}/comercial/{{ $r->id }}" class="btn btn-success">Detalii</button> </center>'
		  });
		  marker{{ $r->id }}.addListener('click', function() {
			infowindow{{ $r->id }}.open(map, marker{{ $r->id }});
		  });
		@endforeach
	}

	$(document).ready(function() {
		$('.popup-gallery').magnificPopup({
			delegate: 'a',
			type: 'image',
			tLoading: 'Loading image #%curr%...',
			mainClass: 'mfp-img-mobile',
			gallery: {
				enabled: true,
				navigateByImgClick: true,
				preload: [0,1] // Will preload 0 - before current, and 1 after the current image
			},
			image: {
				tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
				// titleSrc: function(item) {
				// 	return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
				// }
			}
		});
	});
</script>
		
	@include('page.single-top')
		
			<div class="col-xs-12 col-md-6 single-page">
				<div class="caracteristic">
				<div class="col-md-4">
					<h3 class="caracteristic-word">{{ trans('all.caracteristici') }}</h3>
					
					<ul class="descr-item">
						@if ($r->tip != 'cimp_gol')
							<li>{{ trans('all.tip') }}: {{ $r->translate(session('applocale'), $r->tip) }}</li>
						@endif
						<li>{{ trans('all.suprafata_totala') }}: {{ $r->suprafata_totala }}</li>
						@if ($r->nivelul != 'cimp_gol')
							<li>{{ trans('all.nivelul') }}: {{ $r->nivelul }}</li>
						@endif
						@if ($r->starea != 'cimp_gol')
							<li>{{ trans('all.starea') }}: {{ $r->translate(session('applocale'), $r->starea) }}</li>
						@endif
						@if ($r->sector == 'Alte localități')
							<li>{{ trans('all.localitate') }}: {{ $r->localitate }}</li>
							@else
								<li>{{ trans('all.sector') }}: {{ $r->translate(session('applocale'), $r->sector) }}</li>
						@endif
						@if ($r->bloc_sanitar != 'cimp_gol')
							<li>{{ trans('all.bloc_sanitar') }}: {{ $r->bloc_sanitar }}</li>
						@endif
					</ul>
				</div>
				
				<div class="col-md-4">
					<h3>{{ trans('all.utilitati') }}</h3>
				<!--			Utilitati-->
				@if ( $utilitati_generale == false && $sisteme_de_incalzire == false && $alte_utilitati == true )
				<h4 class="descrierea">{{ trans('all.utilitati') }}:</h4>
				@endif
<!--                *Utilitati generale-->
                    <ul class="options">
						@if ( $utilitati_generale == true )
                        <li>
                            {{ trans('all.utilitati_generale') }}:
                                @if ($r->utilitati_electricitate == 1) <br> - {{ trans('all.utilitati_electricitate') }} @endif 
                                @if ($r->utilitati_apeduct == 1) <br> - {{ trans('all.utilitati_apeduct') }} @endif 
                                @if ($r->utilitati_gazificat == 1) <br> - {{ trans('all.utilitati_gazificat') }} @endif 
                        </li>
						@endif
					</ul>
<!--                *Sisteme de incalzire-->
                    <ul class="options">
                        @if ( $sisteme_de_incalzire == true )
                        <li>
                            {{ trans('all.sisteme_de_incalzire') }}:
                                @if ($r->incalzire_centralizata == 1) <br> - {{ trans('all.incalzire_centralizata') }} @endif 
                                @if ($r->incalzire_autonoma == 1) <br> - {{ trans('all.incalzire_autonoma') }} @endif 
                        </li>
                        @endif
					</ul>
<!--                *Alte utilitati-->
                    <ul class="options">
                        @if ( $alte_utilitati == true )
                        <li>
                            {{ trans('all.alte_utilitati') }}:
                                @if ($r->utilitati_climatizare == 1) <br> - {{ trans('all.utilitati_climatizare') }} @endif 
                                @if ($r->utilitati_acces_internet == 1) <br> - {{ trans('all.utilitati_acces_internet') }} @endif 
                                @if ($r->utilitati_interfon == 1) <br> - {{ trans('all.utilitati_interfon') }} @endif 
                                @if ($r->utilitati_ascensor == 1) <br> - {{ trans('all.utilitati_ascensor') }} @endif 
                                @if ($r->utilitati_supraveghere_video == 1) <br> - {{ trans('all.utilitati_supraveghere_video') }} @endif 
                                @if ($r->utilitati_sistem_antiincendiar == 1) <br> - {{ trans('all.utilitati_sistem_antiincendiar') }} @endif 
                        </li> 
                        @endif
					</ul>
				</div>
				
				<div class="col-md-4">
					<h3>{{ trans('all.finisaje') }}</h3>
					<!--			Finisaje-->
				@if ( $ferestre == false && $usi_de_interior == false && $usi_de_exterior == false &&  $peretii_interiori == false && $tavane == false && $acoperiri == false )
				@endif
<!--                *Ferestre-->
                    <ul class="options">
                        @if ( $ferestre == true )
                        <li>
                            {{ trans('all.ferestre') }}:
                                @if ($r->ferestre_termopan == 1) <br> - {{ trans('all.ferestre_termopan') }} @endif 
                                @if ($r->ferestre_lemn == 1) <br> - {{ trans('all.ferestre_lemn') }} @endif 
                                @if ($r->ferestre_metal == 1) <br> - {{ trans('all.ferestre_metal') }} @endif 
                                @if ($r->ferestre_vitralii == 1) <br> - {{ trans('all.ferestre_vitralii') }} @endif
                        </li>
                        @endif
                    </ul>
<!--                *Usi de interior -->
                    <ul class="options">
                        @if ( $usi_de_interior == true )
                        <li>
                            {{ trans('all.usi_de_interior') }}:
                                @if ($r->usi_de_interior_lemn == 1) <br> - {{ trans('all.usi_de_interior_lemn') }} @endif
                                @if ($r->usi_de_interior_mdf == 1) <br> - {{ trans('all.usi_de_interior_mdf') }} @endif
                                @if ($r->usi_de_interior_termopan == 1) <br> - {{ trans('all.usi_de_interior_termopan') }} @endif
                                @if ($r->usi_de_interior_metal == 1) <br> - {{ trans('all.usi_de_interior_metal') }} @endif
                                @if ($r->usi_de_interior_extensibile == 1) <br> - {{ trans('all.usi_de_interior_extensibile') }} @endif
                        </li>
                        @endif
                    </ul>
<!--                *Usi de exterior -->
                    <ul class="options">
                        @if ( $usi_de_exterior == true )
                        <li>
                            {{ trans('all.usi_de_exterior') }}:
                                @if ($r->usi_de_exterior_lemn == 1) <br> - {{ trans('all.usi_de_exterior_lemn') }} @endif
                                @if ($r->usi_de_exterior_mdf == 1) <br> - {{ trans('all.usi_de_exterior_mdf') }} @endif
                                @if ($r->usi_de_exterior_termopan == 1) <br> - {{ trans('all.usi_de_exterior_termopan') }} @endif
                                @if ($r->usi_de_exterior_metal == 1) <br> - {{ trans('all.usi_de_exterior_metal') }} @endif
                                @if ($r->usi_de_exterior_bronate == 1) <br> - {{ trans('all.usi_de_exterior_bronate') }} @endif
                                @if ($r->usi_de_exterior_culisante == 1) <br> - {{ trans('all.usi_de_exterior_culisante') }} @endif
                        </li>
                        @endif
                    </ul>
<!--                *Peretii interiori-->
                    <ul class="options">
                    	@if ( $peretii_interiori == true )
						<li>
							{{ trans('all.peretii_interiori') }}:
								@if ($r->peretii_interiori_tapete == 1) <br> - {{ trans('all.peretii_interiori_tapete') }} @endif
								@if ($r->peretii_interiori_tapete_decorative == 1) <br> - {{ trans('all.peretii_interiori_tapete_decorative') }} @endif
								@if ($r->peretii_interiori_gresie == 1) <br> - {{ trans('all.peretii_interiori_gresie') }} @endif
								@if ($r->peretii_interiori_lambriuri_din_lemn == 1) <br> - {{ trans('all.peretii_interiori_lambriuri_din_lemn') }} @endif
								@if ($r->peretii_interiori_lambriuri_din_pvc == 1) <br> - {{ trans('all.peretii_interiori_lambriuri_din_pvc') }} @endif
								@if ($r->peretii_interiori_glet == 1) <br> - {{ trans('all.peretii_interiori_glet') }} @endif
								@if ($r->peretii_interiori_tencuiala_decorativa == 1) <br> - {{ trans('all.peretii_interiori_tencuiala_decorativa') }} @endif
								@if ($r->peretii_interiori_gips_carton == 1) <br> - {{ trans('all.peretii_interiori_gips_carton') }} @endif
								@if ($r->peretii_interiori_placaj == 1) <br> - {{ trans('all.peretii_interiori_placaj') }} @endif
                       	</li>
                       	@endif
                    </ul>
<!--                *Peretii exteriori-->
                    <ul class="options">
                    	@if ( $peretii_exteriori == true )
						<li>
							{{ trans('all.peretii_exteriori') }}:
								@if ($r->peretii_exteriori_tencuiala_decorativa == 1) <br> - {{ trans('all.peretii_exteriori_tencuiala_decorativa') }} @endif
								@if ($r->peretii_exteriori_mozaic == 1) <br> - {{ trans('all.peretii_exteriori_mozaic') }} @endif
                      			@if ($r->peretii_exteriori_gresie == 1) <br> - {{ trans('all.peretii_exteriori_gresie') }} @endif
                      			@if ($r->peretii_exteriori_lambriuri_din_pvc == 1) <br> - {{ trans('all.peretii_exteriori_lambriuri_din_pvc') }} @endif
                      			@if ($r->peretii_exteriori_lambriuri_din_lemn == 1) <br> - {{ trans('all.peretii_exteriori_lambriuri_din_lemn') }} @endif
                      			@if ($r->peretii_exteriori_ciment == 1) <br> - {{ trans('all.peretii_exteriori_ciment') }} @endif
                      			@if ($r->peretii_exteriori_termoizolata_cu_vata_minerala == 1) <br> - {{ trans('all.peretii_exteriori_termoizolata_cu_vata_minerala') }} @endif
                      			@if ($r->peretii_exteriori_termoizolata_cu_polistiren == 1) <br> - {{ trans('all.peretii_exteriori_termoizolata_cu_polistiren') }} @endif
                      			@if ($r->peretii_exteriori_piatra_decorativa == 1) <br> - {{ trans('all.peretii_exteriori_piatra_decorativa') }} @endif
                      			@if ($r->peretii_exteriori_palacaj == 1) <br> - {{ trans('all.peretii_exteriori_palacaj') }} @endif
                      			@if ($r->peretii_exteriori_fatada_ventilata == 1) <br> - {{ trans('all.peretii_exteriori_fatada_ventilata') }} @endif
                      			@if ($r->peretii_exteriori_arhitectura_istorica == 1) <br> - {{ trans('all.peretii_exteriori_arhitectura_istorica') }} @endif
                       	</li>
                       	@endif
                    </ul>                    
<!--                *Tavane-->
				    <ul class="options">
                        @if ( $tavane == true )
                        <li>
                            {{ trans('all.tavane') }}:
                                @if ($r->tavane_extensibile == 1) <br> - {{ trans('all.tavane_extensibile') }} @endif
                                @if ($r->tavane_suspendate == 1) <br> - {{ trans('all.tavane_suspendate') }} @endif
                                @if ($r->tavane_tencuiala == 1) <br> - {{ trans('all.tavane_tencuiala') }} @endif
                                @if ($r->tavane_lambriuri_din_pvc == 1) <br> - {{ trans('all.tavane_lambriuri_din_pvc') }} @endif
                                @if ($r->tavane_gips_carton == 1) <br> - {{ trans('all.tavane_gips_carton') }} @endif
                                @if ($r->tavane_placaj == 1) <br> - {{ trans('all.tavane_placaj') }} @endif
                        </li>
                        @endif	
                    </ul>
<!--                *Acoperiri-->
				    <ul class="options">
                       @if ( $acoperiri == true )
                       <li>
						   {{ trans('all.acoperiri') }}:
							   @if ($r->acoperiri_gresie == 1) <br> - {{ trans('all.acoperiri_gresie') }} @endif
							   @if ($r->acoperiri_parchet == 1) <br> - {{ trans('all.acoperiri_parchet') }} @endif
							   @if ($r->acoperiri_linoleum == 1) <br> - {{ trans('all.acoperiri_linoleum') }} @endif
							   @if ($r->acoperiri_laminat == 1) <br> - {{ trans('all.acoperiri_laminat') }} @endif
							   @if ($r->acoperiri_lemn == 1) <br> - {{ trans('all.acoperiri_lemn') }} @endif
							   @if ($r->acoperiri_ciment == 1) <br> - {{ trans('all.acoperiri_ciment') }} @endif
							   @if ($r->acoperiri_industriale == 1) <br> - {{ trans('all.acoperiri_industriale') }} @endif
							   @if ($r->acoperiri_covor == 1) <br> - {{ trans('all.acoperiri_covor') }} @endif
							   @if ($r->acoperiri_epoxidice == 1) <br> - {{ trans('all.acoperiri_epoxidice') }} @endif
							   @if ($r->acoperiri_elastice == 1) <br> - {{ trans('all.acoperiri_elastice') }} @endif
                       </li>
                       @endif
                    </ul>
				</div>
				</div> <!--.options-->

                
<!--            Descrierea-->

<!--			Vecinitati-->
				<h4 class="descrierea">{{ trans('all.vecinatati') }}:</h4>
					{!! $r->{'vecinatati_'.session('applocale')} !!}
<!--			Alte dotari-->
				<h4 class="descrierea">{{ trans('all.alte_dotari') }}:</h4>
					{!! $r->{'alte_dotari_'.session('applocale')} !!}
				
				<div class="description">
					{!! $r->{'descrierea_'.session('applocale')} !!}
				</div>
			</div>
		</div>
	</div>
@stop