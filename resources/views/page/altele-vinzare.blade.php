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
			content: '<center> <h4>Apartament - {{ $r->numar_de_camere }} @if ($r->numar_de_camere == 1) cameră @else camere @endif  - {{ $r->sector }}</h4> <img src="{{ $r->foto_1 }}" height="150px" width="150px">'
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
			<h4 class="page-title">{{ trans('all.altele') }} - @if (isset($tip) && $tip == 'arenda') {{ trans('all.arenda') }} @else {{ trans('all.vinzare') }} @endif</h4>
		@endif
		<div class="col-xs-9">

			<div id="map" style="height: 500px;"></div>

			<center>
				<img src="/public/img/load.gif" class="load-icon">
			</center>

			<div id="anunturi">
				@if ( $result instanceof \Illuminate\Pagination\LengthAwarePaginator )
					<div class="text-center"> {{ $result->links() }} </div>
				@endif
				@foreach ($result as $r)
					<div class="col-xs-12 anunt-bloc">
						<div class="col-xs-3">
							<center>
								<a href="{{ url('/') }}/apartament/{{ $r->id }}">
									<img src="{{ $url_domain }}/public/images/thumbs2/{{ $r->foto_1 }}" class="img-responsive img-thumbnail">
								</a>
							</center>
						</div>
						<div class="col-xs-6">
							<a href="{{ url('/') }}/apartament/{{ $r->id }}" class="title-href">
								<h4> {{ $r->{'titlu_'.session('applocale')} }} </h4>
							</a>
							<ul class="descr-short">
								<div class="col-xs-6">
								<li>{{ trans('all.tip') }}: <span class="descr-short-color">{{ $r->translate(session('applocale'), $r->tip) }}</span></li>
								</div>
								<div class="col-xs-6">
								<li>{{ trans('all.suprafata_totala') }}: <span class="descr-short-color">{{ $r->suprafata_totala }} m2</span></li>
								<li>{{ trans('all.starea') }}: <span class="descr-short-color">{{ $r->translate(session('applocale'), $r->starea) }}</span></li>
								@if ($r->sector == 'Alte localități')
									<li>{{ trans('all.localitate') }}: {{ $r->localitate }}</li>
									@else
										<li>{{ trans('all.sector') }}: {{ $r->translate(session('applocale'), $r->sector) }}</li>
								@endif
								</div>
							</ul>
						</div>
						<div class="col-xs-3 price">
							{{ number_format($r->pret, 0, '', ' ') }} €
							<br>
							<a href="{{ url('/') }}/apartament/{{ $r->id }}" class="btn btn-default" style="width: 100%; color: #368429;">{{ trans('all.detalii') }}</a>
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
					<center>
						<img src="/public/img/baner-anunt.jpg" style="margin-bottom: 5px;" class="img-responsive" alt="lesternau">
					</center>
				@endforeach
				@if ( $result instanceof \Illuminate\Pagination\LengthAwarePaginator )
					<div class="text-center"> {{ $result->links() }} </div>
				@endif
			</div>
		</div>

		<div class="col-xs-3">
			<button id="select-map-show" class="btn btn-success" style="width: 100%"><h4> <i class="fa fa-map"></i> {{ trans('all.harta_apartamente') }} </h4></button>
			<button id="select-map-hide" class="btn btn-success" style="width: 100%"><h4> <i class="fa fa-map"></i> {{ trans('all.ascunde_harta') }} </h4></button>
			<center><h4 class="page-title">{{ trans('all.cautare_avansata') }}</h4></center>
			{!! Form::open(['id' => 'altele']) !!}
			{!! Form::input('hidden', 'page_form_name', 'altele_vinzare') !!}
			
			@include('page.search.sector')
			@include('page.search.tip')
			@include('page.search.starea')
			@include('page.search.pretul')
			@include('page.search.suprafata-totala')
			
			{!! Form::close() !!}
		</div>
	</div>
</div>

@stop