<!-- Starea -->
<div class="form-group"> 
	<button class="btn btn-primary collapse-search" type="button" data-toggle="collapse" data-target="#starea" aria-expanded="false">
		<i class="fa fa-plus"></i> {{ trans('all.starea') }}
	</button>
	<div class="collapse" id="starea">
		<div class="card card-block">
			<div class="d-inline">
				{!! Form::checkbox('reparatie_simpla', 'Reparație simplă', null, ['class' => 'field']) !!} 
				<span onclick="check_item('reparatie_simpla')">{{ trans('all.reparatie_simpla') }}</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('euroreparatie', 'Euroreparație', null, ['class' => 'field']) !!}
				<span onclick="check_item('euroreparatie')">{{ trans('all.euroreparatie') }}</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('varianta_alba', 'Variantă albă', null, ['class' => 'field']) !!}
				<span onclick="check_item('varianta_alba')">{{ trans('all.varianta_alba') }}</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('necesita_reparatie', 'Necesită reparație', null, ['class' => 'field']) !!}
				<span onclick="check_item('necesita_reparatie')">{{ trans('all.necesita_reparatie') }}</span>
			</div>
		</div>
	</div>
</div>