@extends('admin-panel.layouts.admin')

@section('title', 'new category')
{{--@section('breadcrumb', Breadcrumbs::render('dashboard.category'))--}}

@section('content')

    <div class="row">
        <div class="col-md-10">

        @include('errors.message')

        {{--{!! Form::open(['route' => 'admin_category_store']) !!}--}}

            <!-- created_at -->


            {{--<!-- category id -->--}}
            {{--<div class="form-group">--}}
                {{--{!! Form::label('cate_id', 'category') !!}--}}
                {{--{!! Form::select('category_id', array('' => '----- select -----', '0' => 'new main category', 'for sub categories' => \App\Category::where('cate_id', 0)->pluck('name', 'id')->toArray() ), null, ['class' => 'form-control'] ) !!}--}}
            {{--</div>--}}

            {{--{!! Form::submit('submit', ['class' => 'btn btn-primary pull-right'])!!}--}}

            {{--<div class="form-group">--}}
                {{--<a class="btn btn-default pull-right" style="margin-right: 10px;">cancel</a>--}}
            {{--</div>--}}

        {{--{!! Form::close() !!}--}}

        </div>


        <div class="col-md-2">
            <ul class="list-group">
                <li class="list-group-item"><a href="{{route('admin_property_create')}}">new</a></li>
                 {{--<li class="list-group-item"><a href="{{route('admin_property_create')}}">new</a></li>--}}
            </ul>
        </div>

    </div>

@stop
