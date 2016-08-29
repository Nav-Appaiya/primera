@extends('admin-panel.layouts.admin')

@section('title', 'Product details wijzigen')
{{--@section('breadcrumb', Breadcrumbs::render('dashboard.category.edit'))--}}

@section('content')

    <div class="row">
        <div class="col-lg-6">
            <div class="table-responsive">
                <div class="panel panel-default">
                    <div class="panel-heading">category</div>

                    <div class="panel-body">

                        @include('errors.message')

                        {!! Form::model($property, array('route' => array('admin_property_update'), 'method' => 'patch')) !!}

                        {!! Form::hidden('id', $property->id) !!}

                        <div class="form-group">
                            {!! Form::label('value', 'waarden') !!}
                            {!! Form::text('value', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('type', 'type') !!}
                            {{--{!! Form::select('name', null, ['class' => 'form-control', 'placeholder' => '']) !!}--}}
                            {{ Form::select('type', ['color' => 'kleur', 'battery' => 'battery', 'nicotine' => 'nicotine'], null, ['class' => 'form-control']) }}

                        </div>


                        {!! Form::submit('edit', ['class' => 'btn btn-primary pull-right'])!!}

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>

    </div>

@stop
