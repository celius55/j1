<!-- Retele ingineresti -->
<div class="form-group"> 
	<button class="btn btn-primary collapse-search" type="button" data-toggle="collapse" data-target="#retele-ingineresti" aria-expanded="false">
		<i class="fa fa-plus"></i> {{ trans('all.retele_ingineresti') }}
	</button>
	<div class="collapse" id="retele-ingineresti">
		<div class="card card-block">
			<div class="d-inline">
				{!! Form::checkbox('apeduct', 'Apeduct', null, ['class' => 'field']) !!} 
				<span onclick="check_item('apeduct')">{{ trans('all.apeduct') }}</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('arteziana', 'Arteziană', null, ['class' => 'field']) !!} 
				<span onclick="check_item('arteziana')">{{ trans('all.arteziana') }}</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('retele_electrice', 'Rețele electrice', null, ['class' => 'field']) !!} 
				<span onclick="check_item('retele_electrice')">{{ trans('all.retele_electrice') }}</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('gaz', 'Gaz', null, ['class' => 'field']) !!} 
				<span onclick="check_item('gaz')">{{ trans('all.gaz') }}</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('canalizare_locala', 'Canalizare locală', null, ['class' => 'field']) !!} 
				<span onclick="check_item('canalizare_locala')">{{ trans('all.canalizare_locala') }}</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('canalizare_centrala', 'Canalizare centrală', null, ['class' => 'field']) !!} 
				<span onclick="check_item('canalizare_centrala')">{{ trans('all.canalizare_centrala') }}</span>
			</div>
		</div>
	</div>
</div>