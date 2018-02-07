<!-- Număr de camere -->
<div class="form-group"> 
	<button class="btn btn-primary collapse-search" type="button" data-toggle="collapse" data-target="#numar_de_camere" aria-expanded="false">
		<i class="fa fa-plus"></i> {{ trans('all.numar_de_camere') }}
	</button>
	<div class="collapse" id="numar_de_camere">
		<div class="card card-block">
			<div class="d-inline">
				{!! Form::checkbox('n1_camere', '1', null, ['class' => 'field']) !!} 
				<span onclick="check_item('n1_camere')">1</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('n2_camere', '2', null, ['class' => 'field']) !!}
				<span onclick="check_item('n2_camere')">2</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('n3_camere', '3', null, ['class' => 'field']) !!}
				<span onclick="check_item('n3_camere')">3</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('n4_camere', '4', null, ['class' => 'field']) !!}
				<span onclick="check_item('n4_camere')">{{trans('all.4_si_mai_multe')}}</span>
			</div>
		</div>
	</div>
</div>