<script>
$(document).ready(function() {
    // Swiper gallery images 
    var swiper = new Swiper('.swiper-container', {
//	    pagination: '.swiper-pagination',
//	    paginationClickable: true,
//	    loop: true,
//	    autoplay: 3000
    });

    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 5,
        width: 400,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
    });
    
	// sticky header
	var fixmeTop = $('.full-header').offset().top;
	$(window).scroll(function() {
		var currentScroll = $(window).scrollTop();
//		if (currentScroll >= fixmeTop && currentScroll > 0 ) {
		if (currentScroll > 0 ) {
			$('#top-header').fadeOut();
//			$('#top-header').slideDown();
			$('#full-header').addClass('full-header-sticky');
			$('#full-header').find('img[alt="logo-diversimobil"]').hide();
			$('.navbar-full-header-class').addClass('navbar-full-header-sticky');
			$('#full-header').find('img[alt="basket-star"]').attr('src','/public/img/basket-star-2.png');
			$('ul.top-icon-circle > li').addClass('li-black');
			$('ul.top-icon-circle > li > a').addClass('black');
			
//			$('ul.navbar-full-header > li > a').attr('style','color: #000 !important');
		} else {
			$('#top-header').show();
			$('#full-header').removeClass('full-header-sticky');
			$('#full-header').find('img[alt="logo-diversimobil"]').show();
			$('.navbar-full-header-class').removeClass('navbar-full-header-sticky');
			$('#full-header').find('img[alt="basket-star"]').attr('src','/public/img/basket-star.png');
			$('ul.top-icon-circle > li').removeClass('li-black');
			$('ul.top-icon-circle > li > a').removeClass('black');
			
//			$('ul.navbar-full-header > li > a').attr('style','color: #fff !important');
		}
	});
	
	$('.mobile-search-btn-top').on('click', function() {
		$('html, body').animate({
	        scrollTop: $("#cautare-avansata").offset().top - 100
	    });
	});
	$('.mobile-top-btn').on('click', function() {
		$('html, body').animate({
	        scrollTop: 0
	    }, 2000);
	});
});

function check_item(name) {
	if ( $('input[name='+name+']').prop('checked') == false ) {
		$('input[name='+name+']').prop('checked', true);
	} else { 
		$('input[name='+name+']').prop('checked', false);
	}
}

function apartamente() 
{
	$('#anunturi').empty();
	$('.load-icon').show();
	var searializeData = $('form').serialize();	
	$.ajax({
		url: '/search-post',
		type: 'post',
		dataType: 'json',
		data: searializeData,
		success: function(res) {

			$('#map').empty();
			initMap2();

			function initMap2() 
			{
				$.each(res, function() {
					$.each(this, function(key, value) {
						window.lat1 = parseFloat(value.lat);
						window.lng1 = parseFloat(value.lng);
					});
				});

				var myLatlng = new google.maps.LatLng(lat1, lng1);
				var mapOptions = {
				  center: myLatlng,
				  scrollwheel: true,
				  zoom: 11,
				  mapTypeId: google.maps.MapTypeId.ROADMAP
				}
				var map = new google.maps.Map(document.getElementById("map"), mapOptions);

				$.each(res, function() {
					$.each(this, function(key, value) {
						  
						  var image = '/public/img/map-icon-50.png';
						  
						  var get_lat = parseFloat(value.lat);
						  var get_lng = parseFloat(value.lng);
						  window['marker'+value.id] = new google.maps.Marker({
							position: {lat: get_lat, lng: get_lng },
							map: map,
							icon: image
						  });
						  window['infowindow'+value.id] = new google.maps.InfoWindow({
							content: '<center> <h4>Apartament - '+value.numar_de_camere+' camere - '+value.sector+' </h4> <img src="/img/'+value.foto_1+'?w=175&h=120&fit=crop">  <br><br> <a href="{{ url("/") }}/apartament/'+value.id+'" class="btn btn-success">Detalii</button> </center>'
						  });
						  window['marker'+value.id].addListener('click', function() {
							window['infowindow'+value.id].open(map, window['marker'+value.id]);
						  });
					});
				});
			}

			var i=0; 
			$.each(res, function() {
				$.each(this, function(key, value) {
					i++;
					if (i==3) {
						$('#anunturi').prepend(`
							<center>
								<img src="/public/img/baner-anunt.jpg" class="img-responsive baner-anunt">
							</center>
						`);
					}
					$('#anunturi').prepend(`
						<div class="col-xs-12 col-md-12 anunt-bloc">
							<div class="col-xs-12 col-md-3">
								<a href="/apartament/`+value.id+`" target="_blank">
									<img src="/img/`+value.foto_1+`?w=175&h=120&fit=crop" class="img-responsive img-thumbnail">
								</a>
							</div>
							<div class="col-xs-12 col-md-6">
								@if (session('applocale') == 'ro')
									<a href="/apartament/`+value.id+`" class="title-href" target="_blank"> <h4>`+value.titlu_ro+`</h4> </a>
								@endif
								@if (session('applocale') == 'ru')
									<a href="/apartament/`+value.id+`" class="title-href" target="_blank"> <h4>`+value.titlu_ru+`</h4> </a>
								@endif
								<ul class="descr-short">
									<div class="col-xs-12 col-md-6">
										<li>Tip: <span class="descr-short-color"> `+value.tip+` </span></li>
										<li>Număr de camere: <span class="descr-short-color"> `+value.numar_de_camere+` </span></li>
										<li>Nivelul: <span class="descr-short-color"> `+value.nivelul+` </span></li>
									</div>
									<div class="col-xs-12 col-md-6">
										<li>Suprafața totală: <span class="descr-short-color"> `+value.suprafata_totala+` m2</span></li>
										<li>Starea: <span class="descr-short-color"> `+value.starea+` </span></li>
										<li>Sector: <span class="descr-short-color"> `+value.sector+` </span></li>
									</div>
								</ul>
							</div>
							<div class="col-xs-12 col-md-3 price">
								`+value.pret+` €
								<br>
								<a href="/apartament/`+value.id+`" target="_blank" class="btn btn-default" style="width: 100%; color: #368429;"><i class="fa fa-info-circle"></i> Detalii</a>
								<i class="fa fa-star-o" id="`+value.id+`" onclick="star( `+value.id+`, '`+value.category+`')"> </i>

							</div>
						</div>
					`).show('slow');
				});
			});
			$('.load-icon').hide();
		}
	});
}

