@extends('head')

@section('title')Complex Rezidențial - {{ $r->suprafata_totala }} (m2) - {{ $r->sector }}@endsection
@section('keywords')
	<?php 
		$res = str_replace(' ', ', ', $r->titlu_ro); 
		echo str_replace('.', ' ', $res);
	?>
@endsection
@section('description'){{ $r->titlu_ro }}@endsection

@section('content')

<script> 
	function initMap() 
	{
		var myLatlng = new google.maps.LatLng({{ $r->lat }}, {{ $r->lng }});
		var mapOptions = {
		  center: myLatlng,
		  scrollwheel: true,
		  zoom: 11,
		  mapTypeId: google.maps.MapTypeId.ROADMAP
		}
		var map = new google.maps.Map(document.getElementById("map"), mapOptions);

		  // var image = '/img/icon/{{ $r->tip }}.png';
		  var image = '/public/img/map-icon-50.png';
		  var marker{{ $r->id }} = new google.maps.Marker({
			position: {lat: {{ $r->lat }}, lng: {{ $r->lng }} },
			map: map,
			icon: image
		  });
		  var infowindow{{ $r->id }} = new google.maps.InfoWindow({
			content: '<center> <h4>Complex Rezidențial - {{ $r->suprafata_totala }} (m2) - {{ $r->sector }}</h4> <img src="/img/{{ $r->foto_1 }}?w=150&h=150&fit=crop">  <br><br> <a href="{{ url("/") }}/comercial/{{ $r->id }}" class="btn btn-success">Detalii</button> </center>'
		  });
		  marker{{ $r->id }}.addListener('click', function() {
			infowindow{{ $r->id }}.open(map, marker{{ $r->id }});
		  });
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
			</div>

			<div class="col-xs-12 col-md-6">
				<h4>{{ $r->{'titlu_'.session('applocale')} }}</h4>
				<!-- AddToAny BEGIN -->
					@include('social-btn')
				<!-- AddToAny END -->
				<ul class="descr-item" style="font-size: 16px;">
					<li><b>{{ trans('all.zona') }}:</b> {{ $r->zona }}</li>
					<li><b>{{ trans('all.tip_imobile') }}:</b> {{ $r->tip_imobile }} {{ trans('all.apartamente') }}</li>
					<li><b>{{ trans('all.stadiu') }}:</b> {{ $r->translate(session('applocale'), $r->stadiu) }}</li>
					<li><b>{{ trans('all.dezvoltator') }}:</b> {{ $r->dezvoltator }}</li>
				</ul>

				@if ( count($tip_imobil) )
					<table class="table table-bordered table-condensed table-hover table-striped" style="margin-top
					30px;">
						<tr style="background: #97b744 !important;">
							<td style="color: #fff;">{{ trans('all.tip_imobile') }}</td>
							<td style="color: #fff;" colspan="2">{{ trans('all.numar_imobile') }}</td>
							<td style="color: #fff;" colspan="2">{{ trans('all.pret_minim') }} €</td>
						</tr>

						<tr style="background: #c2dd7b; color: #353535">
							<td></td>

							<td>{{ trans('all.total') }}</td>
							<td>{{ trans('all.disponibile') }}</td>

							<td>{{ trans('all.vinzare') }}</td>
							<td>{{ trans('all.inchiriere') }}</td>
						</tr>

						@foreach ( $tip_imobil as $t )
							<tr>
								<td>{{ $t->translate(session('applocale'), $t->tip) }}, {{ $t->suprafata }} m2</td>

								<td>{{ $t->numar_imobile_total }}</td>
								<td>{{ $t->numar_imobile_disponibile }}</td>

								<td>{{ $t->pret_vinzare }}</td>
								<td>{{ $t->pret_inchiriere }}</td>
							</tr>
						@endforeach
					</table>
				@endif
			</div>

		</div> <!-- /row -->

		<div class="row">
			<div class="col-md-12">
				<div style="margin-top: 10px;">
					<!-- Nav tabs -->
					  <ul class="nav nav-tabs" role="tablist" style="font-weight: bold; font-size: 18px;">
					    <li role="presentation" class="active"><a href="#descriere" aria-controls="descriere" role="tab" data-toggle="tab">{{ trans('all.descriere') }}</a></li>
					    <li role="presentation"><a href="#schite" aria-controls="schite" role="tab" data-toggle="tab">{{ trans('all.schite') }}</a></li>
					    @if ( $r->lat != -100 )
					    	<li role="presentation"><a href="#harta" aria-controls="harta" role="tab" data-toggle="tab">{{ trans('all.harta') }}</a></li>
				    	@endif
					  </ul>

					  <!-- Tab panes -->
					  <div class="tab-content" style="padding: 0 20px;">
					    <div role="tabpanel" class="tab-pane active" id="descriere"> {!! $r->{'descrierea_'.session('applocale')} !!} </div>
					    <div role="tabpanel" class="tab-pane" id="schite">
						    @if ( $r->schite != '')
									<?php $schite = json_decode($r->schite); ?>

									@foreach ($schite as $s)
										<center>
											<img src="/img/{{ $s }}" class="img-responsive" alt="lesternau">
										</center>
									@endforeach
							@endif
					    </div>
					    <div role="tabpanel" class="tab-pane" id="harta">
					    	@if ($r->lat != '-100')
					    		<div class="col-xs-12">
									<div id="map" style="height: 500px;"></div>
								</div>
							@endif
					    </div>
					  </div>
			 	 </div>
			</div>
		</div>
	</div>
@stop