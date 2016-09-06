@extends('admin-panel.layouts.admin')

@section('title', 'product type')
{{--@section('breadcrumb', Breadcrumbs::render('dashboard.category.edit'))--}}

@section('content')

    <div class="row">
        <div class="col-md-10">

            {!! Form::model($property, array('route' => ['admin_product_property_update' , $property->id], 'method' => 'patch')) !!}

            {!! Form::hidden('_id', $property->id) !!}
            {!! Form::hidden('_product', $property->product->id) !!}

{{--                @foreach($property->product as $pro)--}}
                    {{--{{$pro}}--}}
                {{--@endforeach--}}
            <!-- created_at -->
            <div class="form-group">
                {!! Form::label('stock', 'voorraad') !!}
                {!! Form::text('stock', null, ['class' => 'form-control', 'placeholder' => '']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('serialNumber', 'serialNumber') !!}
                {!! Form::text('serialNumber', null, ['class' => 'form-control', 'placeholder' => '']) !!}
{{--                {{ Form::select('serialNumber', ['color' => 'kleur', 'battery' => 'battery', 'nicotine' => 'nicotine'], null, ['class' => 'form-control']) }}--}}
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

    </div>

@stop
