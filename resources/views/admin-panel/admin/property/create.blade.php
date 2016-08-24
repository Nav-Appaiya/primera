@extends('admin-panel.layouts.admin')

@section('title', 'new category')
{{--@section('breadcrumb', Breadcrumbs::render('dashboard.category'))--}}

@section('content')

    <div class="row">
        <div class="col-md-10">

        @include('errors.message')


        {!! Form::open(['route' => 'admin_property_store']) !!}

            <!-- created_at -->
            <div class="form-group">
                {!! Form::label('name', 'name') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => '']) !!}
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
