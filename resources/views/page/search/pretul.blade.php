<!-- Pretul -->
<div class="form-group"> 
	<button class="btn btn-primary collapse-search" type="button" data-toggle="collapse" data-target="#pretul" aria-expanded="false">
		<i class="fa fa-plus"></i> {{ trans('all.pretul') }}
	</button>
	<div class="collapse" id="pretul">
		<div class="card card-block">
			<div class="d-inline">
				{!! Form::input('number', 'pretul_pina_la', null, ['class' => 'form-control field', 'placeholder' => 'pînă la €']) !!}
			</div>
		</div>
	</div>
</div>