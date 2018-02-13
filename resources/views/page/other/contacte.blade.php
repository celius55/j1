@extends('head')

@foreach ($pages as $r)
	@section('title') {{ $r->title }} @endsection
	@section('keywords') {{ $r->meta_keywords }} @endsection
	@section('description') {{ $r->meta_description }} @endsection
@endforeach

@section('content')

<div style="height: 45px;"></div>

<div class="container">
	<div class="row contact-page">
		<!-- <div class="col-xs-12">	

		@foreach ($pages as $r)
			<br><br>
			<h4 class="page-title"> {!! $r->{'titlu_'.session('applocale')} !!} </h4>
			
			{!! $r->{'descrierea_'.session('applocale')} !!}
		@endforeach

		</div> -->

		<div class="col-md-12" style="margin-bottom: 30px;">
			<div class="col-xs-3 contact-left">
				{{ trans('all.oficiu') }}
			</div>
			<div class="col-xs-8 contact-right">
<!--				<i class="fa fa-building"></i> {{ trans('all.adresa') }}<br>-->
				<i class="fa fa-phone"></i> +373 (68) 611 611 <br>
				<i class="fa fa-envelope"></i> ofice@diversimobil.md <br>
			</div>
		</div>

<!--
		<div class="col-md-12" style="margin-bottom: 30px;">
			<div class="col-xs-3 contact-left">
				Departamentul vînzări
			</div>
			<div class="col-xs-8 contact-right">
				<i class="fa fa-phone"></i> +373 (68) 48 55 92 <br>
				<i class="fa fa-user"></i> Alexandru P. <br>
				<i class="fa fa-envelope"></i> alexandru.p@lesternau.md
			</div>
		</div>

		<div class="col-md-12" style="margin-bottom: 30px;">
			<div class="col-xs-3 contact-left">
				Departamentul evaluări
			</div>
			<div class="col-xs-8 contact-right">
				<i class="fa fa-phone"></i> +373 (69) 56 94 70 <br>
				<i class="fa fa-user"></i> Alexandru S. <br>
				<i class="fa fa-envelope"></i> alexandru.s@lesternau.md
			</div>
		</div>
-->
		<!--
		<div class="col-md-12" style="margin-bottom: 30px;">
			<div class="col-xs-3 contact-left">
				Departamentul proiectări 
			</div>
			<div class="col-xs-8 contact-right">
				<i class="fa fa-phone"></i> +373 (79) 70 75 44 <br>
				<i class="fa fa-user"></i> Sergiu P. <br>
				<i class="fa fa-envelope"> sergiu.p@lesternau.md</i> 
			</div>
		</div>
		-->
	</div>
</div>

@stop