function case_si_vile() {
	$('#anunturi').empty();
	$('.load-icon').show();
	var searializeData = $('form').serialize();	
	$.ajax({
		url: '/search-post',
		type: 'post',
		dataType: 'json',
		data: searializeData,
		success: function(res) {

			$('#map').empty();
			initMap2();

			function initMap2() 
			{
				$.each(res, function() {
					$.each(this, function(key, value) {
						window.lat1 = parseFloat(value.lat);
						window.lng1 = parseFloat(value.lng);
					});
				});

				var myLatlng = new google.maps.LatLng(lat1, lng1);
				var mapOptions = {
				  center: myLatlng,
				  scrollwheel: true,
				  zoom: 11,
				  mapTypeId: google.maps.MapTypeId.ROADMAP
				}
				var map = new google.maps.Map(document.getElementById("map"), mapOptions);

				$.each(res, function() {
					$.each(this, function(key, value) {
						  
						  var image = '/public/img/map-icon-50.png';
						  
						  var get_lat = parseFloat(value.lat);
						  var get_lng = parseFloat(value.lng);
						  window['marker'+value.id] = new google.maps.Marker({
							position: {lat: get_lat, lng: get_lng },
							map: map,
							icon: image
						  });
						  window['infowindow'+value.id] = new google.maps.InfoWindow({
							content: '<center> <h4>Casa - '+value.numar_de_camere+' camere - '+value.sector+' </h4> <img src="/img/'+value.foto_1+'?w=175&h=120&fit=crop">  <br><br> <a href="{{ url("/") }}/casa/'+value.id+'" class="btn btn-success">Detalii</button> </center>'
						  });
						  window['marker'+value.id].addListener('click', function() {
							window['infowindow'+value.id].open(map, window['marker'+value.id]);
						  });
					});
				});
			}

			var i=0;
			$.each(res, function() {
				$.each(this, function(key, value) {
					i++;
					if (i==3) {
						$('#anunturi').prepend(`
							<center>
								<img src="/public/img/baner-anunt.jpg" class="img-responsive baner-anunt">
							</center>
						`);
					}
					$('#anunturi').prepend(`
						<div class="col-xs-12 col-md-12 anunt-bloc">
							<div class="col-xs-12 col-md-3">
								<a href="/casa/`+value.id+`" target="_blank">
									<img src="/img/`+value.foto_1+`?w=175&h=120&fit=crop" class="img-responsive img-thumbnail">
								</a>
							</div>
							<div class="col-xs-12 col-md-6">
								@if (session('applocale') == 'ro')
									<a href="/casa/`+value.id+`" target="_blank" class="title-href"> <h4>`+value.titlu_ro+`</h4> </a>
								@endif
								@if (session('applocale') == 'ru')
									<a href="/casa/`+value.id+`" target="_blank" class="title-href"> <h4>`+value.titlu_ru+`</h4> </a>
								@endif
								<ul class="descr-short">
									<div class="col-xs-12 col-md-6">
									<li>Tip: <span class="descr-short-color"> `+value.tip+` </span></li>
									<li>Număr de camere: <span class="descr-short-color"> `+value.numar_de_camere+` </span></li>
									<li>Suprafața terenului: <span class="descr-short-color"> `+value.suprafata_terenului+` </span></li>
									</div>
									<div class="col-xs-12 col-md-6">
									<li>Suprafața totală: <span class="descr-short-color"> `+value.suprafata_totala+` m2</span></li>
									<li>Starea: <span class="descr-short-color"> `+value.starea+` </span></li>
									<li>Sector: <span class="descr-short-color"> `+value.sector+` </span></li>
									</div>
								</ul>
							</div>
							<div class="col-xs-12 col-md-3 price">
								`+value.pret+` €
								<br>
								<a href="/casa/`+value.id+`" target="_blank" class="btn btn-default" style="width: 100%; color: #368429;"><i class="fa fa-info-circle"></i> Detalii</a>
								<i class="fa fa-star-o" id="`+value.id+`" onclick="star( `+value.id+`, '`+value.category+`')"> </i>
							</div>
						</div>
					`).show('slow');
				});
			});
			$('.load-icon').hide();
		}
	});
}

