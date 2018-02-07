<!-- Modul de folosinta -->
<div class="form-group"> 
	<button class="btn btn-primary collapse-search" type="button" data-toggle="collapse" data-target="#modul-de-folosinta" aria-expanded="false">
		<i class="fa fa-plus"></i> {{ trans('all.modul_de_folosinta') }}
	</button>
	<div class="collapse" id="modul-de-folosinta">
		<div class="card card-block">
			<div class="d-inline">
				{!! Form::checkbox('pentru_constructii', 'Pentru construcții', null, ['class' => 'field']) !!} 
				<span onclick="check_item('pentru_constructii')">{{trans('all.pentru_constructii')}}</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('agricol', 'Agricol', null, ['class' => 'field']) !!}
				<span onclick="check_item('agricol')">{{trans('all.agricol')}}</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('gradina', 'Grădină', null, ['class' => 'field']) !!}
				<span onclick="check_item('gradina')">{{trans('all.gradina')}}</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('lot_pomicol', 'Lot pomicol', null, ['class' => 'field']) !!}
				<span onclick="check_item('lot_pomicol')">{{trans('all.lot_pomicol')}}</span>
			</div>
		</div>
	</div>
</div>