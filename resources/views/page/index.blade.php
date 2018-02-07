@extends('head')

@section('title', 'Lesternau Companie Imobiliară - vînzare, chirie, arendă, evaluare, proiectare, imobile (apartamente case terenuri) Chișinău Moldova')
@section('keywords', 'lesternau, companie imobiliara, vinzare apartamente chisinau, case, vile, terenuri, garaje, spatii comerciale, spatii industriale, ipoteca')
@section('description', 'Companie imobiliara, vinzare apartamente, case, vile, terenuri Chisinau ')

@section('content')

@if ( $agent->isMobile() )
	<ul class="mobile-menu">
		<li>
			<a href="/mobile-vinzare">{{ trans('all.vinzare') }}</a>
		</li>
		<li>
			<a href="/mobile-arenda">{{ trans('all.arenda') }}</a>
		</li>
		<li>
			<a href="/proiectare">{{ trans('all.proiectare') }}</a>
		</li>
		<li>
			<a href="/evaluare">{{ trans('all.evaluare') }}</a>
		</li>
		<li>
			<a href="/complexe-rezidentiale">{{ trans('all.complexe') }}</a>
		</li>
		<li>
			<a href="/mobile-finantare">{{ trans('all.finantare') }}</a>
		</li>
		<li>
			<a href="/contacte">{{ trans('all.contacte') }}</a>
		</li>
		<li>
			<a href="/posturi-vacante">{{ trans('all.posturi_vacante') }}</a>
		</li>
	</ul>
@endif

@include('slider-search')

@if ( !($agent->isMobile()) )
	@include('product-slider')
@endif

@stop