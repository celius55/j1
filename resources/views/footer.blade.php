<script>
	function initMapFooter() 
	{
		var myLatlng = new google.maps.LatLng(47.036071, 28.820352);
		var mapOptions = {
		  center: myLatlng,
		  scrollwheel: false,
		  zoom: 17,
		  mapTypeId: google.maps.MapTypeId.ROADMAP
		}
		var map = new google.maps.Map(document.getElementById("map-footer"), mapOptions);

		  var image = '/public/img/map-icon-50.png';
		  var marker = new google.maps.Marker({
			position: {lat: 47.035771, lng: 28.820352 },
			map: map,
			icon: image
		  });
		  var infowindow = new google.maps.InfoWindow({
			content: '<div style="min-width: 300px; min-height: 300px;"><center> <img src="/public/img/locatie.jpg" width="200px" alt="locatie"> </center></div>'
		  });
//		  marker.addListener('mouseover', function() {
//			// infowindow.open(map, marker);
//			this.setIcon('/public/img/locatie-icon.jpg')
//		  });
//		  marker.addListener('mouseout', function() {
//			// infowindow.close(map, marker);
//			this.setIcon(image);
//		  });
		  marker.addListener('click', function() {
			window.location = '{{ url("/") }}/contacte';
		  });
	}
</script>

<div class="footer-full">
	<div class="container footer" style="margin-top: 20px; margin-bottom: 0px;">
	<hr>
		<div class="row">
			<div class="col-xd-12 col-md-12">
				<div class="col-xs-12 col-md-3 contact-footer">
                        <div class="hidden-xs">
                            <img src="/public/img/other/logo.png" class="img-responsive pull-left" alt="footer-logo" style="height: 75px;"> 

                            <div style="margin-left: 100px; margin-top: 20px;">
                                <!-- AddToAny BEGIN -->
                                <div class="center-block">
                                    <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                    <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                                    <a class="a2a_button_facebook"></a>
                                    <a class="a2a_button_odnoklassniki"></a>
                                    <a class="a2a_button_mail_ru"></a>
                                    <a class="a2a_button_google_plus"></a>
                                    </div>
                                    <script>
                                    var a2a_config = a2a_config || {};
                                    a2a_config.linkname = "Companie Imobiliară";
                                    a2a_config.linkurl = "http://diversimobil.md";
                                    </script>
                                    <script async src="https://static.addtoany.com/menu/page.js"></script>
                                </div>
                                <!-- AddToAny END -->
                            </div>
					        
                            <br>
                        </div>
					<i class="fa fa-building"></i> {{ trans('all.adresa') }} <br>
					<i class="fa fa-phone"></i> 068 611 611 <br>
					<i class="fa fa-clock-o"></i> {{ trans('all.l_v') }}: 09:00-18:00 <br>
					<i class="fa fa-clock-o"></i> {{ trans('all.simbata') }}: 09:00-13:00 <br>
					<i class="fa fa-envelope"></i> office@diversimobil.md
					
					<ul style="margin-right: -10px; list-style: none; padding-left: 0;">
						<li>
							<a href="/despre-companie">{{ trans('all.despre_companie') }}</a>
						</li>
						<li>
							<a href="/informatii-utile">{{ trans('all.informatii_utile') }}</a>
						</li>
						<li>
                            <a href="/parteneri">{{ trans('all.parteneri') }}</a>
                        </li>
					</ul>

				</div>
				<div class="hidden-xs col-md-6">
<!--					 <iframe width="100%" height="250" frameborder="0" src="https://point.md/ro/map/street/47.035739/28.820477000000018/16/697582934?q=dosoftei%20142&number=142&embed=1"></iframe> -->
					 <iframe width="100%" height="250" frameborder="0" src="https://point.md/ro/map/47.03922325251075/28.831611871719900/18/5990802566b8f50013786b6c?embed=1"></iframe>
<!--					<div id="map-footer" style="height: 250px;"></div> -->
				</div>
				<div class="hidden-xs col-md-3">
                    <!--  START: Curs.md Widget HTML 1.0--><script language="JavaScript" type="text/javascript" src="http://www.curs.md/ro/curs_provider/bfec80/180/595657"></script><noscript><a href="http://www.curs.md/ro" target="_blank"><strong>www.curs.md</strong></a></noscript>
                    <!--  END: cursmd Widget HTML 1.0-->
				</div>
			</div>

<!--
			<div class="hidden-xs col-md-12">
				<div class="col-md-4">
					<h4>{{ trans('all.vinzare') }}</h4>
					<ul style="margin-right: -10px; list-style: none;">
						<li><a href="/apartamente-vinzare">{{ trans('all.vinzare_apartamente') }}</a></li>
                        <li><a href="/case-vinzare">{{ trans('all.vinzare_case') }}</a></li>
                        <li><a href="/comerciale-vinzare">{{ trans('all.vinzare_comerciale') }}</a></li>
                        <li><a href="/industriale-vinzare">{{ trans('all.vinzare_industriale') }}</a></li>
                        <li><a href="/terenuri-vinzare">{{ trans('all.vinzare_terenuri') }}</a></li>
                        <li><a href="/garaje-vinzare">{{ trans('all.vinzare_garaje') }}</a></li>
					</ul>
				</div>

				<div class="col-md-4">
					<h4>{{ trans('all.arenda') }}</h4>
					<ul style="margin-right: -10px; list-style: none;">
						<li><a href="/apartamente-arenda">{{ trans('all.arenda_apartamente') }}</a></li>
                        <li><a href="/case-arenda">{{ trans('all.arenda_case') }}</a></li>
                        <li><a href="/comerciale-arenda">{{ trans('all.arenda_comerciale') }}</a></li>
                        <li><a href="/industriale-arenda">{{ trans('all.arenda_industriale') }}</a></li>
                        <li><a href="/terenuri-arenda">{{ trans('all.arenda_terenuri') }}</a></li>
                        <li><a href="/garaje-arenda">{{ trans('all.arenda_garaje') }}</a></li>
					</ul>
				</div>

				<div class="col-md-4">
					<h4>Companie</h4>
					<ul style="margin-right: -10px; list-style: none;">
						<li>
							<a href="/despre-companie">{{ trans('all.despre_companie') }}</a>
						</li>
						<li>
							<a href="/noutati">{{ trans('all.noutati') }}</a>
						</li>
						<li>
							<a href="/informatii-utile">{{ trans('all.informatii_utile') }}</a>
						</li>
						<li>
                            <a href="/parteneri">{{ trans('all.parteneri') }}</a>
                        </li>
                        <li>
                            <a href="/ipoteca">{{ trans('all.ipoteca') }}</a>
                        </li>
					</ul>
				</div>
			</div>
-->
		</div>
	<hr>
		<!-- <div class="col-md-12 hidden-xs">
			<div style="color: #435a06; font-weight: bold; margin-top: -10px; margin-bottom: 60px;">
				<center>
					Powered by <a href="http://www.mgwebsolutions.org" target="_blank">www.mgwebsolutions.org</a>
				</center>
			</div>
		</div> -->
	</div>

</div>

<!-- swiper -->
<script src="/public/swiper-3.4.2/js/swiper.min.js"></script>

<!-- Map location -->
    <!-- <iframe width="100%" height="330" frameborder="0" src="https://point.md/ro/map/47.03576578951728/28.82038414478302/15/58b42ae49a778b000ae4621e?embed=1"></iframe> -->
    