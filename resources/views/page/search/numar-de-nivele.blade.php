<!-- Numar de nivele -->
<div class="form-group"> 
	<button class="btn btn-primary collapse-search" type="button" data-toggle="collapse" data-target="#numar_de_nivele" aria-expanded="false">
		<i class="fa fa-plus"></i> {{ trans('all.numar_de_nivele') }}
	</button>
	<div class="collapse" id="numar_de_nivele">
		<div class="card card-block">
			@for ($i=1; $i<26; $i++)
				<div class="d-inline">
					{!! Form::checkbox('n'.$i.'_numar_de_nivele', $i, null, ['class' => 'field']) !!} 
					<span onclick="check_item('n{{ $i }}_numar_de_nivele')">{{ $i }}</span>
				</div>
			@endfor
		</div>
	</div>
</div>