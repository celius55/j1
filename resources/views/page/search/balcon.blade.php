<!-- Balcon -->
<div class="form-group"> 
	<button class="btn btn-primary collapse-search" type="button" data-toggle="collapse" data-target="#balcon" aria-expanded="false">
		<i class="fa fa-plus"></i> {{ trans('all.balcon') }}
	</button>
	<div class="collapse" id="balcon">
		<div class="card card-block">
			<div class="d-inline">
				{!! Form::checkbox('n1_balcon', '1', null, ['class' => 'field']) !!} 
				<span onclick="check_item('n1_balcon')">1</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('n2_balcon', '2', null, ['class' => 'field']) !!}
				<span onclick="check_item('n2_balcon')">2</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('n3_balcon', '3', null, ['class' => 'field']) !!}
				<span onclick="check_item('n3_balcon')">3</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('n4_balcon', '4 și mai multe', null, ['class' => 'field']) !!}
				<span onclick="check_item('n4_balcon')">{{trans('all.4_si_mai_multe')}}</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('nu_balcon', 'nu', null, ['class' => 'field']) !!}
				<span onclick="check_item('nu_balcon')">{{trans('all.nu')}}</span>
			</div>
		</div>
	</div>
</div>