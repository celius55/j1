<div style=""></div>

<script>
//    $(document).ready(function() {
//        $('.offer-content').hover(function() {
//            $(this).find('img.first-img').hide();
//            $(this).find('img.second-img').show();
//        }, function() {
//            $(this).find('img.first-img').show();
//            $(this).find('img.second-img').hide();
//        });
//    });
</script>

<!-- Item slider-->
<div class="product-slider-bg">
<div class="container-fluid product-slider hidden-xs">

    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
<!--            <h2><i class="fa fa-thumbs-up"></i> {{ trans('all.oferte_urgente') }} </h2>-->
            <div class="carousel carousel-showmanymoveone slide" id="itemslider">
                <div class="carousel-inner">
                    <?php $i=0; ?> @foreach ($oferte_noi as $a)
                    <div @if ($i==0) class="item active" @else class="item" @endif>
                        <div class="col-xs-12 col-md-3 col-lg-3">
                            <a href="{{ url('/') }}/apartament/{{ $a->id }}" style="text-decoration: none;">
                                <div class="offer">
                                    <div class="offer-content">
                                        <img src="/img/{{ $a->foto_1 }}?w=242&h=150&fit=crop" class="img-responsive center-block first-img" alt="img{{ $a->id }}" style="height: 150px;">
                                        
                                        <?php $multiple_photo = json_decode($a->foto_2, true); ?> 
                                        
                                        @if ( !empty($multiple_photo[8]) )
                                        <img src="/img/{{ $multiple_photo[8] }}?w=242&h=150&fit=crop" class="img-responsive center-block second-img" alt="img{{ $a->id }}" style="display: none;"> 
                                            @else
                                            <img src="/img/{{ $multiple_photo[0] }}?w=242&h=150&fit=crop" class="img-responsive center-block second-img" alt="img{{ $a->id }}" style="display: none;"> 
                                        @endif

                                        <ul class="descr-short">
                                            <li>{{ trans('all.chisinau') }}, {{ $a->translate(session('applocale'), $a->sector) }}</li>
                                            <li>{{ trans('all.suprafata_totala') }}: <span class="descr-short-color">{{ $a->suprafata_totala }} m2</span></li>
                                        </ul>

                                        <div class="price price-slider">
                                            {{ number_format($a->pret, 0, '', ' ') }} €
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php $i+=1; ?> @endforeach
                </div>

            </div>
            <div id="slider-control">
                <a class="left carousel-control" href="#itemslider" data-slide="prev"><img src="/public/img/left.png" alt="Left" class="img-responsive"></a>
                <a class="right carousel-control" href="#itemslider" data-slide="next"><img src="/public/img/right.png" alt="Right" class="img-responsive"></a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
<!--            <h2><i class="fa fa-building"></i> {{ trans('all.ofertele_noastre') }} </h2>-->
            <div class="carousel carousel-showmanymoveone slide" id="itemslider-2">
                <div class="carousel-inner">
                    <?php $i=0; ?> @foreach ($ofertele_noastre as $a)
                    <div @if ($i==0) class="item active" @else class="item" @endif>
                        <div class="col-xs-12 col-md-3 col-lg-3">
                            <a href="{{ url('/') }}/apartament/{{ $a->id }}" style="text-decoration: none;">
                                <div class="offer">
                                    <div class="offer-content">
                                        <img src="/img/{{ $a->foto_1 }}?w=242&h=150&fit=crop" class="img-responsive center-block first-img" alt="img{{ $a->id }}" style="height: 150px;">
                                        
                                        <?php $multiple_photo = json_decode($a->foto_2, true); ?> 
                                        
                                        @if ( !empty($multiple_photo[8]) )
                                        <img src="/img/{{ $multiple_photo[8] }}?w=242&h=150&fit=crop" class="img-responsive center-block second-img" alt="img{{ $a->id }}" style="display: none;"> 
                                            @else
                                            <img src="/img/{{ $multiple_photo[0] }}?w=242&h=150&fit=crop" class="img-responsive center-block second-img" alt="img{{ $a->id }}" style="display: none;"> 
                                        @endif
									
                                        <ul class="descr-short">
                                            <li>{{ trans('all.chisinau') }}, {{ $a->translate(session('applocale'), $a->sector) }}</li>
                                            <li>{{ trans('all.suprafata_totala') }}: <span class="descr-short-color">{{ $a->suprafata_totala }} m2</span></li>
                                        </ul>

                                        <div class="price price-slider">
                                            {{ number_format($a->pret, 0, '', ' ') }} €
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php $i+=1; ?> @endforeach
                </div>

            </div>
            <div id="slider-control-2">
                <a class="left carousel-control" href="#itemslider-2" data-slide="prev"><img src="/public/img/left.png" alt="Left-2" class="img-responsive"></a>
                <a class="right carousel-control" href="#itemslider-2" data-slide="next"><img src="/public/img/right.png" alt="Right-2" class="img-responsive"></a>
            </div>
        </div>
    </div>

</div>
</div> <!-- product slider bg -->
<!-- Item slider end-->
