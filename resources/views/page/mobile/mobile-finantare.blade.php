@extends('head')

@section('title', 'Lesternau Companie Imobliliara')
@section('keywords', 'lesternau, companie imobiliara, vinzare apartamente chisinau, case, vile, terenuri, garaje, spatii comerciale, spatii industriale, ipoteca')
@section('description', 'Vinzare apartamente, case, vile, terenuri Chisinau ')

@section('content')

@if ( $agent->isMobile() )
	<center>
		<h3>{{ trans('all.finantare') }}</h3>
	</center>

	<ul class="mobile-menu">
		<li><a href="/ipoteca">{{ trans('all.ipoteca') }}</a></li>
        <li><a href="/cumparare-urgenta">Cumpărare urgentă</a></li>
        <li><a href="/serviciile-noastre">Serviciile noastre</a></li>
	</ul>
@endif

@include('slider-search')

@include('product-slider')

@stop