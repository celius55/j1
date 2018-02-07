<!-- Tip tranzacție -->
<div class="form-group"> 
	<button class="btn btn-primary collapse-search" type="button" data-toggle="collapse" data-target="#tip" aria-expanded="false">
		<i class="fa fa-plus"></i> {{ trans('all.tip') }}
	</button>
	<div class="collapse" id="tip">
		<div class="card card-block">
			<div class="d-inline">
				{!! Form::checkbox('vinzare', 'Vînzare', null, ['class' => 'field']) !!} 
				<span onclick="check_item('vinzare')">{{ trans('all.vinzare') }}</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('arenda', 'Arendă', null, ['class' => 'field']) !!}
				<span onclick="check_item('arenda')">{{ trans('all.arenda') }}</span>
			</div>
		</div>
	</div>
</div>