function spatii_comerciale() {
	$('#anunturi').empty();
	$('.load-icon').show();
	var searializeData = $('form').serialize();	
	$.ajax({
		url: '/search-post',
		type: 'post',
		dataType: 'json',
		data: searializeData,
		success: function(res) {

			$('#map').empty();
			initMap2();

			function initMap2() 
			{
				$.each(res, function() {
					$.each(this, function(key, value) {
						window.lat1 = parseFloat(value.lat);
						window.lng1 = parseFloat(value.lng);
					});
				});

				var myLatlng = new google.maps.LatLng(lat1, lng1);
				var mapOptions = {
				  center: myLatlng,
				  scrollwheel: true,
				  zoom: 11,
				  mapTypeId: google.maps.MapTypeId.ROADMAP
				}
				var map = new google.maps.Map(document.getElementById("map"), mapOptions);

				$.each(res, function() {
					$.each(this, function(key, value) {
						  
						  var image = '/public/img/map-icon-50.png';
						  
						  var get_lat = parseFloat(value.lat);
						  var get_lng = parseFloat(value.lng);
						  window['marker'+value.id] = new google.maps.Marker({
							position: {lat: get_lat, lng: get_lng },
							map: map,
							icon: image
						  });
						  window['infowindow'+value.id] = new google.maps.InfoWindow({
							content: '<center> <h4>Comercial - '+value.suprafata_totala+' (m2) - '+value.sector+' </h4> <img src="/img/'+value.foto_1+'?w=175&h=120&fit=crop">  <br><br> <a href="{{ url("/") }}/comercial/'+value.id+'" class="btn btn-success">Detalii</button> </center>'
						  });
						  window['marker'+value.id].addListener('click', function() {
							window['infowindow'+value.id].open(map, window['marker'+value.id]);
						  });
					});
				});
			}

			var i=0;
			$.each(res, function() {
				$.each(this, function(key, value) {
					i++;
					if (i==3) {
						$('#anunturi').prepend(`
							<center>
								<img src="/public/img/baner-anunt.jpg" class="img-responsive baner-anunt">
							</center>
						`);
					}
					$('#anunturi').prepend(`
						<div class="col-xs-12 col-md-12 anunt-bloc">
							<div class="col-xs-12 col-md-3">
								<a href="/comercial/`+value.id+`" target="_blank">
									<img src="/img/`+value.foto_1+`?w=175&h=120&fit=crop" class="img-responsive img-thumbnail">
								</a>
							</div>
							<div class="col-xs-12 col-md-6">
								@if (session('applocale') == 'ro')
									<a href="/comercial/`+value.id+`" target="_blank" class="title-href"> <h4>`+value.titlu_ro+`</h4> </a>
								@endif
								@if (session('applocale') == 'ru')
									<a href="/comercial/`+value.id+`" target="_blank" class="title-href"> <h4>`+value.titlu_ru+`</h4> </a>
								@endif
								<ul class="descr-short">
									<div class="col-xs-12 col-md-6">
									<li>Tip: <span class="descr-short-color"> `+value.tip+` </span></li>
									<li>Bloc sanitar: <span class="descr-short-color"> `+value.bloc_sanitar+` </span></li>
									<li>Nivelul: <span class="descr-short-color"> `+value.nivelul+` </span></li>
									</div>
									<div class="col-xs-12 col-md-6">
									<li>Suprafața totală: <span class="descr-short-color"> `+value.suprafata_totala+` m2</span></li>
									<li>Starea: <span class="descr-short-color"> `+value.starea+` </span></li>
									<li>Sector: <span class="descr-short-color"> `+value.sector+` </span></li>
									</div>
								</ul>
							</div>
							<div class="col-xs-12 col-md-3 price">
								`+value.pret+` €
								<br>
								<a href="/comercial/`+value.id+`" target="_blank" class="btn btn-default" style="width: 100%; color: #368429;"><i class="fa fa-info-circle"></i> Detalii</a>
								<i class="fa fa-star-o" id="`+value.id+`" onclick="star( `+value.id+`, '`+value.category+`')"> </i>
							</div>
						</div>
					`).show('slow');
				});
			});
			$('.load-icon').hide();
		}
	});
}

