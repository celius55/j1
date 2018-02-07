<div class="full-search hidden-xs">
    <!-- start Slider -->
    <script>
        $(document).ready(function() {
            $('.carousel').carousel({
                pause: 'false'
            });
        });
    </script>
    <div id="carousel-example-generic" class="hidden-xs carousel slide carousel-fade" data-ride="carousel">
      <!-- Indicators -->
      <!-- <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol> -->

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="/public/img/slider/orig_size/1.jpg" class="img-responsive center-block" alt="lesternau">
        </div>
        <div class="item">
          <img src="/public/img/slider/orig_size/2.jpg" class="img-responsive center-block" alt="lesternau">
        </div>
        <div class="item">
          <img src="/public/img/slider/orig_size/3.jpg" class="img-responsive center-block" alt="lesternau">
        </div>
        <div class="item">
          <img src="/public/img/slider/orig_size/4-1.jpg" class="img-responsive center-block" alt="lesternau">
        </div>
        <div class="item">
          <img src="/public/img/slider/orig_size/5.jpg" class="img-responsive center-block" alt="lesternau">
        </div>
      </div>

      <!-- Controls -->
      <!-- <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a> -->
    </div>
    <!-- end Slider -->

    <script>
        $(document).ready(function() {
            $('.search-select').on('click', function() {
                $('a.search-select').removeClass('search-active');
                $(this).addClass('search-active');
                
                if ($(this).hasClass('apartament')) 
                {
                    $('.search-box-hide').hide(); $('#apartament').show();
                }
                if ($(this).hasClass('case-si-vile')) 
                {
                    $('.search-box-hide').hide(); 
                    $('#case-si-vile-slider').show();
                }
                if ($(this).hasClass('spatii-comerciale')) 
                {
                    $('.search-box-hide').hide(); 
                    $('#spatii-comerciale-slider').show();
                }
                if ($(this).hasClass('spatii-industriale')) 
                {
                    $('.search-box-hide').hide(); 
                    $('#spatii-industriale-slider').show();
                }
                if ($(this).hasClass('terenuri')) 
                {
                    $('.search-box-hide').hide(); 
                    $('#terenuri-slider').show();
                }
                if ($(this).hasClass('garaje-si-parcari')) 
                {
                    $('.search-box-hide').hide(); 
                    $('#garaje-si-parcari-slider').show();
                }
                if ($(this).hasClass('altele')) 
                {
                    $('.search-box-hide').hide(); 
                    $('#altele-slider').show();
                }
            });
        });
    </script>

    <div class="hidden-xs container-fluid search-div">
        <div class="row" id="slider-search">
            <div class="col-md-2 col-md-offset-2 col-lg-2 col-lg-offset-2  search-button">
                <a href="#" class="search-select search-active apartament">{{ trans('all.apartamente') }}</a>
                <a href="#" class="search-select case-si-vile">{{ trans('all.case_si_vile') }}</a>
                <a href="#" class="search-select spatii-comerciale">{{ trans('all.spatii_comerciale') }}</a>
                <a href="#" class="search-select spatii-industriale">{{ trans('all.spatii_industriale') }}</a>
                <a href="#" class="search-select terenuri">{{ trans('all.terenuri') }}</a>
                <a href="#" class="search-select garaje-si-parcari">{{ trans('all.garaje') }}</a>
                <a href="#" class="search-select altele">{{ trans('all.altele') }}</a>
            </div>
            <div class="col-md-6 col-lg-6 search-box">

                <!-- Apartamente -->
                <div id="apartament" class="search-box-hide">
                    <h2>{{ trans('all.cauta_apartamente') }}</h2>

                    {!! Form::open(['url' => '/search-post']) !!}
                    {!! Form::input('hidden', 'page_form_name', 'apartamente_vinzare') !!}

                    <div class="form-group col-xs-4 box-checkbox">
                        {{ trans('all.regiunea') }}
                        <button class="btn btn-primary collapse-search" type="button" data-toggle="collapse" data-target="#sector" aria-expanded="false">
                            {{ trans('all.alege') }}
                        </button>
                        <div class="collapse" id="sector">
                            <div class="card card-block">
                                <div class="d-inline">
                                    {!! Form::checkbox('botanica', 'Botanica', null, ['class' => 'field', 'id' => 'botanica_1']) !!} 
                                    <label for="botanica_1">{{ trans('all.botanica') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('buiucani', 'Buiucani', null, ['class' => 'field', 'id' => 'buiucani_1']) !!}
                                    <label for="buiucani_1">{{ trans('all.buiucani') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('centru', 'Centru', null, ['class' => 'field', 'id' => 'centru_1']) !!} 
                                    <label for="centru_1">{{ trans('all.centru') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('ciocana', 'Ciocana', null, ['class' => 'field', 'id' => 'ciocana_1']) !!}
                                    <label for="ciocana_1">{{ trans('all.ciocana') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('durlesti', 'Durlești', null, ['class' => 'field', 'id' => 'durlesti_1']) !!}
                                    <label for="durlesti_1">{{ trans('all.durlesti') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('posta_veche', 'Poșta Veche', null, ['class' => 'field', 'id' => 'posta_veche_1']) !!}
                                    <label for="posta_veche_1">{{ trans('all.posta_veche') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('riscani', 'Rîșcani', null, ['class' => 'field', 'id' => 'riscani_1']) !!}
                                    <label for="riscani_1">{{ trans('all.riscani') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('sculeni', 'Sculeni', null, ['class' => 'field', 'id' => 'sculeni_1']) !!}
                                    <label for="sculeni_1">{{ trans('all.sculeni') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('telecentru', 'Telecentru', null, ['class' => 'field', 'id' => 'telecentru_1']) !!}
                                    <label for="telecentru_1">{{ trans('all.telecentru') }}</label>
                                </div>
                                
                                <!-- <div class="slider-search-edit-1"> -->
                               <div class="d-inline">
                                    {!! Form::checkbox('chisinau_suburbii', 'Chișinău suburbii', null, ['class' => 'field', 'id' => 'suburbii_1']) !!} 
                                    <label for="suburbii_1">{{ trans('all.suburbii') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('alte_localitati', 'Alte localități', null, ['class' => 'field', 'id' => 'alte_localitati_1']) !!} 
                                    <label for="alte_localitati_1">{{ trans('all.alte_localitati') }}</label>
                                </div> 
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-xs-4 box-checkbox">
                        {{ trans('all.tip') }}
                        <button class="btn btn-primary collapse-search" type="button" data-toggle="collapse" data-target="#tip" aria-expanded="false">
                            {{ trans('all.alege') }}
                        </button>
                        <div class="collapse" id="tip">
                            <div class="card card-block">
                                <div class="d-inline">
                                    {!! Form::checkbox('vinzare', 'Vînzare', null, ['class' => 'field']) !!} 
                                    <span onclick="check_item('vinzare')">{{ trans('all.vinzare') }}</span>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('arenda', 'Arendă', null, ['class' => 'field']) !!}
                                    <span onclick="check_item('arenda')">{{ trans('all.arenda') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-4">
                        {{ trans('all.pret_euro') }}
                        {!!  Form::input('number', 'pret_max', null, ['class' => 'form-control', 'placeholder' => 'Max']) !!}

                        <div class="col-xs-12 cauta pull-right">
                            <i class="fa fa-search"></i>&nbsp;
                            {!! Form::submit(trans('all.cauta'), ['class' => 'btn btn-default btn-large']) !!}
                        </div>
                    </div>
                    <!-- <div class="form-group col-xs-4 col-xs-3-padding">
                        {{ trans('all.camere') }}
                        {!! Form::input('number', 'numar_de_camere', null, ['class' => 'form-control']) !!}
                        <div class="col-xs-12 cauta pull-right">
                            <i class="fa fa-search"></i>&nbsp;
                            {!! Form::submit(trans('all.cauta'), ['class' => 'btn btn-default btn-large']) !!}
                        </div>
                    </div> -->
                    <!-- <div class="col-xs-12 companie-imobiliara-text">
                        <h2 class="companie-imobiliara">{{ trans('all.companie_imobiliara') }}</h2>
                    </div> -->

                    {!! Form::close() !!}

                    {!! Form::open(['url' => '/search-post']) !!}
                        {!! Form::input('hidden', 'page_form_name', 'rezultate_apartamente') !!}
                        <div>
                            <div class="col-xs-10 top35">
                                {!!  Form::input('text', 'search_words', null, ['class' => 'form-control', 'placeholder' => trans('all.cautare_in_anunturi')]) !!}
                            </div>
                            <div class="col-xs-2 top35">
                                {!! Form::submit(trans('all.rezultate'), ['class' => 'btn btn-default btn-large pull-right']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>

                <!-- Case si Vile -->
                <div id="case-si-vile-slider" class="search-box-hide">
                    <h2>{{ trans('all.cauta_case') }}</h2>

                    {!! Form::open(['url' => '/search-post']) !!}
                    {!! Form::input('hidden', 'page_form_name', 'case_si_vile_vinzare') !!}
                    <div class="form-group col-xs-3 col-xs-3-padding box-checkbox">
                        {{ trans('all.regiunea') }}
                        <button class="btn btn-primary collapse-search" type="button" data-toggle="collapse" data-target="#sector2" aria-expanded="false">
                            {{ trans('all.alege') }}
                        </button>
                        <div class="collapse" id="sector2">
                                <div class="card card-block">
                                <div class="d-inline">
                                    {!! Form::checkbox('botanica', 'Botanica', null, ['class' => 'field', 'id' => 'botanica_2']) !!} 
                                    <label for="botanica_2">{{ trans('all.botanica') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('buiucani', 'Buiucani', null, ['class' => 'field', 'id' => 'buiucani_2']) !!}
                                    <label for="buiucani_2">{{ trans('all.buiucani') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('centru', 'Centru', null, ['class' => 'field', 'id' => 'centru_2']) !!} 
                                    <label for="centru_2">{{ trans('all.centru') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('ciocana', 'Ciocana', null, ['class' => 'field', 'id' => 'ciocana_2']) !!}
                                    <label for="ciocana_2">{{ trans('all.ciocana') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('durlesti', 'Durlești', null, ['class' => 'field', 'id' => 'durlesti_2']) !!}
                                    <label for="durlesti_2">{{ trans('all.durlesti') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('posta_veche', 'Poșta Veche', null, ['class' => 'field', 'id' => 'posta_veche_2']) !!}
                                    <label for="posta_veche_2">{{ trans('all.posta_veche') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('riscani', 'Rîșcani', null, ['class' => 'field', 'id' => 'riscani_2']) !!}
                                    <label for="riscani_2">{{ trans('all.riscani') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('sculeni', 'Sculeni', null, ['class' => 'field', 'id' => 'sculeni_2']) !!}
                                    <label for="sculeni_2">{{ trans('all.sculeni') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('telecentru', 'Telecentru', null, ['class' => 'field', 'id' => 'telecentru_2']) !!}
                                    <label for="telecentru_2">{{ trans('all.telecentru') }}</label>
                                </div>
                                
                                <!-- <div class="slider-search-edit-1"> -->
                               <div class="d-inline">
                                    {!! Form::checkbox('chisinau_suburbii', 'Chișinău suburbii', null, ['class' => 'field', 'id' => 'suburbii_2']) !!} 
                                    <label for="suburbii_2">{{ trans('all.suburbii') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('alte_localitati', 'Alte localități', null, ['class' => 'field', 'id' => 'alte_localitati_2']) !!} 
                                    <label for="alte_localitati_2">{{ trans('all.alte_localitati') }}</label>
                                </div> 
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-xs-3 col-xs-3-padding box-checkbox">
                        {{ trans('all.tip') }}
                        <button class="btn btn-primary collapse-search" type="button" data-toggle="collapse" data-target="#tip2" aria-expanded="false">
                            {{ trans('all.alege') }}
                        </button>
                        <div class="collapse" id="tip2">
                            <div class="card card-block">
                                <div class="d-inline">
                                    {!! Form::checkbox('vinzare', 'Vînzare', null, ['class' => 'field']) !!} 
                                    <span onclick="check_item('vinzare')">{{ trans('all.vinzare') }}</span>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('arenda', 'Arendă', null, ['class' => 'field']) !!}
                                    <span onclick="check_item('arenda')">{{ trans('all.arenda') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-2 col-xs-3-padding">
                        {{ trans('all.pret_euro') }}
                        {!!  Form::input('number', 'pret_max', null, ['class' => 'form-control', 'placeholder' => 'Max']) !!}
                    </div>
                    <div class="form-group col-xs-4 col-xs-3-padding">
                        {{ trans('all.suprafata_totala') }}
                        <div class="col-xs-12 range">
                            <div class="col-xs-6 range-from">
                                {!! Form::input('number', 'suprafata_totala_de_la', null, ['class' => 'form-control', 'placeholder' => 'de la']) !!}
                            </div>
                            <div class="col-xs-6 range-until">
                                {!! Form::input('number', 'suprafata_totala_pina_la', null, ['class' => 'form-control', 'placeholder' => 'pînă la']) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 cauta">
                            <i class="fa fa-search"></i>&nbsp;
                            {!! Form::submit(trans('all.cauta'), ['class' => 'btn btn-default btn-large']) !!}
                        </div>
                    </div>
                    <!-- <div class="col-xs-12 companie-imobiliara-text">
                        <h2 class="companie-imobiliara">{{ trans('all.companie_imobiliara') }}</h2>
                    </div> -->
                    {!! Form::close() !!}

                    {!! Form::open(['url' => '/search-post']) !!}
                        {!! Form::input('hidden', 'page_form_name', 'rezultate_case_si_vile') !!}
                        <div>
                            <div class="col-xs-10 top35">
                                {!!  Form::input('text', 'search_words', null, ['class' => 'form-control', 'placeholder' => trans('all.cautare_in_anunturi')]) !!}
                            </div>
                            <div class="col-xs-2 top35">
                                {!! Form::submit(trans('all.rezultate'), ['class' => 'btn btn-default btn-large pull-right']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>

                <!-- Spatii comerciale -->
                <div id="spatii-comerciale-slider" class="search-box-hide">
                    <h2>{{ trans('all.cauta_comerciale') }}</h2>

                    {!! Form::open(['url' => '/search-post']) !!}
                    {!! Form::input('hidden', 'page_form_name', 'spatii_comerciale_vinzare') !!}
                    <div class="form-group col-xs-3 col-xs-3-padding box-checkbox">
                        {{ trans('all.regiunea') }}
                        <button class="btn btn-primary collapse-search" type="button" data-toggle="collapse" data-target="#sector3" aria-expanded="false">
                            {{ trans('all.alege') }}
                        </button>
                        <div class="collapse" id="sector3">
                                <div class="card card-block">
                                <div class="d-inline">
                                    {!! Form::checkbox('botanica', 'Botanica', null, ['class' => 'field', 'id' => 'botanica_3']) !!} 
                                    <label for="botanica_3">{{ trans('all.botanica') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('buiucani', 'Buiucani', null, ['class' => 'field', 'id' => 'buiucani_3']) !!}
                                    <label for="buiucani_3">{{ trans('all.buiucani') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('centru', 'Centru', null, ['class' => 'field', 'id' => 'centru_3']) !!} 
                                    <label for="centru_3">{{ trans('all.centru') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('ciocana', 'Ciocana', null, ['class' => 'field', 'id' => 'ciocana_3']) !!}
                                    <label for="ciocana_3">{{ trans('all.ciocana') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('durlesti', 'Durlești', null, ['class' => 'field', 'id' => 'durlesti_3']) !!}
                                    <label for="durlesti_3">{{ trans('all.durlesti') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('posta_veche', 'Poșta Veche', null, ['class' => 'field', 'id' => 'posta_veche_3']) !!}
                                    <label for="posta_veche_3">{{ trans('all.posta_veche') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('riscani', 'Rîșcani', null, ['class' => 'field', 'id' => 'riscani_3']) !!}
                                    <label for="riscani_3">{{ trans('all.riscani') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('sculeni', 'Sculeni', null, ['class' => 'field', 'id' => 'sculeni_3']) !!}
                                    <label for="sculeni_3">{{ trans('all.sculeni') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('telecentru', 'Telecentru', null, ['class' => 'field', 'id' => 'telecentru_3']) !!}
                                    <label for="telecentru_3">{{ trans('all.telecentru') }}</label>
                                </div>
                                
                                <!-- <div class="slider-search-edit-1"> -->
                               <div class="d-inline">
                                    {!! Form::checkbox('chisinau_suburbii', 'Chișinău suburbii', null, ['class' => 'field', 'id' => 'suburbii_3']) !!} 
                                    <label for="suburbii_3">{{ trans('all.suburbii') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('alte_localitati', 'Alte localități', null, ['class' => 'field', 'id' => 'alte_localitati_3']) !!} 
                                    <label for="alte_localitati_3">{{ trans('all.alte_localitati') }}</label>
                                </div> 
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-xs-3 col-xs-3-padding box-checkbox">
                        {{ trans('all.tip') }}
                        <button class="btn btn-primary collapse-search" type="button" data-toggle="collapse" data-target="#tip3" aria-expanded="false">
                            {{ trans('all.alege') }}
                        </button>
                        <div class="collapse" id="tip3">
                            <div class="card card-block">
                                <div class="d-inline">
                                    {!! Form::checkbox('vinzare', 'Vînzare', null, ['class' => 'field']) !!} 
                                    <span onclick="check_item('vinzare')">{{ trans('all.vinzare') }}</span>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('arenda', 'Arendă', null, ['class' => 'field']) !!}
                                    <span onclick="check_item('arenda')">{{ trans('all.arenda') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-2 col-xs-3-padding">
                        {{ trans('all.pret_euro') }}
                        {!!  Form::input('number', 'pret_max', null, ['class' => 'form-control', 'placeholder' => 'Max']) !!}
                    </div>
                    <div class="form-group col-xs-4 col-xs-3-padding">
                        {{ trans('all.suprafata_totala') }}
                        <div class="col-xs-12 range">
                            <div class="col-xs-6 range-from">
                                {!! Form::input('number', 'suprafata_totala_de_la', null, ['class' => 'form-control', 'placeholder' => 'de la']) !!}
                            </div>
                            <div class="col-xs-6 range-until">
                                {!! Form::input('number', 'suprafata_totala_pina_la', null, ['class' => 'form-control', 'placeholder' => 'pînă la']) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 cauta">
                            <i class="fa fa-search"></i>&nbsp;
                            {!! Form::submit(trans('all.cauta'), ['class' => 'btn btn-default btn-large']) !!}
                        </div>
                    </div>
                    <!-- <div class="col-xs-12 companie-imobiliara-text">
                        <h2 class="companie-imobiliara">{{ trans('all.companie_imobiliara') }}</h2>
                    </div> -->
                    {!! Form::close() !!}

                    {!! Form::open(['url' => '/search-post']) !!}
                        {!! Form::input('hidden', 'page_form_name', 'rezultate_spatii_comerciale') !!}
                        <div>
                            <div class="col-xs-10 top35">
                                {!!  Form::input('text', 'search_words', null, ['class' => 'form-control', 'placeholder' => trans('all.cautare_in_anunturi')]) !!}
                            </div>
                            <div class="col-xs-2 top35">
                                {!! Form::submit(trans('all.rezultate'), ['class' => 'btn btn-default btn-large pull-right']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>

                <!-- Spatii industriale -->
                <div id="spatii-industriale-slider" class="search-box-hide">
                    <h2>{{ trans('all.cauta_industriale') }}</h2>

                    {!! Form::open(['url' => '/search-post']) !!}
                    {!! Form::input('hidden', 'page_form_name', 'spatii_industriale_vinzare') !!}
                    <div class="form-group col-xs-3 col-xs-3-padding box-checkbox">
                        {{ trans('all.regiunea') }}
                        <button class="btn btn-primary collapse-search" type="button" data-toggle="collapse" data-target="#sector4" aria-expanded="false">
                            {{ trans('all.alege') }}
                        </button>
                        <div class="collapse" id="sector4">
                                <div class="card card-block">
                                <div class="d-inline">
                                    {!! Form::checkbox('botanica', 'Botanica', null, ['class' => 'field', 'id' => 'botanica_4']) !!} 
                                    <label for="botanica_4">{{ trans('all.botanica') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('buiucani', 'Buiucani', null, ['class' => 'field', 'id' => 'buiucani_4']) !!}
                                    <label for="buiucani_4">{{ trans('all.buiucani') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('centru', 'Centru', null, ['class' => 'field', 'id' => 'centru_4']) !!} 
                                    <label for="centru_4">{{ trans('all.centru') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('ciocana', 'Ciocana', null, ['class' => 'field', 'id' => 'ciocana_4']) !!}
                                    <label for="ciocana_4">{{ trans('all.ciocana') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('durlesti', 'Durlești', null, ['class' => 'field', 'id' => 'durlesti_4']) !!}
                                    <label for="durlesti_4">{{ trans('all.durlesti') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('posta_veche', 'Poșta Veche', null, ['class' => 'field', 'id' => 'posta_veche_4']) !!}
                                    <label for="posta_veche_4">{{ trans('all.posta_veche') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('riscani', 'Rîșcani', null, ['class' => 'field', 'id' => 'riscani_4']) !!}
                                    <label for="riscani_4">{{ trans('all.riscani') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('sculeni', 'Sculeni', null, ['class' => 'field', 'id' => 'sculeni_4']) !!}
                                    <label for="sculeni_4">{{ trans('all.sculeni') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('telecentru', 'Telecentru', null, ['class' => 'field', 'id' => 'telecentru_4']) !!}
                                    <label for="telecentru_4">{{ trans('all.telecentru') }}</label>
                                </div>
                                
                                <!-- <div class="slider-search-edit-1"> -->
                               <div class="d-inline">
                                    {!! Form::checkbox('chisinau_suburbii', 'Chișinău suburbii', null, ['class' => 'field', 'id' => 'suburbii_4']) !!} 
                                    <label for="suburbii_4">{{ trans('all.suburbii') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('alte_localitati', 'Alte localități', null, ['class' => 'field', 'id' => 'alte_localitati_4']) !!} 
                                    <label for="alte_localitati_4">{{ trans('all.alte_localitati') }}</label>
                                </div> 
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-xs-3 col-xs-3-padding box-checkbox">
                        {{ trans('all.tip') }}
                        <button class="btn btn-primary collapse-search" type="button" data-toggle="collapse" data-target="#tip4" aria-expanded="false">
                            {{ trans('all.alege') }}
                        </button>
                        <div class="collapse" id="tip4">
                            <div class="card card-block">
                                <div class="d-inline">
                                    {!! Form::checkbox('vinzare', 'Vînzare', null, ['class' => 'field']) !!} 
                                    <span onclick="check_item('vinzare')">{{ trans('all.vinzare') }}</span>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('arenda', 'Arendă', null, ['class' => 'field']) !!}
                                    <span onclick="check_item('arenda')">{{ trans('all.arenda') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-2 col-xs-3-padding">
                        {{ trans('all.pret_euro') }}
                        {!!  Form::input('number', 'pret_max', null, ['class' => 'form-control', 'placeholder' => 'Max']) !!}
                    </div>
                    <div class="form-group col-xs-4 col-xs-3-padding">
                        {{ trans('all.suprafata_totala') }}
                        <div class="col-xs-12 range">
                            <div class="col-xs-6 range-from">
                                {!! Form::input('number', 'suprafata_totala_de_la', null, ['class' => 'form-control', 'placeholder' => 'de la']) !!}
                            </div>
                            <div class="col-xs-6 range-until">
                                {!! Form::input('number', 'suprafata_totala_pina_la', null, ['class' => 'form-control', 'placeholder' => 'pînă la']) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 cauta">
                            <i class="fa fa-search"></i>&nbsp;
                            {!! Form::submit(trans('all.cauta'), ['class' => 'btn btn-default btn-large']) !!}
                        </div>
                    </div>
                    <!-- <div class="col-xs-12 companie-imobiliara-text">
                        <h2 class="companie-imobiliara">{{ trans('all.companie_imobiliara') }}</h2>
                    </div> -->
                    {!! Form::close() !!}

                    {!! Form::open(['url' => '/search-post']) !!}
                        {!! Form::input('hidden', 'page_form_name', 'rezultate_spatii_industriale') !!}
                        <div>
                            <div class="col-xs-10 top35">
                                {!!  Form::input('text', 'search_words', null, ['class' => 'form-control', 'placeholder' => trans('all.cautare_in_anunturi')]) !!}
                            </div>
                            <div class="col-xs-2 top35">
                                {!! Form::submit(trans('all.rezultate'), ['class' => 'btn btn-default btn-large pull-right']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>

                <!-- Terenuri -->
                <div id="terenuri-slider" class="search-box-hide">
                    <h2>{{ trans('all.cauta_terenuri') }}</h2>

                    {!! Form::open(['url' => '/search-post']) !!}
                    {!! Form::input('hidden', 'page_form_name', 'terenuri_vinzare') !!}
                    <div class="form-group col-xs-3 col-xs-3-padding box-checkbox">
                        {{ trans('all.regiunea') }}
                        <button class="btn btn-primary collapse-search" type="button" data-toggle="collapse" data-target="#sector5" aria-expanded="false">
                            {{ trans('all.alege') }}
                        </button>
                        <div class="collapse" id="sector5">
                                <div class="card card-block">
                                <div class="d-inline">
                                    {!! Form::checkbox('botanica', 'Botanica', null, ['class' => 'field', 'id' => 'botanica_5']) !!} 
                                    <label for="botanica_5">{{ trans('all.botanica') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('buiucani', 'Buiucani', null, ['class' => 'field', 'id' => 'buiucani_5']) !!}
                                    <label for="buiucani_5">{{ trans('all.buiucani') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('centru', 'Centru', null, ['class' => 'field', 'id' => 'centru_5']) !!} 
                                    <label for="centru_5">{{ trans('all.centru') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('ciocana', 'Ciocana', null, ['class' => 'field', 'id' => 'ciocana_5']) !!}
                                    <label for="ciocana_5">{{ trans('all.ciocana') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('durlesti', 'Durlești', null, ['class' => 'field', 'id' => 'durlesti_5']) !!}
                                    <label for="durlesti_5">{{ trans('all.durlesti') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('posta_veche', 'Poșta Veche', null, ['class' => 'field', 'id' => 'posta_veche_5']) !!}
                                    <label for="posta_veche_5">{{ trans('all.posta_veche') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('riscani', 'Rîșcani', null, ['class' => 'field', 'id' => 'riscani_5']) !!}
                                    <label for="riscani_5">{{ trans('all.riscani') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('sculeni', 'Sculeni', null, ['class' => 'field', 'id' => 'sculeni_5']) !!}
                                    <label for="sculeni_5">{{ trans('all.sculeni') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('telecentru', 'Telecentru', null, ['class' => 'field', 'id' => 'telecentru_5']) !!}
                                    <label for="telecentru_5">{{ trans('all.telecentru') }}</label>
                                </div>
                                
                                <!-- <div class="slider-search-edit-1"> -->
                               <div class="d-inline">
                                    {!! Form::checkbox('chisinau_suburbii', 'Chișinău suburbii', null, ['class' => 'field', 'id' => 'suburbii_5']) !!} 
                                    <label for="suburbii_5">{{ trans('all.suburbii') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('alte_localitati', 'Alte localități', null, ['class' => 'field', 'id' => 'alte_localitati_5']) !!} 
                                    <label for="alte_localitati_5">{{ trans('all.alte_localitati') }}</label>
                                </div> 
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-xs-3 col-xs-3-padding box-checkbox">
                        {{ trans('all.tip') }}
                        <button class="btn btn-primary collapse-search" type="button" data-toggle="collapse" data-target="#tip5" aria-expanded="false">
                            {{ trans('all.alege') }}
                        </button>
                        <div class="collapse" id="tip5">
                            <div class="card card-block">
                                <div class="d-inline">
                                    {!! Form::checkbox('vinzare', 'Vînzare', null, ['class' => 'field']) !!} 
                                    <span onclick="check_item('vinzare')">{{ trans('all.vinzare') }}</span>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('arenda', 'Arendă', null, ['class' => 'field']) !!}
                                    <span onclick="check_item('arenda')">{{ trans('all.arenda') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                   <div class="form-group col-xs-2 col-xs-3-padding">
                        {{ trans('all.pret_euro') }}
                        {!!  Form::input('number', 'pret_max', null, ['class' => 'form-control', 'placeholder' => 'Max']) !!}
                    </div>
                    <div class="form-group col-xs-4 col-xs-3-padding">
                        {{ trans('all.suprafata_terenului') }}
                        <div class="col-xs-12 range">
                            <div class="col-xs-6 range-from">
                                {!! Form::input('number', 'suprafata_terenului_de_la', null, ['class' => 'form-control', 'placeholder' => 'de la']) !!}
                            </div>
                            <div class="col-xs-6 range-until">
                                {!! Form::input('number', 'suprafata_terenului_pina_la', null, ['class' => 'form-control', 'placeholder' => 'pînă la']) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 cauta">
                            <i class="fa fa-search"></i>&nbsp;
                            {!! Form::submit(trans('all.cauta'), ['class' => 'btn btn-default btn-large']) !!}
                        </div>
                    </div>
                    <!-- <div class="col-xs-12 companie-imobiliara-text">
                        <h2 class="companie-imobiliara">{{ trans('all.companie_imobiliara') }}</h2>
                    </div> -->
                    {!! Form::close() !!}

                    {!! Form::open(['url' => '/search-post']) !!}
                        {!! Form::input('hidden', 'page_form_name', 'rezultate_terenuri') !!}
                        <div>
                            <div class="col-xs-10 top35">
                                {!!  Form::input('text', 'search_words', null, ['class' => 'form-control', 'placeholder' => trans('all.cautare_in_anunturi')]) !!}
                            </div>
                            <div class="col-xs-2 top35">
                                {!! Form::submit(trans('all.rezultate'), ['class' => 'btn btn-default btn-large pull-right']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>

                <!-- Garaje si Parcari -->
                <div id="garaje-si-parcari-slider" class="search-box-hide">
                    <h2>{{ trans('all.cauta_garaje') }}</h2>

                    {!! Form::open(['url' => '/search-post']) !!}
                    {!! Form::input('hidden', 'page_form_name', 'garaje_vinzare') !!}
                    <div class="form-group col-xs-3 col-xs-3-padding box-checkbox">
                        {{ trans('all.regiunea') }}
                        <button class="btn btn-primary collapse-search" type="button" data-toggle="collapse" data-target="#sector6" aria-expanded="false">
                            {{ trans('all.alege') }}
                        </button>
                        <div class="collapse" id="sector6">
                                <div class="card card-block">
                                <div class="d-inline">
                                    {!! Form::checkbox('botanica', 'Botanica', null, ['class' => 'field', 'id' => 'botanica_6']) !!} 
                                    <label for="botanica_6">{{ trans('all.botanica') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('buiucani', 'Buiucani', null, ['class' => 'field', 'id' => 'buiucani_6']) !!}
                                    <label for="buiucani_6">{{ trans('all.buiucani') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('centru', 'Centru', null, ['class' => 'field', 'id' => 'centru_6']) !!} 
                                    <label for="centru_6">{{ trans('all.centru') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('ciocana', 'Ciocana', null, ['class' => 'field', 'id' => 'ciocana_6']) !!}
                                    <label for="ciocana_6">{{ trans('all.ciocana') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('durlesti', 'Durlești', null, ['class' => 'field', 'id' => 'durlesti_6']) !!}
                                    <label for="durlesti_6">{{ trans('all.durlesti') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('posta_veche', 'Poșta Veche', null, ['class' => 'field', 'id' => 'posta_veche_6']) !!}
                                    <label for="posta_veche_6">{{ trans('all.posta_veche') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('riscani', 'Rîșcani', null, ['class' => 'field', 'id' => 'riscani_6']) !!}
                                    <label for="riscani_6">{{ trans('all.riscani') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('sculeni', 'Sculeni', null, ['class' => 'field', 'id' => 'sculeni_6']) !!}
                                    <label for="sculeni_6">{{ trans('all.sculeni') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('telecentru', 'Telecentru', null, ['class' => 'field', 'id' => 'telecentru_6']) !!}
                                    <label for="telecentru_6">{{ trans('all.telecentru') }}</label>
                                </div>
                                
                                <!-- <div class="slider-search-edit-1"> -->
                               <div class="d-inline">
                                    {!! Form::checkbox('chisinau_suburbii', 'Chișinău suburbii', null, ['class' => 'field', 'id' => 'suburbii_6']) !!} 
                                    <label for="suburbii_6">{{ trans('all.suburbii') }}</label>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('alte_localitati', 'Alte localități', null, ['class' => 'field', 'id' => 'alte_localitati_6']) !!} 
                                    <label for="alte_localitati_6">{{ trans('all.alte_localitati') }}</label>
                                </div> 
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-xs-3 col-xs-3-padding box-checkbox">
                        {{ trans('all.tip') }}
                        <button class="btn btn-primary collapse-search" type="button" data-toggle="collapse" data-target="#tip6" aria-expanded="false">
                            {{ trans('all.alege') }}
                        </button>
                        <div class="collapse" id="tip6">
                            <div class="card card-block">
                                <div class="d-inline">
                                    {!! Form::checkbox('vinzare', 'Vînzare', null, ['class' => 'field']) !!} 
                                    <span onclick="check_item('vinzare')">{{ trans('all.vinzare') }}</span>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('arenda', 'Arendă', null, ['class' => 'field']) !!}
                                    <span onclick="check_item('arenda')">{{ trans('all.arenda') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-3 col-xs-3-padding box-checkbox" @if (session('applocale')=='ru') style="margin-top: -20px" @endif>
                        {{ trans('all.parcare') }}
                        <button class="btn btn-primary collapse-search" type="button" data-toggle="collapse" data-target="#parcare" aria-expanded="false">
                            {{ trans('all.alege') }}
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
                    <div class="form-group col-xs-3 col-xs-3-padding">
                        {{ trans('all.pret_euro') }}
                        {!!  Form::input('number', 'pret_max', null, ['class' => 'form-control', 'placeholder' => 'Max']) !!}
                        <div class="col-xs-12 cauta">
                            <i class="fa fa-search"></i>&nbsp;
                            {!! Form::submit(trans('all.cauta'), ['class' => 'btn btn-default btn-large']) !!}
                        </div>
                    </div>
                    <!-- <div class="col-xs-12 companie-imobiliara-text">
                        <h2 class="companie-imobiliara">{{ trans('all.companie_imobiliara') }}</h2>
                    </div> -->
                    {!! Form::close() !!}

                    {!! Form::open(['url' => '/search-post']) !!}
                        {!! Form::input('hidden', 'page_form_name', 'rezultate_garaje') !!}
                        <div>
                            <div class="col-xs-10 top35">
                                {!!  Form::input('text', 'search_words', null, ['class' => 'form-control', 'placeholder' => trans('all.cautare_in_anunturi')]) !!}
                            </div>
                            <div class="col-xs-2 top35">
                                {!! Form::submit(trans('all.rezultate'), ['class' => 'btn btn-default btn-large pull-right']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>

                <!-- Altele -->
                <div id="altele-slider" class="search-box-hide">
                    <h2>{{ trans('all.cauta_altele') }}</h2>

                    {!! Form::open(['url' => '/search-post']) !!}
                    {!! Form::input('hidden', 'page_form_name', 'altele_vinzare') !!}
                    <div class="form-group col-xs-4 box-checkbox">
                        {{ trans('all.regiunea') }}
                        <button class="btn btn-primary collapse-search" type="button" data-toggle="collapse" data-target="#sector7" aria-expanded="false">
                            {{ trans('all.alege') }}
                        </button>
                        <div class="collapse" id="sector7">
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
                        </div>
                    </div>

                    <div class="form-group col-xs-4 box-checkbox">
                        {{ trans('all.tip') }}
                        <button class="btn btn-primary collapse-search" type="button" data-toggle="collapse" data-target="#tip7" aria-expanded="false">
                            {{ trans('all.alege') }}
                        </button>
                        <div class="collapse" id="tip7">
                            <div class="card card-block">
                                <div class="d-inline">
                                    {!! Form::checkbox('vinzare', 'Vînzare', null, ['class' => 'field']) !!} 
                                    <span onclick="check_item('vinzare')">{{ trans('all.vinzare') }}</span>
                                </div>
                                <div class="d-inline">
                                    {!! Form::checkbox('arenda', 'Arendă', null, ['class' => 'field']) !!}
                                    <span onclick="check_item('arenda')">{{ trans('all.arenda') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-4 col-xs-3-padding">
                        {{ trans('all.pret_euro') }}
                        {!!  Form::input('number', 'pret_max', null, ['class' => 'form-control', 'placeholder' => 'Max']) !!}
                        <div class="col-xs-12 cauta">
                            <i class="fa fa-search"></i>&nbsp;
                            {!! Form::submit(trans('all.cauta'), ['class' => 'btn btn-default btn-large']) !!}
                        </div>
                    </div>
                    <!-- <div class="col-xs-12 companie-imobiliara-text">
                        <h2 class="companie-imobiliara">{{ trans('all.companie_imobiliara') }}</h2>
                    </div> -->
                    {!! Form::close() !!}
                </div>
            </div>
        </div> <!-- /row -->
    </div> <!-- /container -->
</div> <!-- /full-search -->