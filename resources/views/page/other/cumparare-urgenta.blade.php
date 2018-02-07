@extends('head')

@foreach ($pages as $r)
	@section('title') {{ $r->title }} @endsection
	@section('keywords') {{ $r->meta_keywords }} @endsection
	@section('description') {{ $r->meta_description }} @endsection
@endforeach

@section('content')

<div class="container">
	<div class="row">
		<div class="col-xs-12">	

		@foreach ($pages as $r)
			<br><br>
			<h4 class="page-title"> {!! $r->{'titlu_'.session('applocale')} !!} </h4>
			
			{!! $r->{'descrierea_'.session('applocale')} !!}
		@endforeach

		</div>
	</div>
</div>

@stop