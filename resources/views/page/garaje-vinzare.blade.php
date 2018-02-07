@extends('head')

@section('content')

<script>
	function initMap() 
	{
		var myLatlng = new google.maps.LatLng(47.0125112, 28.8108212);
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
			content: '<center> <h4>Garaj - {{ $r->parcare }} - {{ $r->sector }}</h4> <img src="/img/{{ $r->foto_1 }}?w=175&h=120&fit=crop">'
		  });
		  marker{{ $r->id }}.addListener('mouseover', function() {
			infowindow{{ $r->id }}.open(map, marker{{ $r->id }});
		  });
		  marker{{ $r->id }}.addListener('mouseout', function() {
			infowindow{{ $r->id }}.close(map, marker{{ $r->id }});
		  });
		  marker{{ $r->id }}.addListener('click', function() {
			window.location = '{{ url("/") }}/garaj/{{ $r->id }}';
		  });
		@endforeach
	}

	$(document).ready(function() {
		$('#map').hide();
		$('#select-map-hide').hide();

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

<div style="margin-top: 30px;"></div>

<div class="container">
	<div class="row">
		@if ($search == 'yes')
			<h4 class="page-title">{{ trans('all.rezultatele_cautarii') }}</h4>
		@else
			<h4 class="page-title">{{ trans('all.garaje') }}- @if (isset($tip) && $tip == 'arenda') {{ trans('all.arenda') }} @else {{ trans('all.vinzare') }} @endif</h4>
		@endif
		
		<!-- If mobile -->
			@include('layouts.mobile-vinzare')
		<!-- End mobile -->

		<div class="col-xs-12 col-md-9">
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
								<a href="{{ url('/') }}/garaj/{{ $r->id }}" target="_blank">
									<img src="/img/{{ $r->foto_1 }}?w=175&h=120&fit=crop" class="img-responsive img-thumbnail">
								</a>
							</center>
						</div>
						<div class="col-xs-12 col-md-6">
							<a href="{{ url('/') }}/garaj/{{ $r->id }}" class="title-href" target="_blank">
								<h4> {{ $r->{'titlu_'.session('applocale')} }} </h4>
							</a>
							<ul class="descr-short">
								<div class="col-xs-12 col-md-6">
								@if ($r->tip != 'cimp_gol')
									<li>{{ trans('all.tip') }}: <span class="descr-short-color">{{ $r->translate(session('applocale'), $r->tip) }}</span></li>
								@endif
								@if ($r->sector == 'Alte localități')
									<li>{{ trans('all.localitate') }}: {{ $r->localitate }}</li>
									@else
										<li>{{ trans('all.sector') }}: {{ $r->translate(session('applocale'), $r->sector) }}</li>
								@endif
								@if ($r->parcare != 'cimp_gol')
									<li>{{ trans('all.parcare') }}: <span class="descr-short-color">{{ $r->translate(session('applocale'), $r->parcare) }}</span></li>
								@endif
								</div>
								<div class="col-xs-12 col-md-6">
								</div>
							</ul>
						</div>
						<div class="col-xs-12 col-md-3 price">
							{{ number_format($r->pret, 0, '', ' ') }} €
							<br>
							<a href="{{ url('/') }}/garaj/{{ $r->id }}" target="_blank" class="btn btn-default" style="width: 100%; color: #368429;"><i class="fa fa-info-circle"></i> Detalii</a>
							@if ( isset($session_garaje) )

								<?php $star = 'no'; ?>
								@foreach ($session_garaje as $s) 
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
			<button id="select-map-show" class="btn btn-success" style="width: 100%"><h4> <i class="fa fa-map"></i> {{ trans('all.harta_garaje') }} </h4></button>
			<button id="select-map-hide" class="btn btn-success" style="width: 100%"><h4> <i class="fa fa-map"></i> {{ trans('all.ascunde_harta') }} </h4></button>
			<center><h4 class="page-title">{{ trans('all.cautare_avansata') }}</h4></center>
			{!! Form::open(['id' => 'garaje']) !!}
			{!! Form::input('hidden', 'page_form_name', 'garaje_vinzare') !!}
			
			@include('page.search.sector')
			@include('page.search.tip')
			@include('page.search.pretul')
			@include('page.search.parcare')

			{!! Form::close() !!}
		</div>
	</div>
</div>

@stop