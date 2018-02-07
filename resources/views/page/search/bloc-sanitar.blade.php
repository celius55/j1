<!-- Bloc sanitar -->
<div class="form-group"> 
	<button class="btn btn-primary collapse-search" type="button" data-toggle="collapse" data-target="#bloc-sanitar" aria-expanded="false">
		<i class="fa fa-plus"></i> {{ trans('all.bloc_sanitar') }}
	</button>
	<div class="collapse" id="bloc-sanitar">
		<div class="card card-block">
			<div class="d-inline">
				{!! Form::checkbox('n1_bloc_sanitar', '1', null, ['class' => 'field']) !!} 
				<span onclick="check_item('n1_bloc_sanitar')">1</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('n2_bloc_sanitar', '2', null, ['class' => 'field']) !!}
				<span onclick="check_item('n2_bloc_sanitar')">2</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('n3_bloc_sanitar', '3', null, ['class' => 'field']) !!}
				<span onclick="check_item('n3_bloc_sanitar')">3</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('n4_bloc_sanitar', '4 și mai multe', null, ['class' => 'field']) !!}
				<span onclick="check_item('n4_bloc_sanitar')">{{trans('all.4_si_mai_multe')}}</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('nu_bloc_sanitar', 'nu', null, ['class' => 'field']) !!}
				<span onclick="check_item('nu_bloc_sanitar')">{{trans('all.nu')}}</span>
			</div>
		</div>
	</div>
</div>