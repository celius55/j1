@extends('head')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-xs-12">	

		@foreach ($noutati as $n)
			<br><br>
			<div class="col-xs-3">
			    <img src="/storage/app/public/{{ $n->img  }}" class="img-responsive img-thumbnail">
			</div>
			<div class="col-xs-9">
			    <h4 class="page-title" style="font-size: 28px;">{!! $n->{'titlu_'.session('applocale')} !!}</h3>
			    <?php $desc = $n->{'descrierea_'.session('applocale')}; ?>
			    <div class="description">
			        {!! str_limit($desc, 500) !!}
                </div>
			    <a href="/noutati/{{ $n->id }}" class="btn btn-success" style="width: 50%;"> {{ trans('all.detalii') }} </a>
			    <br><br>
			</div>
			<hr style="width: 100%; margin-bottom: -15px;">
		@endforeach

		</div>
	</div>
</div>

@stop