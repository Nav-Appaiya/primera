@extends('admin-panel.layouts.admin')

@section('title', 'nieuwe product detail')
@section('breadcrumb', Breadcrumbs::render('dashboard.category'))

@section('content')

    <div class="row">
        <div class="col-md-10">

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

            @if(\App\Product::find(Request::segment(3))->property()->exists() != 0)
                <div class="form-group">
                    {!! Form::label('detail', \App\Product::find(Request::segment(3))->property->first()->detail->type) !!}
                    {{ Form::select('detail', \App\Details::where('type', \App\Product::find(Request::segment(3))->property->first()->detail->type)->pluck('value', 'id'), null, ['class' => 'form-control']) }}
                </div>
            @else
                <div class="form-group">
                {!! Form::label('detail', 'detail') !!}
                {{ Form::select('detail', \App\Details::groupDetails(), null, ['class' => 'form-control']) }}
                </div>
            @endif
{{--            {{dd(\App\Details::where('type', \App\Product::find(Request::segment(3))->property->first()->detail->type))}}--}}
            {{--<div class="form-group">--}}
                {{--{!! Form::label('detail', $property->detail->type) !!}--}}
                {{--{{ Form::select('detail', \App\Details::where('type', $property->detail->type)->pluck('value', 'id'), null, ['class' => 'form-control']) }}--}}
            {{--</div>--}}

            {{--<div class="form-group">--}}
                {{--{!! Form::label('detail', 'detail') !!}--}}
                {{--{{ Form::select('detail', \App\Details::groupDetails(), null, ['class' => 'form-control']) }}--}}
            {{--</div>--}}

            {{--<div class="form-group">--}}
                {{--{!! Form::label('color', 'kleur') !!}--}}
                {{--{{ Form::select('color', array_merge(['null' => 'geen'], \App\Details::where('type', 'color')->pluck('value', 'value')->toArray() ), null, ['class' => 'form-control']) }}--}}
            {{--</div>--}}

            {{--<div class="form-group">--}}
                {{--{!! Form::label('nicotine', 'nicotine') !!}--}}
                {{--{{ Form::select('nicotine', array_merge(['null' => 'geen'], \App\Details::where('type', 'nicotine')->pluck('value', 'value')->toArray() ), null, ['class' => 'form-control']) }}--}}
            {{--</div>--}}

            {{--<div class="form-group">--}}
                {{--{!! Form::label('battery', 'battery') !!}--}}
                {{--{{ Form::select('battery', array_merge(['null' => 'geen'], \App\Details::where('type', 'battery')->pluck('value', 'value')->toArray() ), null, ['class' => 'form-control']) }}--}}
            {{--</div>--}}

            {!! Form::submit('upload', ['class' => 'btn btn-primary pull-right'])!!}

            <div class="form-group">
                <a class="btn btn-default pull-right" style="margin-right: 10px;">stop</a>
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