function spatii_industriale() {
	$('#anunturi').empty();
	$('.load-icon').show();
	var searializeData = $('form').serialize();	
	$.ajax({
		url: '/search-post',
		type: 'post',
		dataType: 'json',
		data: searializeData,
		success: function(res) {

			$('#map').empty();
			initMap2();

			function initMap2() 
			{
				$.each(res, function() {
					$.each(this, function(key, value) {
						window.lat1 = parseFloat(value.lat);
						window.lng1 = parseFloat(value.lng);
					});
				});

				var myLatlng = new google.maps.LatLng(lat1, lng1);
				var mapOptions = {
				  center: myLatlng,
				  scrollwheel: true,
				  zoom: 11,
				  mapTypeId: google.maps.MapTypeId.ROADMAP
				}
				var map = new google.maps.Map(document.getElementById("map"), mapOptions);

				$.each(res, function() {
					$.each(this, function(key, value) {
						  
						  var image = '/public/img/map-icon-50.png';
						  
						  var get_lat = parseFloat(value.lat);
						  var get_lng = parseFloat(value.lng);
						  window['marker'+value.id] = new google.maps.Marker({
							position: {lat: get_lat, lng: get_lng },
							map: map,
							icon: image
						  });
						  window['infowindow'+value.id] = new google.maps.InfoWindow({
							content: '<center> <h4>Industrial - '+value.suprafata_totala+' (m2) - '+value.sector+' </h4> <img src="/img/'+value.foto_1+'?w=175&h=120&fit=crop">  <br><br> <a href="{{ url("/") }}/industrial/'+value.id+'" class="btn btn-success">Detalii</button> </center>'
						  });
						  window['marker'+value.id].addListener('click', function() {
							window['infowindow'+value.id].open(map, window['marker'+value.id]);
						  });
					});
				});
			}

			var i=0;
			$.each(res, function() {
				$.each(this, function(key, value) {
					i++;
					if (i==3) {
						$('#anunturi').prepend(`
							<center>
								<img src="/public/img/baner-anunt.jpg" class="img-responsive baner-anunt">
							</center>
						`);
					}
					$('#anunturi').prepend(`
						<div class="col-xs-12 col-md-12 anunt-bloc">
							<div class="col-xs-12 col-md-3">
								<a href="/industrial/`+value.id+`" target="_blank">
									<img src="/img/`+value.foto_1+`?w=175&h=120&fit=crop" class="img-responsive img-thumbnail">
								</a>
							</div>
							<div class="col-xs-12 col-md-6">
								@if (session('applocale') == 'ro')
									<a href="/industrial/`+value.id+`" target="_blank" class="title-href"> <h4>`+value.titlu_ro+`</h4> </a>
								@endif
								@if (session('applocale') == 'ru')
									<a href="/industrial/`+value.id+`" target="_blank" class="title-href"> <h4>`+value.titlu_ru+`</h4> </a>
								@endif
								<ul class="descr-short">
									<div class="col-xs-12 col-md-6">
									<li>Tip: <span class="descr-short-color"> `+value.tip+` </span></li>
									<li>Bloc sanitar: <span class="descr-short-color"> `+value.bloc_sanitar+` </span></li>
									<li>Nivelul: <span class="descr-short-color"> `+value.nivelul+` </span></li>
									</div>
									<div class="col-xs-12 col-md-6">
									<li>Suprafața totală: <span class="descr-short-color"> `+value.suprafata_totala+` m2</span></li>
									<li>Starea: <span class="descr-short-color"> `+value.starea+` </span></li>
									<li>Sector: <span class="descr-short-color"> `+value.sector+` </span></li>
									</div>
								</ul>
							</div>
							<div class="col-xs-12 col-md-3 price">
								`+value.pret+` €
								<br>
								<a href="/industrial/`+value.id+`" target="_blank" class="btn btn-default" style="width: 100%; color: #368429;"><i class="fa fa-info-circle"></i> Detalii</a>
								<i class="fa fa-star-o" id="`+value.id+`" onclick="star( `+value.id+`, '`+value.category+`')"> </i>
							</div>
						</div>
					`).show('slow');
				});
			});
			$('.load-icon').hide();
		}
	});
}

