@extends('head')

@section('content')

<div class="container">
	<div class="row">

		<div class="col-md-3">
			<ul class="nav nav-pills nav-stacked">
			  <li><a href="/get-page/procesul-de-evaluare">{{ trans('all.procesul_de_evaluare') }}</a></li>
			  <li><a href="/get-page/procedura-de-lucru">{{ trans('all.procedura_de_lucru') }}</a></li>
			  <li><a href="/get-page/acte-necesare-pentru-evaluare">{{ trans('all.acte_necesare_pentru_evaluare') }}</a></li>
			  <li><a href="/get-page/raport-de-evaluare">{{ trans('all.raport_de_evaluare') }}</a></li>
			  <li><a href="/get-page/etape-de-realizare">{{ trans('all.etape_de_realizare') }}</a></li>
			  <li><a href="/get-page/valoarea-pe-piata">{{ trans('all.valoarea_de_piata') }}</a></li>
			  <li><a href="/get-page/legea-cu-privire">{{ trans('all.legea_cu_privire') }}</a></li>
			  <li><a href="/get-page/regulamentul-provizoriu">{{ trans('all.regulamentul_provizoriu') }}</a></li>
			</ul>
		</div>

		<div class="col-md-9">
			@foreach ($pages as $r)
				<br><br> 
				<!-- <h4 class="page-title"> {!! $r->{'titlu_'.session('applocale')} !!} </h4> -->
				
				{!! $r->{'descrierea_'.session('applocale')} !!}
			@endforeach
		</div>

	</div>
</div>

@stop