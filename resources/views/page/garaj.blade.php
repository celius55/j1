@extends('head')

@foreach ($result as $r)
	@section('title')Garaj - {{ $r->parcare }} - {{ $r->sector }}@endsection
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
			content: '<center> <h4>Garaj - {{ $r->parcare }} - {{ $r->sector }}</h4> <img src="/img/{{ $r->foto_1 }}?w=150&h=150&fit=crop">  <br><br> <a href="{{ url("/") }}/comercial/{{ $r->id }}" class="btn btn-success">Detalii</button> </center>'
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

			<div class="col-xs-12 col-md-6">
				<h3 class="caracteristic-word">{{ trans('all.caracteristici') }}</h3>
				<ul class="descr-item">
					@if ($r->tip != 'cimp_gol')
						<li>{{ trans('all.tip') }}: {{ $r->translate(session('applocale'), $r->tip) }}</span></li>
					@endif
					@if ($r->sector == 'Alte localități')
						<li>{{ trans('all.localitate') }}: {{ $r->localitate }}</li>
						@else
							<li>{{ trans('all.sector') }}: {{ $r->translate(session('applocale'), $r->sector) }}</li>
					@endif
					@if ($r->parcare != 'cimp_gol')
						<li>{{ trans('all.parcare') }}: {{ $r->translate(session('applocale'), $r->parcare) }}</span></li>
					@endif
				</ul>
			</div>
		</div>
	</div>
@stop