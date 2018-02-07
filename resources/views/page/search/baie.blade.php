<!-- Baie -->
<div class="form-group"> 
	<button class="btn btn-primary collapse-search" type="button" data-toggle="collapse" data-target="#baie" aria-expanded="false">
		<i class="fa fa-plus"></i> {{ trans('all.baie') }}
	</button>
	<div class="collapse" id="baie">
		<div class="card card-block">
			<div class="d-inline">
				{!! Form::checkbox('n1_baie', '1', null, ['class' => 'field']) !!} 
				<span onclick="check_item('n1_baie')">1</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('n2_baie', '2', null, ['class' => 'field']) !!}
				<span onclick="check_item('n2_baie')">2</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('n3_baie', '3', null, ['class' => 'field']) !!}
				<span onclick="check_item('n3_baie')">3</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('n4_baie', '4 și mai multe', null, ['class' => 'field']) !!}
				<span onclick="check_item('n4_baie')">{{trans('all.4_si_mai_multe')}}</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('nu_baie', 'nu', null, ['class' => 'field']) !!}
				<span onclick="check_item('nu_baie')">{{trans('all.nu')}}</span>
			</div>
		</div>
	</div>
</div>