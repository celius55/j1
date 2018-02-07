@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@if(isset($dataTypeContent->id))
    @section('page_title','Edit '.$dataType->display_name_singular)
@else
    @section('page_title','Add '.$dataType->display_name_singular)
@endif

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i> @if(isset($dataTypeContent->id)){{ 'Edit' }}@else{{ 'New' }}@endif {{ $dataType->display_name_singular }}
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered">

                    <div class="panel-heading">
                        <h3 class="panel-title">@if(isset($dataTypeContent->id)){{ 'Edit' }}@else{{ 'Add New' }}@endif {{ $dataType->display_name_singular }}</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form"
                            class="form-edit-add"
                            action="@if(isset($dataTypeContent->id)){{ route('voyager.'.$dataType->slug.'.update', $dataTypeContent->id) }}@else{{ route('voyager.'.$dataType->slug.'.store') }}@endif"
                            method="POST" enctype="multipart/form-data">
                        <!-- PUT Method if we are editing -->
                        @if(isset($dataTypeContent->id))
                            {{ method_field("PUT") }}
                        @endif

                        <!-- CSRF TOKEN -->
                        {{ csrf_field() }}

                        <div class="panel-body">

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- If we are editing -->
                            @if(isset($dataTypeContent->id))
                                <?php $dataTypeRows = $dataType->editRows; ?>
                            @else
                                <?php $dataTypeRows = $dataType->addRows; ?>
                            @endif

<!--
                            @foreach($dataTypeRows as $row)
                                <div class="form-group custom-form-group @if($row->type == 'hidden') hidden @endif
                            	@if ( $row['original']['field'] == 'descrierea_ro' || $row['original']['field'] == 'descrierea_ru' )
                            		form-group-descrierea
                            	@endif
                            	@if ( $row['original']['field'] == 'foto_2' )
                            		form-group-descrierea
                            	@endif
                            	@if ( $row['original']['field'] == 'titlu_ro' || $row['original']['field'] == 'titlu_ru' )
                            		form-group-titlu
                            	@endif">
                                    <label for="name">{{ $row->display_name }}</label>
                                    @include('voyager::multilingual.input-hidden-bread')
                                    {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}

                                    @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                        {!! $after->handle($row, $dataType, $dataTypeContent) !!}
                                    @endforeach
                                </div>
                            @endforeach
-->
                        <?php
