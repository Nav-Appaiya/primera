@extends('admin-panel.layouts.admin')

@section('title', 'new category')
{{--@section('breadcrumb', Breadcrumbs::render('dashboard.category'))--}}

@section('content')

    <div class="row">
        <div class="col-md-10">

        @include('errors.message')

        {!! Form::open(['route' => ['admin_product_property_store']]) !!}

            {!! Form::hidden('id', Request::segment(3)) !!}

            <!-- created_at -->
            <div class="form-group">
                {!! Form::label('stock', 'voorraad') !!}
                {!! Form::text('stock', null, ['class' => 'form-control', 'placeholder' => '']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('serialNumber', 'serialNumber') !!}
                {!! Form::text('serialNumber', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                {{--{{ Form::select('serialNumber', ['color' => 'kleur', 'battery' => 'battery', 'nicotine' => 'nicotine'], null, ['class' => 'form-control']) }}--}}
            </div>

            <div class="form-group">
                {!! Form::label('color', 'kleur') !!}
                {{ Form::select('color', [\App\Details::where('type', 'color')->pluck('value', 'value')->toArray()], null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {!! Form::label('nicotine', 'nicotine') !!}
                {{ Form::select('nicotine', [\App\Details::where('type', 'nicotine')->pluck('value', 'value')->toArray()], null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {!! Form::label('battery', 'battery') !!}
                {{ Form::select('battery', ['' => \App\Details::where('type', 'battery')->pluck('value', 'value')->toArray()], null, ['class' => 'form-control']) }}
            </div>

            {!! Form::submit('submit', ['class' => 'btn btn-primary pull-right'])!!}

            <div class="form-group">
                <a class="btn btn-default pull-right" style="margin-right: 10px;">cancel</a>
            </div>

            {!! Form::close() !!}
        </div>


        <div class="col-md-2">
            <ul class="list-group">
                <li class="list-group-item"><a href="{{route('admin_property_create')}}">new</a></li>
                 {{--<li class="list-group-item"><a href="{{route('admin_property_create')}}">new</a></li>--}}
            </ul>
        </div>

    </div>

@stop
