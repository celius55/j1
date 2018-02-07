<!-- Parcare -->
<div class="form-group"> 
	<button class="btn btn-primary collapse-search" type="button" data-toggle="collapse" data-target="#parcare" aria-expanded="false">
		<i class="fa fa-plus"></i> {{ trans('all.parcare') }}
	</button>
	<div class="collapse" id="parcare">
		<div class="card card-block">
			<div class="d-inline">
				{!! Form::checkbox('deschis_parcare', 'Deschis', null, ['class' => 'field']) !!} 
				<span onclick="check_item('deschis_parcare')">{{trans('all.deschis')}}</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('garaj_parcare', 'Garaj', null, ['class' => 'field']) !!}
				<span onclick="check_item('garaj_parcare')">{{trans('all.garaj')}}</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('sub_acoperis_parcare', 'Sub acoperiș', null, ['class' => 'field']) !!}
				<span onclick="check_item('sub_acoperis_parcare')">{{trans('all.sub_acoperis')}}</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('subterana_parcare', 'Subterană', null, ['class' => 'field']) !!}
				<span onclick="check_item('subterana_parcare')">{{trans('all.subterana')}}</span>
			</div>
		</div>
	</div>
</div>