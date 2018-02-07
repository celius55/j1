@extends('head')

@section('content')
<script>
	function initMap() 
	{
		var myLatlng = new google.maps.LatLng(47.0125112, 28.7608212);
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
			content: '<center> <h4>Apartament - {{ $r->numar_de_camere }} @if ($r->numar_de_camere == 1) cameră @else camere @endif  - {{ $r->sector }}</h4> <img src="/img/{{ $r->foto_1 }}?w=175&h=120&fit=crop">'
		  });
		  marker{{ $r->id }}.addListener('mouseover', function() {
			infowindow{{ $r->id }}.open(map, marker{{ $r->id }});
		  });
		  marker{{ $r->id }}.addListener('mouseout', function() {
			infowindow{{ $r->id }}.close(map, marker{{ $r->id }});
		  });
		  marker{{ $r->id }}.addListener('click', function() {
			window.location = '{{ url("/") }}/apartament/{{ $r->id }}';
		  });
		@endforeach
	}

	$(document).ready(function() {
		$('#map').hide();

		$("#select-map-show").on('click', function(e) {
			$(this).hide();
			$('#select-map-hide').show();
			$('#map').show();
			google.maps.event.trigger(map, "resize");
		});

		$("#select-map-hide").on('click', function(e) {
			$(this).hide();
			$('#select-map-show').show();
			$('#map').hide();
		});
	});
</script>

<script async defer
  src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAfZy_6KnRgHNX11SAnfPkhxBf4FcUOSPs&callback=initMap">
</script>

<div style="margin-top: 30px;"></div>

<div class="container">
	<div class="row">
		@if ($search == 'yes')
			<h4 class="page-title">{{ trans('all.rezultatele_cautarii') }}</h4>
		@else
			<h4 class="page-title">{{ trans('all.apartamente') }} - @if (isset($tip) && $tip == 'arenda') {{ trans('all.arenda') }} @else {{ trans('all.vinzare') }} @endif</h4>
		@endif

		<!-- If mobile -->
			@include('layouts.mobile-vinzare')
		<!-- End mobile -->

		@if ( $agent->isMobile() ) 
			@if ( $result instanceof \Illuminate\Pagination\LengthAwarePaginator )
				<div class="text-center"> {{ $result->links() }} </div>
			@endif
			@foreach ($result as $r)
                <a href="{{ url('/') }}/apartament/{{ $r->id }}" target="_blank">
                    <div class="bg-mobile-house" style="background: url('/img/{{ $r->foto_1 }}?w=400&h=200&fit=crop') center no-repeat;">
                        <div class="bg-mobile-text">
                            {{ str_limit( $r->{'titlu_'.session('applocale')}, 35 ) }}
                            <br>
                            {{ number_format($r->pret, 0, '', ' ') }} €
                        </div>
                    </div>
                </a>
<!--
				<div class="col-xs-12">
					<center>
						<a href="{{ url('/') }}/apartament/{{ $r->id }}" target="_blank">
							<img src="/img/{{ $r->foto_1 }}?w=175&h=120&fit=crop" class="img-responsive img-thumbnail">
							<h6 style="text-align: left;"> {{ str_limit( $r->{'titlu_'.session('applocale')}, 35 ) }} </h6>
							<div class="price">
								<h5> {{ number_format($r->pret, 0, '', ' ') }} € </h5>
							</div> 
						</a>
					</center>
				</div>