function terenuri() {
	$('#anunturi').empty();
	$('.load-icon').show();
	var searializeData = $('form').serialize();	
	$.ajax({
		url: '/search-post',
		type: 'post',
		dataType: 'json',
		data: searializeData,
		success: function(res) {

			$('#map').empty();
			initMap2();

			function initMap2() 
			{
				$.each(res, function() {
					$.each(this, function(key, value) {
						window.lat1 = parseFloat(value.lat);
						window.lng1 = parseFloat(value.lng);
					});
				});

				var myLatlng = new google.maps.LatLng(lat1, lng1);
				var mapOptions = {
				  center: myLatlng,
				  scrollwheel: true,
				  zoom: 11,
				  mapTypeId: google.maps.MapTypeId.ROADMAP
				}
				var map = new google.maps.Map(document.getElementById("map"), mapOptions);

				$.each(res, function() {
					$.each(this, function(key, value) {
						  
						  var image = '/public/img/map-icon-50.png';
						  
						  var get_lat = parseFloat(value.lat);
						  var get_lng = parseFloat(value.lng);
						  window['marker'+value.id] = new google.maps.Marker({
							position: {lat: get_lat, lng: get_lng },
							map: map,
							icon: image
						  });
						  window['infowindow'+value.id] = new google.maps.InfoWindow({
							content: '<center> <h4>Teren - '+value.suprafata_terenului+' (ari) - '+value.sector+' </h4> <img src="/img/'+value.foto_1+'?w=175&h=120&fit=crop">  <br><br> <a href="{{ url("/") }}/teren/'+value.id+'" class="btn btn-success">Detalii</button> </center>'
						  });
						  window['marker'+value.id].addListener('click', function() {
							window['infowindow'+value.id].open(map, window['marker'+value.id]);
						  });
					});
				});
			}

			var i=0;
			$.each(res, function() {
				$.each(this, function(key, value) {
					i++;
					if (i==3) {
						$('#anunturi').prepend(`
							<center>
								<img src="/public/img/baner-anunt.jpg" class="img-responsive baner-anunt">
							</center>
						`);
					}
					$('#anunturi').prepend(`
						<div class="col-xs-12 col-md-12 anunt-bloc">
							<div class="col-xs-12 col-md-3">
								<a href="/teren/`+value.id+`" target="_blank">
									<img src="/img/`+value.foto_1+`?w=175&h=120&fit=crop" class="img-responsive img-thumbnail">
								</a>
							</div>
							<div class="col-xs-12 col-md-6">
								@if (session('applocale') == 'ro')
									<a href="/teren/`+value.id+`" target="_blank" class="title-href"> <h4>`+value.titlu_ro+`</h4> </a>
								@endif
								@if (session('applocale') == 'ru')
									<a href="/teren/`+value.id+`" target="_blank" class="title-href"> <h4>`+value.titlu_ru+`</h4> </a>
								@endif
								<ul class="descr-short">
									<div class="col-xs-12 col-md-6">
									<li>Tip: <span class="descr-short-color"> `+value.tip+` </span></li>
									<li>Modul de folosință: <span class="descr-short-color"> `+value.modul_de_folosinta+` </span></li>
									<li>Rețele inginerești: <span class="descr-short-color"> `+value.retele_ingineresti+` </span></li>
									</div>
									<div class="col-xs-12 col-md-6">
									<li>Suprafața terenului: <span class="descr-short-color"> `+value.suprafata_terenului+` m2</span></li>
									<li>Sector: <span class="descr-short-color"> `+value.sector+` </span></li>
									</div>
								</ul>
							</div>
							<div class="col-xs-12 col-md-3 price">
								`+value.pret+` €
								<br>
								<a href="/teren/`+value.id+`" target="_blank" class="btn btn-default" style="width: 100%; color: #368429;"><i class="fa fa-info-circle"></i> Detalii</a>
								<i class="fa fa-star-o" id="`+value.id+`" onclick="star( `+value.id+`, '`+value.category+`')"> </i>
							</div>
						</div>
					`).show('slow');
				});
			});
			$('.load-icon').hide();
		}
	});
}

