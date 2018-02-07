<!-- Tipul cladirii -->
<div class="form-group"> 
	<button class="btn btn-primary collapse-search" type="button" data-toggle="collapse" data-target="#tipul_cladirii" aria-expanded="false">
		<i class="fa fa-plus"></i> {{ trans('all.tipul_cladirii') }}
	</button>
	<div class="collapse" id="tipul_cladirii">
		<div class="card card-block">
			<div class="d-inline">
				{!! Form::checkbox('beton', 'Beton', null, ['class' => 'field']) !!} 
				<span onclick="check_item('beton')">{{ trans('all.beton') }}</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('beton_celular', 'Beton celular', null, ['class' => 'field']) !!}
				<span onclick="check_item('beton_celular')">{{ trans('all.beton_celular') }}</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('blocuri', 'Blocuri', null, ['class' => 'field']) !!}
				<span onclick="check_item('blocuri')">{{ trans('all.blocuri') }}</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('caramida', 'Cărămidă', null, ['class' => 'field']) !!}
				<span onclick="check_item('caramida')">{{ trans('all.caramida') }}</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('combinat', 'Combinat', null, ['class' => 'field']) !!}
				<span onclick="check_item('combinat')">{{ trans('all.combinat') }}</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('cotilet', 'Cotileț', null, ['class' => 'field']) !!}
				<span onclick="check_item('cotilet')">{{ trans('all.cotilet') }}</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('lemn', 'Lemn', null, ['class' => 'field']) !!}
				<span onclick="check_item('lemn')">{{ trans('all.lemn') }}</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('monolit', 'Monolit', null, ['class' => 'field']) !!}
				<span onclick="check_item('monolit')">{{ trans('all.monolit') }}</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('panouri', 'Panouri', null, ['class' => 'field']) !!}
				<span onclick="check_item('panouri')">{{ trans('all.panouri') }}</span>
			</div>
		</div>
	</div>
			</div>