@extends('head')

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
			content: '<center> <h4>Apartament - {{ $r->numar_de_camere }} @if ($r->numar_de_camere == 1) cameră @else camere @endif  - {{ $r->sector }}</h4> <img src="{{ $r->foto_1 }}" height="150px" width="150px">  <br><br> <a href="{{ url("/") }}/apartament/{{ $r->id }}" class="btn btn-success">Detalii</button> </center>'
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
		
	@if ( !($agent->isMobile()) )
		<div style="margin-top: 50px;"></div>
	@endif

	<div class="container">
		<div class="row">
			@foreach ($result as $r)
				<div class="col-xs-12 col-md-6">

					<h4>{{ trans('all.galerie') }}</h4>

					@if ( $agent->isMobile() )
						<div class="swiper-container">
					        <div class="swiper-wrapper">
					        	@if ( $r->foto_2 != '')
									<?php $multiple_photo = json_decode($r->foto_2); ?>

									@foreach ($multiple_photo as $m)
										<div class="swiper-slide">
											<img src="/img/{{ $m }}?w=535&h=320&fit=crop" class="img-responsive" alt="lesternau">
										</div>
									@endforeach
								@endif
					        </div>
					        <!-- Add Pagination -->
					        <div class="swiper-pagination"></div>
					    </div>
				    @endif

				    @if ( !($agent->isMobile()) )
						<div class="popup-gallery">
							@if ( $r->foto_1 != '')
								<div class="col-xs-12"> 
									<a href="/img/{{ $r->foto_1 }}"><img src="/img/{{ $r->foto_1 }}?w=535&h=320&fit=crop" class="img-thumbnail"></a>
								</div>
								<div class="images-thumbs-center">
							@endif
							
							@if ( $r->foto_2 != '')
								<?php $multiple_photo = json_decode($r->foto_2); ?>

								@foreach ($multiple_photo as $m)
									<div class="icon-gallery">
										<a href="/img/{{ $m }}" ><img src="/img/{{ $m }}?w=62&h=62&fit=crop"></a>
									</div>
								@endforeach
							@endif
								</div>
						</div>
					@endif

					@if ($r->video != '')
						<div class="col-xs-12">
							<h4>Video</h4>
							{!! $r->video !!}
						</div>
					@endif
					
					@if ($r->lat != '-100')
						<div class="col-xs-12">
							<h4>{{ trans('all.locatia') }}</h4>
							<div id="map" style="height: 500px;"></div>
						</div>
					@endif
				</div>
			@endforeach

			<div class="col-xs-6">
				<h4>{{ $r->{'titlu_'.session('applocale')} }}</h4>
				<!-- AddToAny BEGIN -->
					@include('social-btn')
				<!-- AddToAny END -->
				<ul class="descr-item">
					<li>{{ trans('all.tip') }}: {{ $r->translate(session('applocale'), $r->tip) }}</li>
					<li>{{ trans('all.suprafata_totala') }} (m2): {{ $r->suprafata_totala }}</li>
					<li>{{ trans('all.starea') }}: {{ $r->translate(session('applocale'), $r->starea) }}</li>
					@if ($r->sector == 'Alte localități')
						<li>{{ trans('all.localitate') }}: {{ $r->localitate }}</li>
						@else
							<li>{{ trans('all.sector') }}: {{ $r->translate(session('applocale'), $r->sector) }}</li>
					@endif
				</ul>
				<div class="price">
					<span style="color: #333;">{{ trans('all.pret') }}:</span> {{ number_format($r->pret, 0, '', ' ') }} €
				</div>

				<h4>{{ trans('all.descrierea') }}</h4>
				<div class="description">
					{!! $r->{'descrierea_'.session('applocale')} !!}
				</div>
			</div>
		</div>
	</div>
@stop