function garaje() {
	$('#anunturi').empty();
	$('.load-icon').show();
	var searializeData = $('form').serialize();	
	$.ajax({
		url: '/search-post',
		type: 'post',
		dataType: 'json',
		data: searializeData,
		success: function(res) {

			$('#map').empty();
			initMap2();

			function initMap2() 
			{
				$.each(res, function() {
					$.each(this, function(key, value) {
						window.lat1 = parseFloat(value.lat);
						window.lng1 = parseFloat(value.lng);
					});
				});

				var myLatlng = new google.maps.LatLng(lat1, lng1);
				var mapOptions = {
				  center: myLatlng,
				  scrollwheel: true,
				  zoom: 11,
				  mapTypeId: google.maps.MapTypeId.ROADMAP
				}
				var map = new google.maps.Map(document.getElementById("map"), mapOptions);

				$.each(res, function() {
					$.each(this, function(key, value) {
						  
						  var image = '/public/img/map-icon-50.png';
						  
						  var get_lat = parseFloat(value.lat);
						  var get_lng = parseFloat(value.lng);
						  window['marker'+value.id] = new google.maps.Marker({
							position: {lat: get_lat, lng: get_lng },
							map: map,
							icon: image
						  });
						  window['infowindow'+value.id] = new google.maps.InfoWindow({
							content: '<center> <h4>Garaj - '+value.parcare+' - '+value.sector+' </h4> <img src="/img/'+value.foto_1+'?w=175&h=120&fit=crop">  <br><br> <a href="{{ url("/") }}/garaj/'+value.id+'" class="btn btn-success">Detalii</button> </center>'
						  });
						  window['marker'+value.id].addListener('click', function() {
							window['infowindow'+value.id].open(map, window['marker'+value.id]);
						  });
					});
				});
			}

			var i=0;
			$.each(res, function() {
				$.each(this, function(key, value) {
					i++;
					if (i==3) {
						$('#anunturi').prepend(`
							<center>
								<img src="/public/img/baner-anunt.jpg" class="img-responsive baner-anunt">
							</center>
						`);
					}
					$('#anunturi').prepend(`
						<div class="col-xs-12 col-md-12 anunt-bloc">
							<div class="col-xs-12 col-md-3">
								<a href="/garaj/`+value.id+`" target="_blank">
									<img src="/img/`+value.foto_1+`?w=175&h=120&fit=crop" class="img-responsive img-thumbnail">
								</a>
							</div>
							<div class="col-xs-12 col-md-6">
								@if (session('applocale') == 'ro')
									<a href="/garaj/`+value.id+`" target="_blank" class="title-href"> <h4>`+value.titlu_ro+`</h4> </a>
								@endif
								@if (session('applocale') == 'ru')
									<a href="/garaj/`+value.id+`" target="_blank" class="title-href"> <h4>`+value.titlu_ru+`</h4> </a>
								@endif
								<ul class="descr-short">
									<div class="col-xs-12 col-md-6">
									<li>Tip: <span class="descr-short-color"> `+value.tip+` </span></li>
									<li>Sector: <span class="descr-short-color"> `+value.sector+` </span></li>
									<li>Parcare: <span class="descr-short-color"> `+value.parcare+` </span></li>
									</div>
									<div class="col-xs-12 col-md-6">
									</div>
								</ul>
							</div>
							<div class="col-xs-12 col-md-3 price">
								`+value.pret+` €
								<br>
								<a href="/garaj/`+value.id+`" target="_blank" class="btn btn-default" style="width: 100%; color: #368429;"><i class="fa fa-info-circle"></i> Detalii</a>
								<i class="fa fa-star-o" id="`+value.id+`" onclick="star( `+value.id+`, '`+value.category+`')"> </i>
							</div>
						</div>
					`).show('slow');
				});
			});
			$('.load-icon').hide();
		}
	});
}

function deleteStarBox(category, id) {
	$('div#'+category+''+id).parent().remove();

	$.ajax({
		url: '/star',
		type: 'get',
		dataType: 'json',
		data: {
			category: category,
			id: id,
			delete_star: 'yes'
		},
		success: function() {
			var count_star = $('.star-box-delete').length;
			$('.badge-star').empty().prepend(count_star);
			
			if (window.location.href.indexOf(category) > -1) {
				this['star'+id] = 2;
				$('#star'+id).removeClass('fa-star');
				$('#star'+id).addClass('fa-star-o');
			}
		}
	});
}

