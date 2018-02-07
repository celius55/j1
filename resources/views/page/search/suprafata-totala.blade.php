<!-- Suprafata totala -->
<div class="form-group"> 
	<button class="btn btn-primary collapse-search" type="button" data-toggle="collapse" data-target="#suprafata_totala" aria-expanded="false">
		<i class="fa fa-plus"></i> {{ trans('all.suprafata_totala') }} 
	</button>
	<div class="collapse" id="suprafata_totala">
		<div class="card card-block">
			<div class="d-inline">
				{!! Form::input('number', 'suprafata_totala_de_la', null, ['class' => 'form-control field', 'placeholder' => 'de la', 'style' => 'width: 45%; float: left;']) !!}
				{!! Form::input('number', 'suprafata_totala_pina_la', null, ['class' => 'form-control field', 'placeholder' => 'pînă la', 'style' => 'width: 45%; float: right;']) !!}
			</div>
		</div>
	</div>
</div>