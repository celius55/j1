@extends('head')

@section('content')

<script>

	$(document).ready(function() {

	});

</script>

<div style="margin-top: 30px;"></div>

<div class="container">
	<div class="row">
		@if ($search == 'yes')
			<h4 class="page-title">{{ trans('all.rezultatele_cautarii') }}</h4>
		@else
			<h4 class="page-title">{{ trans('all.complexe') }}</h4>
		@endif
		
		<!-- If mobile -->
			@include('layouts.mobile-vinzare')
		<!-- End mobile -->

		<div class="col-xs-12 col-md-12">

			<div id="anunturi">
				@if ( $result instanceof \Illuminate\Pagination\LengthAwarePaginator )
					<div class="text-center"> {{ $result->links() }} </div>
				@endif

				@foreach ($result as $r)
					<div class="col-xs-12 col-md-12 anunt-bloc">
						<div class="col-xs-12 col-md-3">
							<center>
								<a href="{{ url('/') }}/complex-rezidential/{{ $r->id }}" target="_blank">
									<img src="/img/{{ $r->foto_1 }}?w=175&h=120&fit=crop" class="img-responsive img-thumbnail">
								</a>
							</center>
						</div>
						<div class="col-xs-12 col-md-9">
							<a href="{{ url('/') }}/complex-rezidential/{{ $r->id }}" class="title-href" target="_blank">
								<h4> {{ $r->{'titlu_'.session('applocale')} }} </h4>
							</a>
							{{ trans('all.zona') }}: {{ $r->zona }}<br>
							<hr class="custom-hr">
							{{ str_limit(strip_tags( $r->{'descrierea_'.session('applocale')} ), 150) }} <a href="{{ url('/') }}/complex-rezidential/{{ $r->id }}" target="_blank" style="font-weight: bold;"> {{ trans('all.mai_multe_detalii') }} </a> 

							<br><br>


							<table class="table table-condensed table-bordered table-striped table-hover" style="font-weight: bold; color: #00804f; cursor: pointer;">
								<tr>
									@foreach ( $tip_imobil as $t )
										@if ( $r->titlu_ro == $t->complexul_rezidential )
											<tr onclick="window.location='{{ url('/') }}/complex-rezidential/{{ $r->id }}'">
												<td><i class="fa fa-angle-double-right"></i> {{ $t->translate(session('applocale'), $t->tip) }}, {{ $t->suprafata }} m2, @if ( !empty($t->pret_vinzare) ) {{ trans('all.de_vinzare') }} @endif @if ( !empty($t->pret_inchiriere) ) {{ trans('all.de_inchiriere') }} @endif</td>
													<td>
														@if ( !empty($t->pret_vinzare) ) {{ $t->pret_vinzare }} € @endif
														@if ( !empty($t->pret_inchiriere) ) {{ $t->pret_inchiriere }} € @endif
													</td>
											</tr>
										@endif
									@endforeach
								</tr>								
							</table>
						</div>
					</div>
				@endforeach

				@if ( $result instanceof \Illuminate\Pagination\LengthAwarePaginator )
					<div class="text-center"> {{ $result->links() }} </div>
				@endif
			</div>
		</div>

	</div>
</div>

@stop