function star(id, category) {
	if (this['star'+id] == 1) {
		//unselected
		$('#star'+id).removeClass('fa-star');
		$('#star'+id).addClass('fa-star-o');
		this['star'+id] = 2;
		deleteStarBox(category, id);
	} else {
		//selected
		$('#star'+id).removeClass('fa-star-o');
		$('#star'+id).addClass('fa-star');
		this['star'+id] = 1;

		$.ajax({
			url: '/star',
			type: 'get',
			dataType: 'json',
			data: {
				id: id,
				category: category
			}, 
			success: function(res) {
				$('#star-box-element').empty();
				$.each(res, function() {
					$.each(this, function(key, value) {
						// Apartamente
						if (value.category == 'apartamente') {
							$('#star-box-element').append(`
								<div style="float: left">
									<div class="star-box-delete" id="`+value.category+``+value.id+`" onclick="deleteStarBox('`+value.category+`', `+value.id+`)">
										<i class="fa fa-close"></i>
									</div>
									<a href="/apartament/`+value.id+`">
										<div class="star-box-img">
											<img src="/img/`+value.foto_1+`?w=70&h=50&fit=crop">
										</div>

										<div class="star-box-content-block">
											<div class="star-box-title">
												Apartament - `+value.numar_de_camere+` camere - `+value.sector+`
											</div>
											<div class="star-box-content">
												Suprafața totală `+value.suprafata_totala+` (m2)
											</div>
											<div class="star-box-price">
												`+value.pret+` €
											</div>
										</div>
									</a>
								</div>
						`);
						}
						// Case
						if (value.category == 'case') {
							$('#star-box-element').append(`
								<div style="float: left">
									<div class="star-box-delete" id="`+value.category+``+value.id+`" onclick="deleteStarBox('`+value.category+`', `+value.id+`)">
										<i class="fa fa-close"></i>
									</div>
									<a href="/casa/`+value.id+`">
										<div class="star-box-img">
											<img src="/img/`+value.foto_1+`?w=70&h=50&fit=crop">
										</div>

										<div class="star-box-content-block">
											<div class="star-box-title">
												Casă - `+value.numar_de_camere+` camere - `+value.sector+`
											</div>
											<div class="star-box-content">
												Suprafața totală `+value.suprafata_totala+` (m2)
											</div>
											<div class="star-box-price">
												`+value.pret+` €
											</div>
										</div>
									</a>
								</div>
						`);
						}
						// Comerciale
						if (value.category == 'comerciale') {
							$('#star-box-element').append(`
								<div style="float: left">
									<div class="star-box-delete" id="`+value.category+``+value.id+`" onclick="deleteStarBox('`+value.category+`', `+value.id+`)">
										<i class="fa fa-close"></i>
									</div>
									<a href="/comercial/`+value.id+`">
										<div class="star-box-img">
											<img src="/img/`+value.foto_1+`?w=70&h=50&fit=crop">
										</div>

										<div class="star-box-content-block">
											<div class="star-box-title">
												Comercial - `+value.sector+`
											</div>
											<div class="star-box-content">
												Suprafața totală `+value.suprafata_totala+` (m2)
											</div>
											<div class="star-box-price">
												`+value.pret+` €
											</div>
										</div>
									</a>
								</div>
						`);
						}
						// Industriale
						if (value.category == 'industriale') {
							$('#star-box-element').append(`
								<div style="float: left">
									<div class="star-box-delete" id="`+value.category+``+value.id+`" onclick="deleteStarBox('`+value.category+`', `+value.id+`)">
										<i class="fa fa-close"></i>
									</div>
									<a href="/industrial/`+value.id+`">
										<div class="star-box-img">
											<img src="/img/`+value.foto_1+`?w=70&h=50&fit=crop">
										</div>

										<div class="star-box-content-block">
											<div class="star-box-title">
												Industrial - `+value.sector+`
											</div>
											<div class="star-box-content">
												Suprafața totală `+value.suprafata_totala+` (m2)
											</div>
											<div class="star-box-price">
												`+value.pret+` €
											</div>
										</div>
									</a>
								</div>
						`);
						}
						// Terenuri
						if (value.category == 'terenuri') {
							$('#star-box-element').append(`
								<div style="float: left">
									<div class="star-box-delete" id="`+value.category+``+value.id+`" onclick="deleteStarBox('`+value.category+`', `+value.id+`)">
										<i class="fa fa-close"></i>
									</div>
									<a href="/teren/`+value.id+`">
										<div class="star-box-img">
											<img src="/img/`+value.foto_1+`?w=70&h=50&fit=crop">
										</div>

										<div class="star-box-content-block">
											<div class="star-box-title">
												Teren - `+value.sector+`
											</div>
											<div class="star-box-content">
												Suprafața totală `+value.suprafata_terenului+` (ari)
											</div>
											<div class="star-box-price">
												`+value.pret+` €
											</div>
										</div>
									</a>
								</div>
						`);
						}
						// Garaje
						if (value.category == 'garaje') {
							$('#star-box-element').append(`
								<div style="float: left">
									<div class="star-box-delete" id="`+value.category+``+value.id+`" onclick="deleteStarBox('`+value.category+`', `+value.id+`)">
										<i class="fa fa-close"></i>
									</div>
									<a href="/garaj/`+value.id+`">
										<div class="star-box-img">
											<img src="/img/`+value.foto_1+`?w=70&h=50&fit=crop">
										</div>

										<div class="star-box-content-block">
											<div class="star-box-title">
												Garaj - `+value.sector+`
											</div>
											<div class="star-box-content">
												Parcare: `+value.parcare+`
											</div>
											<div class="star-box-price">
												`+value.pret+` €
											</div>
										</div>
									</a>
								</div>
						`);
						}
					});
				});
				var count_star = $('.star-box-delete').length;
				$('.badge-star').empty().prepend(count_star);
			}
		});
	}
}

