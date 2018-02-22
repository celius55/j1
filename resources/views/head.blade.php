<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">-->
    <title>@yield('title')</title>
    <meta name="keywords" content="@yield('keywords')">
    <meta name="description" content="@yield('description')">   
        @if ( isset($result) && $result->count() == 1 )
            @foreach ( $result as $r )
                <meta property="og:url" content="{{ Request::url() }}">
                <meta property="og:title" content="{{ $r->{'titlu_'.session('applocale')} }}">
                <meta property="og:image" content="{{ url('/') }}/img/{{ $r->foto_1 }}">
                <meta property="og:description" content="{{ $r->tip }}">
            @endforeach

            @else
                <meta property="og:url" content="http://diversimobil.md">
                <meta property="og:title" content="DiversImobil.md - Companie Imobiliară">
                <meta property="og:image" content="{{ url('/') }}/img/public/img/logo.png">
                <meta property="og:description" content="Vînzare / Arendă - Apartamente, Case și Vile, Terenuri, Spații Comerciale - Industriale">
        @endif
    <!-- Jquery -->
    <script src="/public/js/jquery-3.1.1.min.js"></script>
    <!-- Favicon -->
<!--    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">-->
    <link rel="icon" type="image/png" href="/public/img/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="/public/img/favicon-16x16.png" sizes="16x16" />
    <!-- Swiper 3.4.2 -->
    <link rel="stylesheet" href="/public/swiper-3.4.2/css/swiper.min.css">
    <!-- Style -->
    <link href="/public/css/style.css" rel="stylesheet">
    <!-- Fonts -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet"> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,700italic,700,400,400italic,500,500italic&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">
    <!-- Font Awesome -->
    <link href="/public/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="/public/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="/public/bootstrap-3.3.7/js/bootstrap.min.js"></script>
    <!-- Magnific Popup Master -->
        <!-- Magnific Popup core CSS file -->
        <link rel="stylesheet" href="/public/magnific-popup-master/dist/magnific-popup.css">
        <!-- Magnific Popup core JS file -->
        <script src="/public/magnific-popup-master/dist/jquery.magnific-popup.min.js"></script>
    <!-- Product Box -->
    <link rel="stylesheet" href="/public/css/product-box.css">
    <!-- Shop Slider -->
    <link rel="stylesheet" href="/public/css/shop-slider.css">
    <script src="/public/js/shop-slider.js"></script>
    <!-- Jscolor Spetrum -->
    <link href="/public/css/spectrum.css" rel="stylesheet">
    <script src="/public/js/spectrum.js"></script>
</head>

<body>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-103610914-1', 'auto');
  ga('send', 'pageview');

</script>

<!-- Facebook share -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.8";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<!-- End facebook share -->

@include('main-js')
    <!-- Viber Modal -->

    <script>
        var viber = false;

        function viberPanel() {
            if (viber == false) {
                $('.viber-panel').css({ 'transition':'1.5s', 'right':'0px', });
                viber = true;
            } else {
                $('.viber-panel').css({ 'transition':'1.5s', 'right':'-150px', });
                viber = false;
            }
            
        }

        // $(document).ready(function() {
        //     $('.viber-panel').on('click', function() {
        //         $(this).css({
        //             'transition':'1.5s',
        //             'right':'0px',
        //         });
        //     });
        // });
    </script>
    <!-- Viber icon -->
    <img src="/public/img/viber-panel.png" class="viber-panel" alt="viber-panel-img" onclick="viberPanel()">

        <!-- Header menu navbar -->
    <nav class="navbar navbar-default nav-top-customize hidden-xs" id="top-header">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="#"><i class="fa fa-phone"></i> +373 (68) 611 611</a></li>
            <li><a href="mailto:oficiu@diversimobil.md"><i class="fa fa-envelope"></i> oficiu@diversimobil.md</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/noutati"><i class="fa fa-newspaper-o"></i> {{ trans('all.noutati') }}</a></li>
            <li><a href="/ipoteca"><i class="fa fa-home"></i> {{ trans('all.ipoteca') }}</a></li>
            <li><a href="/serviciile-noastre"><i class="fa fa-handshake-o"></i> {{ trans('all.serviciile_noastre') }}</a></li>
            <li><a href="/posturi-vacante"><i class="fa fa-users"></i> {{ trans('all.posturi_vacante') }}</a></li>
<!--
            <li><a href="/lang/ro"><img src="/public/img/romanian.gif" alt="romanian-flag"></a>
            <li><a href="/lang/ru"><img src="/public/img/russian.gif" alt="russian-flag"></a>
