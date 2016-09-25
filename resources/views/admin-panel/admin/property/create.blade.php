@extends('admin-panel.layouts.admin')

@section('title', 'Nieuwe detail')
@section('breadcrumb', Breadcrumbs::render('dashboard.detail.create'))

@section('content')

    <div class="row">
        <div class="col-md-10">


{!! Form::open(['route' => 'admin_property_store']) !!}

    <!-- created_at -->
    <div class="form-group">
        {!! Form::label('value', 'waarden') !!}
        {!! Form::text('value', null, ['class' => 'form-control', 'placeholder' => '']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('type', 'type') !!}
        {{--{!! Form::select('name', null, ['class' => 'form-control', 'placeholder' => '']) !!}--}}
        {{ Form::select('type', ['color' => 'kleur', 'battery' => 'battery', 'nicotine' => 'nicotine'], null, ['class' => 'form-control']) }}
    </div>

    {!! Form::submit('upload', ['class' => 'btn btn-primary pull-right'])!!}

    <div class="form-group">
        <a class="btn btn-default pull-right" href="{{route('admin_property_index')}}" style="margin-right: 10px;">stop</a>
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