-->
			@endforeach
			@if ( $result instanceof \Illuminate\Pagination\LengthAwarePaginator )
				<div class="text-center"> {{ $result->links() }} </div>
			@endif
		@endif

		<div class="hidden-xs col-md-9">
			<div id="map" style="height: 500px;"></div>

			<center>
				<img src="/public/img/load.gif" class="load-icon">
			</center>

			<div id="anunturi">
				@if ( $result instanceof \Illuminate\Pagination\LengthAwarePaginator )
					<div class="text-center"> {{ $result->links() }} </div>
				@endif
				@foreach ($result as $r)
					<div class="col-xs-12 col-md-12 anunt-bloc">
						<div class="col-xs-12 col-md-3">
							<center>
								<a href="{{ url('/') }}/apartament/{{ $r->id }}" target="_blank">
									<img src="/img/{{ $r->foto_1 }}?w=175&h=120&fit=crop" class="img-responsive img-thumbnail">
								</a>
							</center>
						</div>
						<div class="col-xs-12 col-md-6">
							<a href="{{ url('/') }}/apartament/{{ $r->id }}" class="title-href" target="_blank">
								<h4> {{ $r->{'titlu_'.session('applocale')} }} </h4>
							</a>
							<ul class="descr-short">
								<div class="col-xs-12 col-md-6">
								@if ($r->tip != 'cimp_gol')
									<li>{{ trans('all.tip') }}: <span class="descr-short-color">{{ $r->translate(session('applocale'), $r->tip) }}</span></li>
								@endif
								@if ($r->numar_de_camere != 'cimp_gol')
									<li>{{ trans('all.numar_de_camere') }}: <span class="descr-short-color">{{ $r->numar_de_camere }}</span></li>
								@endif
								@if ($r->nivelul != 'cimp_gol')
									<li>{{ trans('all.nivelul') }}: <span class="descr-short-color">{{ $r->translate(session('applocale'), $r->nivelul) }} / {{ $r->numar_de_nivele }}</span></li>
								@endif
								</div>
								<div class="col-xs-12 col-md-6">
								<li>{{ trans('all.suprafata_totala') }}: <span class="descr-short-color">{{ $r->suprafata_totala }} m2</span></li>
								@if ($r->starea != 'cimp_gol')
									<li>{{ trans('all.starea') }}: <span class="descr-short-color">{{ $r->translate(session('applocale'), $r->starea) }}</span></li>
								@endif
								@if ($r->sector == 'Alte localități')
                                    <li>{{ trans('all.localitate') }}: <span class="descr-short-color">{{ $r->localitate }}</span></li>
									@else
                                    <li>{{ trans('all.sector') }}: <span class="descr-short-color">{{ $r->translate(session('applocale'), $r->sector) }}</span></li>
								@endif
								</div>
							</ul>
						</div>
						<div class="col-xs-12 col-md-3 price">
							{{ number_format($r->pret, 0, '', ' ') }} €
							<br>
							<a href="{{ url('/') }}/apartament/{{ $r->id }}" target="_blank" class="btn btn-default" style="width: 100%; color: #368429;">{{ trans('all.detalii') }}</a>
							@if ( isset($session_apartamente) )

								<?php $star = 'no'; ?>
								@foreach ($session_apartamente as $s) 
									@if ( $s->id == $r->id )
										<?php $star = 'yes'; ?>
									@endif
								@endforeach
									@if ($star == 'yes')
										<i class="fa fa-star" id="star{{ $r->id }}" onclick="star( {{ $r->id }}, '{{ $r->category }}')"> </i>	
										<script> var star{{ $r->id }} = 1; </script>
										@else
											<i class="fa fa-star-o" id="star{{ $r->id }}" onclick="star( {{ $r->id }}, '{{ $r->category }}')"> </i>	
									@endif

								@else
									<i class="fa fa-star-o" id="star{{ $r->id }}" onclick="star( {{ $r->id }}, '{{ $r->category }}')"> </i>
							@endif
						</div>
					</div>
				@endforeach
				@if ( $result instanceof \Illuminate\Pagination\LengthAwarePaginator )
					<div class="text-center"> {{ $result->links() }} </div>
				@endif
			</div>
		</div>

		<div class="col-xs-12 col-md-3" id="cautare-avansata">
			<button id="select-map-show" class="btn btn-success" style="width: 100%"><h4> <i class="fa fa-map"></i> {{ trans('all.harta_apartamente') }} </h4></button>
			<button id="select-map-hide" class="btn btn-success" style="width: 100%"><h4> <i class="fa fa-map"></i> {{ trans('all.ascunde_harta') }} </h4></button>
			<center><h4 class="page-title">{{ trans('all.cautare_avansata') }}</h4></center>
			{!! Form::open(['id' => 'apartamente', 'url' => 'search-post']) !!}
			{!! Form::input('hidden', 'page_form_name', 'apartamente_vinzare') !!}
			
			@include('page.search.sector')
			@include('page.search.tip')
			@include('page.search.starea')
			@include('page.search.pretul')
			@include('page.search.numar-de-camere')
			@include('page.search.planul-cladirii')
			@include('page.search.suprafata-totala')
			@include('page.search.nivelul')
			@include('page.search.numar-de-nivele')
			@include('page.search.tipul-cladirii')
			@include('page.search.balcon')
			@include('page.search.baie')
			@include('page.search.parcare')

			@if ( $agent->isMobile() )
				{!! Form::submit('Cauta', array('class' => 'btn btn-success')) !!}
			@endif
			
			{!! Form::close() !!}
		</div>
	</div>
</div>

@stop