-->
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <div class="full-header" id="full-header">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-xs-6">
                    <a href="{{ url('/') }}">
                        <img src="/public/img/other/logo.png" height="90" class="" alt="logo-diversimobil">
                    </a>
                </div>

                <div class="col-md-10 col-xs-6">

                    @if ( $agent->isMobile() )
                        <div class="text-center">
                            <div class="col-xs-6">
                                <a href="/">
                                    <i class="fa fa-bars fa-3x" style="line-height: 90px; color: #aaabaf;"></i>
                                </a>
                            </div>

                            <div class="col-xs-6">
                                <div style="height: 40px;">
                                    <a href="/lang/ro"><img src="/public/img/romanian.gif" alt="romanian-gif"></a>
                                </div>
                                <div style="height: 40px;">
                                    <a href="/lang/ru"><img src="/public/img/russian.gif" alt="russian-gif"></a>  
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- start Menu -->
                    <script>
                        $(document).ready(function() {
                            $('ul.nav li.dropdown').hover(function() {
                                $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
                            }, function() {
                                $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
                            });
                        });
                    </script>
<!--                    <nav class="navbar navbar-default navbar-theme hidden-xs" role="navigation"> -->
                    <nav class="navbar navbar-default navbar-theme hidden-xs"> 
                        <!-- Brand and toggle get grouped for better mobile display --> 
                        <div class="navbar-header"> 
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigationbar"> 
                                <span class="sr-only">Toggle navigation</span> 
                                <span class="icon-bar"></span> 
                                <span class="icon-bar"></span> 
                                <span class="icon-bar"></span> 
                            </button> 
                            <!-- <a class="navbar-brand" href="#">Brand</a>  -->
                        </div> 

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse primary-menu" id="navigationbar">
                            <ul class="nav navbar-nav navbar-full-header navbar-full-header-class">
                                <!-- <li>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                </li> -->
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
                                        <img src="/public/img/basket-star-2.png" alt="basket-star" width="20px" style="margin-top: -3px;"> 
                                        <span class="badge badge-star"></span>
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="star-box">
                                            @include('star-box')
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ trans('all.vinzare') }} <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/apartamente-vinzare">{{ trans('all.apartamente') }}</a></li>
                                        <li><a href="/case-vinzare">{{ trans('all.case_si_vile') }}</a></li>
                                        <li><a href="/comerciale-vinzare">{{ trans('all.spatii_comerciale') }}</a></li>
                                        <li><a href="/industriale-vinzare">{{ trans('all.spatii_industriale') }}</a></li>
                                        <li><a href="/terenuri-vinzare">{{ trans('all.terenuri') }}</a></li>
                                        <li><a href="/garaje-vinzare">{{ trans('all.garaje') }}</a></li>
                                        <li><a href="/altele-vinzare">{{ trans('all.altele') }}</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ trans('all.arenda') }} <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/apartamente-arenda">{{ trans('all.apartamente') }}</a></li>
                                        <li><a href="/case-arenda">{{ trans('all.case_si_vile') }}</a></li>
                                        <li><a href="/comerciale-arenda">{{ trans('all.spatii_comerciale') }}</a></li>
                                        <li><a href="/industriale-arenda">{{ trans('all.spatii_industriale') }}</a></li>
                                        <li><a href="/terenuri-arenda">{{ trans('all.terenuri') }}</a></li>
                                        <li><a href="/garaje-arenda">{{ trans('all.garaje') }}</a></li>
                                        <li><a href="/altele-arenda">{{ trans('all.altele') }}</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="/proiectare">{{ trans('all.proiectare') }}</a>
                                </li>
                                <li>
                                    <a href="/get-page/procesul-de-evaluare">{{ trans('all.evaluare') }}</a>
                                </li> 
                                <li>
                                    <a href="/complexe-rezidentiale">{{ trans('all.complexe') }}</a>
                                </li>
                                <li>
                                    <a href="/contacte">{{ trans('all.contacte') }}</a>
                                </li>
                                @if ( session('applocale') == 'ro' )
									<li><a href="/lang/ru" class="top-icon-circle">ru</a></li>
								@endif
                            	@if ( session('applocale') == 'ru' )
									<li><a href="/lang/ro" class="top-icon-circle">ro</a></li>
                      			@endif
                                <!-- <li>
                                    <a href="#"><img src="/public/img/russian.gif"></a>
                                </li>
                                <li>
                                    <a href="#"><img src="/public/img/english.gif"></a>
                                </li> -->
                            </ul>
                        </div>
                    </nav>
                    <!-- end Menu -->
                </div>
            </div> <!-- /row  -->
        </div> <!-- /container -->
    </div> <!-- /full-header -->
    
    @if ( !($agent->isMobile()) )
        <div style="height: 110px;"></div>
    @endif

<!--    <div style="height: 3px; background: #fff;"></div>-->

    @yield('content')

    @include('footer')
    
</body>
</html>

