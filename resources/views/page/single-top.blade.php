	@if ( !($agent->isMobile()) )
		<div style="margin-top: 50px;"></div>
	@endif

<div class="container-fluid">
	<div class="row">
		@foreach ($result as $r)
		    @if ( !$agent->isMobile() )
              <div class="col-xs-7">
                  <h1>{{ $r->{'titlu_'.session('applocale')} }}</h1>
              </div>
              <div class="col-xs-2">
                  <div class="price">
                      <h1>{{ number_format($r->pret, 0, '', ' ') }} €</h1>
                  </div>
              </div>
              <div class="col-xs-3">
                  <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=59903c81e2587a001253a11b&product=inline-share-buttons"></script>
                  <h1><div class="sharethis-inline-share-buttons"></div></h1>
              </div>

              <div class="col-xs-12">
                  <div class="title-separator-primary"></div><br>
              </div>
            @endif
			
			@if ( $agent->isMobile() )
			    <div class="col-xs-12">
			        <h1 style="font-size: 25px;">{{ $r->{'titlu_'.session('applocale')} }}</h1>
			    </div>
			    
			    <div class="col-xs-12">
			        <div class="price" style="margin-top: -25px; float: right;">
                      <h1 style="font-size: 25px;">{{ number_format($r->pret, 0, '', ' ') }} €</h1>
                    </div>
			    </div>
			@endif
			
			<div class="col-xs-12 col-md-6" style="margin-left: -30px;">
				
				@if ( $agent->isMobile() )
				    <style>
                        .swiper-slide {
                            width: 100% !important;
                        }
                    </style>
				
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

				@if ( !$agent->isMobile() )
					<div class="popup-gallery">
						@if ( $r->foto_1 != '')
							<div class="col-xs-12" style="margin-bottom: 20px;"> 
								<a href="/img/{{ $r->foto_1 }}"><img src="/img/{{ $r->foto_1 }}?w=535&h=320&fit=crop" class=""></a>
							</div>
							
							<div class="images-thumbs-center center-block">
						@endif
						
                                @if ( $r->foto_2 != '')
                                    <?php $multiple_photo = json_decode($r->foto_2); ?>

                                    <div class="swiper-button-prev"></div>
                                    
                                    <div class="swiper-container slide-images">
                                        <div class="swiper-wrapper">
                                            @foreach ($multiple_photo as $m)
                                                <div class="swiper-slide slide-margin">
                <!--								<div class="icon-gallery">-->
                                                    <a href="/img/{{ $m }}" ><img src="/img/{{ $m }}?w=62&h=62&fit=crop"></a>
                <!--								</div>-->
                                                </div>
                                            @endforeach
                                        </div>
                                        <!-- Add Pagination -->
                                        <div class="swiper-pagination"></div>
                                        <!-- Add Arrows -->
                                    </div>

                                    <div class="swiper-button-next"></div>
                                @endif
							</div>
					</div>
				@endif
				
				@if ( !$agent->isMobile() )
                  @if ( ($r->nume_contact == '' && $r->nume_agent != '') || ($r->nume_contact != '' && $r->nume_agent == '') )
                    <div class="col-xs-12" style="margin-top: 30px;">
                        <div class="col-xs-6 nume-contact">
                            <i class="fa fa-user circle-icon"></i> {{ $r->nume_contact }} {{ $r->nume_agent }}
                        </div>
                        <div class="col-xs-6">
                            <div class="mobile-number">
                                <a href="tel:+{{ $r->mobile }}">
                                    <i class="fa fa-phone circle-icon"></i> {{ $r->mobile }} {{ $r->mobil_agent }}
                                </a>
                            </div>
                        </div>
                    </div>
                  @endif
				@endif
				
				@if ( $agent->isMobile() )
                    <br>
                    
                    @if ( $r->nume_contact != '' )
                        <div class="col-xs-4 nume-contact" style="padding-left: 32px;">
                            <i class="fa fa-user circle-icon"></i>
                        </div>
                        <div class="col-xs-8">
                            {{ $r->nume_contact }}
                        </div>
                        
                        <br><br><br>
                    @endif
                    
                    <div class="mobile-number col-xs-12">
                        <a href="tel:+{{ $r->mobile }}">
                            <div class="col-xs-4">
                                <i class="fa fa-phone circle-icon"></i> 
                            </div>
                            <div class="col-xs-8">
                                {{ $r->mobile }}
                            </div>
                        </a>
                    </div>
                    <br><br><br>
                @endif
				    
				@if ($r->video != '')
					<div class="col-xs-12 text-center" style="margin-top: 10px;">
						{!! $r->video !!}
					</div>
				@endif
                
                @if ( !$agent->isMobile() )
                  @if ($r->lat != '-100')
                      <!-- google maps key -->
                      <script async defer
                        src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAfZy_6KnRgHNX11SAnfPkhxBf4FcUOSPs&callback=initMap">
                      </script>
                      <!-- //google maps key -->

                      <div class="col-xs-12" style="margin-top: 25px;">
                          <div class="map-container">
                              <div id="map" style="height: 500px; width: 100%;"></div>
                          </div>
                      </div>
                  @endif

                  @if ($r->lat == '-100')
                      <!-- google maps key -->
                      <script async defer
                        src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAfZy_6KnRgHNX11SAnfPkhxBf4FcUOSPs&callback=initMapSingle">
                      </script>
                      <!-- google maps key -->
                      <script>
                      function initMapSingle() 
                      {
                          var myLatlng = new google.maps.LatLng(47.036071, 28.820352);
                          var mapOptions = {
                            center: myLatlng,
                            scrollwheel: false,
                            zoom: 10,
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                          }
                          var map = new google.maps.Map(document.getElementById("map"), mapOptions);
                      }
                      </script>
                      <div class="col-xs-12" style="margin-top: 25px;">
                          <div class="map-container">
                              <div id="map" style="height: 500px; width: 100%;"></div>
                          </div>
                      </div>
                  @endif
                @endif
			</div>
		@endforeach