$(document).ready(function() {
	var count_star = $('.star-box-delete').length;
	$('.badge-star').empty().prepend(count_star);

	$('form#apartamente :input.field').change(function() { apartamente() });
	$('form#apartamente span[onclick]').on('click', function() { apartamente() });

	$('form#case-si-vile :input.field').change(function() { case_si_vile() });
	$('form#case-si-vile span[onclick]').on('click', function() { case_si_vile() });

	$('form#spatii-comerciale :input.field').change(function() { spatii_comerciale() });
	$('form#spatii-comerciale span[onclick]').on('click', function() { spatii_comerciale() });

	$('form#spatii-industriale :input.field').change(function() { spatii_industriale() });
	$('form#spatii-industriale span[onclick]').on('click', function() { spatii_industriale() });

	$('form#terenuri :input.field').change(function() { terenuri() });
	$('form#terenuri span[onclick]').on('click', function() { terenuri() });

	$('form#garaje :input.field').change(function() { garaje() });
	$('form#garaje span[onclick]').on('click', function() { garaje() });

	//Chisinau sector
	var chisinau_sector = false;
	$('span.chisinau-sector').on('click', function() {
		if (chisinau_sector == false) {
			$('.sub-item-chisinau-sector').show();
			// $('span.chisinau-sector i').remove();
			// $('span.chisinau-sector').append('<i class="fa fa-arrow-up"></i>');
			chisinau_sector = true;
		} else {
			$('.sub-item-chisinau-sector').hide();
			// $('span.chisinau-sector i').remove();
			// $('span.chisinau-sector').append('<i class="fa fa-arrow-down"></i>');
			chisinau_sector = false;
		}
	});
	$('form :input.chisinau-sector').change(function() {
		if ( $(this).prop('checked') == true ) {
			$(this).prop('checked', true);
			$('.sub-item-chisinau-sector :input').prop('checked', true);
			var func_category = $('input[name=page_form_name]').val();
			window[func_category]();
		} else {
			$(this).prop('checked', false);
			$('.sub-item-chisinau-sector :input').prop('checked', false);
			var func_category = $('input[name=page_form_name]').val();
			window[func_category]();
		}
	});

	//Chisinau municipiul
	var chisinau_municipiul = false;
	$('span.chisinau-municipiul').on('click', function() {
		if (chisinau_municipiul == false) {
			$('.sub-item-chisinau-municipiul').show();
			// $('span.chisinau-municipiul i').remove();
			// $('span.chisinau-municipiul').append('<i class="fa fa-arrow-up"></i>');
			chisinau_municipiul = true;
		} else {
			$('.sub-item-chisinau-municipiul').hide();
			// $('span.chisinau-municipiul i').remove();
			// $('span.chisinau-municipiul').append('<i class="fa fa-arrow-down"></i>');
			chisinau_municipiul = false;
		}
	});
	$('form :input.chisinau-municipiul').change(function() {
		if ( $(this).prop('checked') == true ) {
			$(this).prop('checked', true);
			$('.sub-item-chisinau-municipiul :input').prop('checked', true);
			apartamente();
		} else {
			$(this).prop('checked', false);
			$('.sub-item-chisinau-municipiul :input').prop('checked', false);
			apartamente();
		}
	});

	//Alte localitati
	var alte_localitati = false;
	$('span.alte-localitati').on('click', function() {
		if (alte_localitati == false) {
			$('.sub-item-alte-localitati').show();
			// $('span.alte-localitati i').remove();
			// $('span.alte-localitati').append('<i class="fa fa-arrow-up"></i>');
			alte_localitati = true;
		} else {
			$('.sub-item-alte-localitati').hide();
			// $('span.alte-localitati i').remove();
			// $('span.alte-localitati').append('<i class="fa fa-arrow-down"></i>');
			alte_localitati = false;
		}
	});
	$('form :input.alte-localitati').change(function() {
		if ( $(this).prop('checked') == true ) {
			$(this).prop('checked', true);
			$('.sub-item-alte-localitati :input').prop('checked', true);
			apartamente();
		} else {
			$(this).prop('checked', false);
			$('.sub-item-alte-localitati :input').prop('checked', false);
			apartamente();
		}
	});

	// function fixDiv() {
 //    var div = $('#anunturi');
 //    if ($(window).scrollTop() > 50)
 //      div.css({
 //        'position': 'fixed',
 //        'width': '63%',
 //        'top': '70px'
 //      });
 //    else
 //      div.css({
 //        'position': 'relative',
 //        'width': 'auto',
 //        'top': 'auto'
 //      });
	// }
	// $(window).scroll(fixDiv);
	// fixDiv();
});

</script>