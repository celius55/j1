@if ( $agent->isMobile() )
	
	<center><h1>Lorem Ipsum</h1></center>

	<?php exit() ?>
@endif

<div class="card card-block">
    <div class="d-inline">
        {!! Form::checkbox('botanica', 'Botanica', null, ['class' => 'field', 'id' => 'botanica_7']) !!} 
        <label for="botanica_7">{{ trans('all.botanica') }}</label>
    </div>
    <div class="d-inline">
        {!! Form::checkbox('buiucani', 'Buiucani', null, ['class' => 'field', 'id' => 'buiucani_7']) !!}
        <label for="buiucani_7">{{ trans('all.buiucani') }}</label>
    </div>
    <div class="d-inline">
        {!! Form::checkbox('centru', 'Centru', null, ['class' => 'field', 'id' => 'centru_7']) !!} 
        <label for="centru_7">{{ trans('all.centru') }}</label>
    </div>
    <div class="d-inline">
        {!! Form::checkbox('ciocana', 'Ciocana', null, ['class' => 'field', 'id' => 'ciocana_7']) !!}
        <label for="ciocana_7">{{ trans('all.ciocana') }}</label>
    </div>
    <div class="d-inline">
        {!! Form::checkbox('durlesti', 'Durlești', null, ['class' => 'field', 'id' => 'durlesti_7']) !!}
        <label for="durlesti_7">{{ trans('all.durlesti') }}</label>
    </div>
    <div class="d-inline">
        {!! Form::checkbox('posta_veche', 'Poșta Veche', null, ['class' => 'field', 'id' => 'posta_veche_7']) !!}
        <label for="posta_veche_7">{{ trans('all.posta_veche') }}</label>
    </div>
    <div class="d-inline">
        {!! Form::checkbox('riscani', 'Rîșcani', null, ['class' => 'field', 'id' => 'riscani_7']) !!}
        <label for="riscani_7">{{ trans('all.riscani') }}</label>
    </div>
    <div class="d-inline">
        {!! Form::checkbox('sculeni', 'Sculeni', null, ['class' => 'field', 'id' => 'sculeni_7']) !!}
        <label for="sculeni_7">{{ trans('all.sculeni') }}</label>
    </div>
    <div class="d-inline">
        {!! Form::checkbox('telecentru', 'Telecentru', null, ['class' => 'field', 'id' => 'telecentru_7']) !!}
        <label for="telecentru_7">{{ trans('all.telecentru') }}</label>
    </div>
    
    <!-- <div class="slider-search-edit-1"> -->
   <div class="d-inline">
        {!! Form::checkbox('chisinau_suburbii', 'Chișinău suburbii', null, ['class' => 'field', 'id' => 'suburbii_7']) !!} 
        <label for="suburbii_7">{{ trans('all.suburbii') }}</label>
    </div>
    <div class="d-inline">
        {!! Form::checkbox('alte_localitati', 'Alte localități', null, ['class' => 'field', 'id' => 'alte_localitati_7']) !!} 
        <label for="alte_localitati_7">{{ trans('all.alte_localitati') }}</label>
    </div> 
    <!-- </div> -->
</div>
