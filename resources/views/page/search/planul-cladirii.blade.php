<!-- Planul cladirii -->
<div class="form-group"> 
	<button class="btn btn-primary collapse-search" type="button" data-toggle="collapse" data-target="#planul_cladirii" aria-expanded="false">
		<i class="fa fa-plus"></i> {{ trans('all.planul_cladirii') }}
	</button>
	<div class="collapse" id="planul_cladirii">
		<div class="card card-block">
			<div class="d-inline">
				{!! Form::checkbox('n102', '102', null, ['class' => 'field']) !!} 
				<span onclick="check_item('n102')">102</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('n135', '135', null, ['class' => 'field']) !!} 
				<span onclick="check_item('n135')">135</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('n143', '143', null, ['class' => 'field']) !!} 
				<span onclick="check_item('n143')">143</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('gostinca', 'Ap. "Gostinca"', null, ['class' => 'field']) !!} 
				<span onclick="check_item('gostinca')">{{trans('all.gostinca')}}</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('brejnevka', 'Brj (Brejnevka)', null, ['class' => 'field']) !!} 
				<span onclick="check_item('brejnevka')">{{trans('all.brejnevka')}}</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('camin_familial', 'Cămin familial', null, ['class' => 'field']) !!} 
				<span onclick="check_item('camin_familial')">{{trans('all.camin_familial')}}</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('ceska', 'Cș (Ceșka)', null, ['class' => 'field']) !!} 
				<span onclick="check_item('ceska')">{{trans('all.ceska')}}</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('hrusciovka', 'Hrușciovka', null, ['class' => 'field']) !!} 
				<span onclick="check_item('hrusciovka')">{{trans('all.hrusciovka')}}</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('individuala', 'Individuală', null, ['class' => 'field']) !!} 
				<span onclick="check_item('individuala')">{{trans('all.individuala')}}</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('ms', 'Ms (serie moldovenească)', null, ['class' => 'field']) !!} 
				<span onclick="check_item('ms')">{{trans('all.ms')}}</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('rubaska', 'Rubașka', null, ['class' => 'field']) !!} 
				<span onclick="check_item('rubaska')">{{trans('all.rubaska')}}</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('stalinka', 'St (Stalinka)', null, ['class' => 'field']) !!} 
				<span onclick="check_item('stalinka')">{{trans('all.stalinka')}}</span>
			</div>
			<div class="d-inline">
				{!! Form::checkbox('varnitkaia', 'Varț (Varnițkaia)', null, ['class' => 'field']) !!} 
				<span onclick="check_item('varnitkaia')">{{trans('all.varnitkaia')}}</span>
			</div>
		</div>
	</div>
			</div>