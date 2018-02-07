@extends('head')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-xs-12">	

            <h2 class="page-title" style="margin-top: 40px;"> {{ $noutate->{'titlu_'.session('applocale')} }} </h2> 
            <img src="/storage/app/public/{{ $noutate->img }}" width="400" class="pull-left" class="img-thumbnail" style="padding: 20px;">
            {!! $noutate->{'descrierea_'.session('applocale')} !!}

		</div>
	</div>
</div>

@stop