//					    for ($i=0; $i<=28; $i++) {
//                     		$row = $dataTypeRows[$i];
//                     		$data = $row->display_name;
//                      		echo "<h4>";
//                      			echo $i.' = '.$data;
//                      		echo "</h4> <br>";
//                        }
						?>
                       
                        <div class="col-md-12">
                            <div class="col-md-6 form-group">
                                <?php $row = $dataTypeRows[8]; ?> 
                                <label for="name">{{ $row->display_name }}</label>
                                {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}

                                <?php $row = $dataTypeRows[9]; ?> 
                                <label for="name">{{ $row->display_name }}</label>
                                {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                
                                <div style="height: 30px;"></div>
                                
                                <?php $row = $dataTypeRows[2]; ?> 
                                <label for="name">{{ $row->display_name }}</label>
                                {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                
                                <?php $row = $dataTypeRows[3]; ?> 
                                <label for="name">{{ $row->display_name }}</label>
                                {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}

                                                                
                                <center><h3>Detalii sumplimentare: </h3></center>
                                <?php $row = $dataTypeRows[29]; ?> 
                                {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                <label for="name">{{ $row->display_name }}</label>
                                <br><br>
                                <?php $row = $dataTypeRows[17]; ?> 
                                <label for="name">{{ $row->display_name }}</label>
                                {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                
                                <?php $row = $dataTypeRows[20]; ?> 
                                <label for="name">{{ $row->display_name }}</label>
                                {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                
                                <?php $row = $dataTypeRows[21]; ?> 
                                <label for="name">{{ $row->display_name }}</label>
                                {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                
                                <?php $row = $dataTypeRows[22]; ?> 
                                <label for="name">{{ $row->display_name }}</label>
                                {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                
                                <?php $row = $dataTypeRows[23]; ?> 
                                <label for="name">{{ $row->display_name }}</label>
                                {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                
                                <?php $row = $dataTypeRows[24]; ?> 
                                <label for="name">{{ $row->display_name }}</label>
                                {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                
                                <?php $row = $dataTypeRows[25]; ?> 
                                <label for="name">{{ $row->display_name }}</label>
                                {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                
                                <?php $row = $dataTypeRows[26]; ?> 
                                <label for="name">{{ $row->display_name }}</label>
                                {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                
                                <?php $row = $dataTypeRows[27]; ?> 
                                <label for="name">{{ $row->display_name }}</label>
                                {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                
                                <?php $row = $dataTypeRows[28]; ?> 
                                <label for="name">{{ $row->display_name }}</label>
                                {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                            </div>
                            
                            <div class="col-md-6">
                              	<?php $row = $dataTypeRows[0]; ?> 
                                <label for="name">{{ $row->display_name }}</label>
                                {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                
                                <?php $row = $dataTypeRows[1]; ?> 
                                <label for="name">{{ $row->display_name }}</label>
                                {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                
                                <?php $row = $dataTypeRows[4]; ?> 
                                <label for="name">{{ $row->display_name }}</label>
                                {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                
                                <?php $row = $dataTypeRows[5]; ?> 
                                <label for="name">{{ $row->display_name }}</label>
                                {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                
                                <?php $row = $dataTypeRows[6]; ?> 
                                <label for="name">{{ $row->display_name }}</label>
                                {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                
                                <?php $row = $dataTypeRows[12]; ?> 
                                <label for="name">{{ $row->display_name }}</label>
                                {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                
                                <?php $row = $dataTypeRows[7]; ?> 
                                <label for="name">{{ $row->display_name }}</label>
                                {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                              	
                               	<br><br>
                               	
                                <?php $row = $dataTypeRows[18]; ?> 
                                <label for="name">{{ $row->display_name }}</label>
                                {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                
                                <?php $row = $dataTypeRows[19]; ?> 
                                <label for="name">{{ $row->display_name }}</label>
                                {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                
                                <?php $row = $dataTypeRows[10]; ?> 
                                <label for="name">{{ $row->display_name }}</label>
                                {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                
                                <?php $row = $dataTypeRows[11]; ?> 
                                <label for="name">{{ $row->display_name }}</label>
                                {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                
                                <?php $row = $dataTypeRows[15]; ?> 
                                <label for="name">{{ $row->display_name }}</label>
                                {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                
                                <?php $row = $dataTypeRows[16]; ?> 
                                <label for="name">{{ $row->display_name }}</label>
                                {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                            </div>
                        </div>

                        </div><!-- panel-body -->

                        <div class="panel-footer">
                            <button type="submit" class="btn btn-info save">Save</button>
                        </div>
                    </form>

                    <iframe id="form_target" name="form_target" style="display:none"></iframe>
                    <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"
                            enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
                        <input name="image" id="upload_file" type="file"
                                 onchange="$('#my_form').submit();this.value='';">
                        <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
                        {{ csrf_field() }}
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-danger" id="confirm_delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> Are You Sure</h4>
                </div>

                <div class="modal-body">
                    <h4>Are you sure you want to delete '<span class="confirm_delete_name"></span>'</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirm_delete">Yes, Delete it!
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete File Modal -->
@stop

@section('javascript')
    <script>
        var params = {}
        var $image

        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();

            @if ($isModelTranslatable)
                $('.side-body').multilingual({"editing": true});
            @endif

            $('.side-body input[data-slug-origin]').each(function(i, el) {
                $(el).slugify();
            });

            $('.form-group').on('click', '.remove-multi-image', function (e) {
                $image = $(this).parent().siblings('img');

                params = {
                    slug:   '{{ $dataTypeContent->getTable() }}',
                    image:  $image.data('image'),
                    id:     $image.data('id'),
                    field:  $image.parent().data('field-name'),
                    _token: '{{ csrf_token() }}'
                }

                $('.confirm_delete_name').text($image.data('image'));
                $('#confirm_delete_modal').modal('show');
            });

            $('#confirm_delete').on('click', function(){
                $.post('{{ route('voyager.media.remove') }}', params, function (response) {
                    if ( response
                        && response.data
                        && response.data.status
                        && response.data.status == 200 ) {

                        toastr.success(response.data.message);
                        $image.parent().fadeOut(300, function() { $(this).remove(); })
                    } else {
                        toastr.error("Error removing image.");
                    }
                });

                $('#confirm_delete_modal').modal('hide');
            });
        });
    </script>
    @if($isModelTranslatable)
        <script src="{{ config('voyager.assets_path') }}/js/multilingual.js"></script>
    @endif
    <script src="{{ config('voyager.assets_path') }}/lib/js/tinymce/tinymce.min.js"></script>
    <script src="{{ config('voyager.assets_path') }}/js/voyager_tinymce.js"></script>
    <script src="{{ config('voyager.assets_path') }}/js/slugify.js"></script>
@stop
