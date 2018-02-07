<!-- Suprafata terenului -->
<div class="form-group"> 
	<button class="btn btn-primary collapse-search" type="button" data-toggle="collapse" data-target="#suprafata_terenului" aria-expanded="false">
		<i class="fa fa-plus"></i> {{ trans('all.suprafata_terenului') }}
	</button>
	<div class="collapse" id="suprafata_terenului">
		<div class="card card-block">
			<div class="d-inline">
				{!! Form::input('number', 'suprafata_terenului_de_la', null, ['class' => 'form-control field', 'placeholder' => 'de la (ari)']) !!}
				{!! Form::input('number', 'suprafata_terenului_pina_la', null, ['class' => 'form-control field', 'placeholder' => 'pînă la (ari)']) !!}
			</div>
		</div>
	</div>
</div>