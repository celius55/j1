<!-- Nivelul -->
<div class="form-group"> 
	<button class="btn btn-primary collapse-search" type="button" data-toggle="collapse" data-target="#nivelul" aria-expanded="false">
		<i class="fa fa-plus"></i> {{ trans('all.nivelul') }}
	</button>
	<div class="collapse" id="nivelul">
		<div class="card card-block">
			@for ($i=1; $i<26; $i++)
				<div class="d-inline">
					{!! Form::checkbox('n'.$i.'_nivel', $i, null, ['class' => 'field']) !!} 
					<span onclick="check_item('n{{ $i }}_nivel')">{{ $i }}</span>
				</div>
			@endfor
			<div class="d-inline">
				{!! Form::checkbox('demisol_nivel', 'Demisol', null, ['class' => 'field']) !!} 
				<span onclick="check_item('demisol_nivel')">{{trans('all.demisol')}}</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('mansarda_nivel', 'Mansardă', null, ['class' => 'field']) !!} 
				<span onclick="check_item('mansarda_nivel')">{{trans('all.mansarda')}}</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('penthouse_nivel', 'Penthouse', null, ['class' => 'field']) !!} 
				<span onclick="check_item('penthouse_nivel')">{{trans('all.penthouse')}}</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('subsol_nivel', 'Subsol', null, ['class' => 'field']) !!} 
				<span onclick="check_item('subsol_nivel')">{{trans('all.subsol')}}</span>
			</div>
		</div>
	</div>
</div>