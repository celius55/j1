@extends('head')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-xs-12">	

            <h2 class="page-title" style="margin-top: 40px;"> {{ $informatii->{'titlu_'.session('applocale')} }} </h2> 
            <img src="/storage/app/public/{{ $informatii->img }}" width="400" class="pull-left" class="img-thumbnail" style="padding: 20px;">
            {!! $informatii->{'descrierea_'.session('applocale')} !!}

		</div>
	</div>
</div>

@stop


