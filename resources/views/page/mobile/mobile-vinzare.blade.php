@extends('head')

@section('title', 'Lesternau Companie Imobliliara')
@section('keywords', 'lesternau, companie imobiliara, vinzare apartamente chisinau, case, vile, terenuri, garaje, spatii comerciale, spatii industriale, ipoteca')
@section('description', 'Vinzare apartamente, case, vile, terenuri Chisinau ')

@section('content')

@if ( $agent->isMobile() )
	<center>
		<h3>{{ trans('all.vinzare') }}</h3>
	</center>

	<ul class="mobile-menu">
		<li><a href="/apartamente-vinzare">{{ trans('all.apartamente') }}</a></li>
        <li><a href="/case-vinzare">{{ trans('all.case_si_vile') }}</a></li>
        <li><a href="/comerciale-vinzare">{{ trans('all.spatii_comerciale') }}</a></li>
        <li><a href="/industriale-vinzare">{{ trans('all.spatii_industriale') }}</a></li>
        <li><a href="/terenuri-vinzare">{{ trans('all.terenuri') }}</a></li>
        <li><a href="/garaje-vinzare">{{ trans('all.garaje') }}</a></li>
        <li><a href="/altele-vinzare">{{ trans('all.altele') }}</a></li>
	</ul>
@endif

@include('slider-search')

@include('product-slider')

@stop