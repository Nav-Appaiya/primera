@extends('layouts.app')

@section('titel', 'Nieuw product')

@section('sidebar')
    @parent
@endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Nieuw product toevoegen</div>
                    <div class="panel-body" >

                        @include('errors.message')

                        {{--{!! Form::open(['route' => 'admin_product_save', 'method' => 'post'], 'files' => true) !!}--}}
                        {!! Form::open(array('route' => array('admin_product_save'), 'files' => true )) !!}
                        <fieldset>

                            <div class="form-group">
                                {!! Form::label('name', 'name') !!}
                                {!! Form::text('name', NULL, array('class' => 'form-control')) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('price', 'price') !!}
                                {!! Form::text('price', NULL, array('class' => 'form-control')) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('description', 'description') !!}
                                {!! Form::textarea('description', NULL, array('class' => 'form-control')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('category', 'merk') !!}
                                {!! Form::select('category', App\Category::lists('title', 'categoryID'), null, array('class' => 'form-control')) !!}
                            </div>

                            @foreach(\App\Property::all() as $property)
                                <div class="form-group">
                                    <label for="validate-text">{{ $property->name }}</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="property[{{ $property->id }}]" id="{{ $property->id }}" >
                                        <span class="input-group-addon danger"><span class="glyphicon glyphicon-check"></span></span>
                                    </div>
                                </div>
                            @endforeach

                            <div class="contacts">
                                <label>Voer seotags voor dit product in:</label>
                                <div class="form-group multiple-form-group input-group">
                                    <div class="input-group-btn input-group-select">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                            <span class="concept">Seotags</span>
                                        </button>
                                    </div>
                                    <input type="text" name="seotags[]" class="form-control">
                                    <span class="input-group-btn">
                            <button type="button" class="btn btn-success btn-add">+</button>
                        </span>
                                </div>
                            </div>
                    </div>
                            {!! Form::file('images[]', array('multiple' => true)) !!}

                            {!! Form::submit('submit', array('class' => 'btn btn-default'))!!}

                        </fieldset>
                        {!! Form::close() !!}

                        {{--<form method="POST" action="/admin/product/save" class="form-horizontal" enctype="multipart/form-data" role="form">--}}
                            {{--{!! csrf_field() !!}--}}
                            {{--<fieldset>--}}
                                {{--<!-- Text input-->--}}
                                {{--<div class="form-group">--}}
                                    {{--<label class="col-md-3 control-label" for="name">Naam</label>--}}
                                    {{--<div class="col-md-9">--}}
                                        {{--<input id="name" name="name" type="text" placeholder="Product titel" class="form-control input-md" required="" value="">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="form-group">--}}
                                    {{--<label class="col-md-3 control-label" for="textarea">Omschrijving</label>--}}
                                    {{--<div class="col-md-9">--}}
                                        {{--<textarea class="form-control" id="textarea" name="description" placeholder="Een omschrijving van product" value rows="6"></textarea>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="form-group">--}}
                                    {{--<label class="col-md-3 control-label" for="price">Prijs</label>--}}
                                    {{--<div class="col-md-9">--}}
                                        {{--<input id="price" name="price" type="text" placeholder="Product Prijs" class="form-control input-md" required="" value="">--}}

                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="form-group">--}}
                                    {{--<label class="col-md-3 control-label" for="imageurl">Afbeeldings url</label>--}}
                                    {{--<div class="col-md-9">--}}
                                        {{--<input id="imageurl" name="imageurl" type="text" placeholder="URL van afbeelding" class="form-control input-md" value="">--}}

                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="form-group">--}}
                                    {{--<label class="col-md-3 control-label" for="submit"></label>--}}
                                    {{--<div class="col-md-9">--}}
                                        {{--<button id="submit" name="submit" class="btn btn-primary">Opslaan--}}
                                        {{--</button>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                            {{--</fieldset>--}}

                        {{--</form>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        (function ($) {
            $(function () {

                var addFormGroup = function (event) {
                    event.preventDefault();

                    var $formGroup = $(this).closest('.form-group');
                    var $multipleFormGroup = $formGroup.closest('.multiple-form-group');
                    var $formGroupClone = $formGroup.clone();

                    $(this)
                            .toggleClass('btn-success btn-add btn-danger btn-remove')
                            .html('–');

                    $formGroupClone.find('input').val('');
                    $formGroupClone.find('.concept').text('Seotags');
                    $formGroupClone.insertAfter($formGroup);

                    var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
                    if ($multipleFormGroup.data('max') <= countFormGroup($multipleFormGroup)) {
                        $lastFormGroupLast.find('.btn-add').attr('disabled', true);
                    }
                };

                var removeFormGroup = function (event) {
                    event.preventDefault();

                    var $formGroup = $(this).closest('.form-group');
                    var $multipleFormGroup = $formGroup.closest('.multiple-form-group');

                    var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
                    if ($multipleFormGroup.data('max') >= countFormGroup($multipleFormGroup)) {
                        $lastFormGroupLast.find('.btn-add').attr('disabled', false);
                    }

                    $formGroup.remove();
                };

                var selectFormGroup = function (event) {
                    event.preventDefault();

                    var $selectGroup = $(this).closest('.input-group-select');
                    var param = $(this).attr("href").replace("#","");
                    var concept = $(this).text();

                    $selectGroup.find('.concept').text(concept);
                    $selectGroup.find('.input-group-select-val').val(param);

                }

                var countFormGroup = function ($form) {
                    return $form.find('.form-group').length;
                };

                $(document).on('click', '.btn-add', addFormGroup);
                $(document).on('click', '.btn-remove', removeFormGroup);
                $(document).on('click', '.dropdown-menu a', selectFormGroup);

            });
        })(jQuery);
    </script>
@endsection
