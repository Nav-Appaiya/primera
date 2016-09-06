@extends('admin-panel.layouts.admin')

@section('title', 'new product')
@section('breadcrumb', Breadcrumbs::render('dashboard.product.create'))

@section('content')

    <div class="row">
        <div class="col-lg-6">
            <div class="table-responsive">
                <div class="panel panel-default">
                    <div class="panel-body">

                    {!! Form::open(array('route' => 'admin_product_store', 'method' => 'post', 'files' => true )) !!}

                <div class="form-group">
                    {!! Form::label('naam', 'naam') !!}
                    {!! Form::text('naam', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('beschrijving', 'beschrijving') !!}
                    {!! Form::textarea('beschrijving', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('status', 'status') !!}
                    {!! Form::select('status', ['---select---', 'on' => 'Online', 'off' => 'Offline'], null, ['class' => 'form-control'] ) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('discount', 'discount') !!}
                    {!! Form::number('discount', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('prijs', 'prijs') !!}
                    {!! Form::number('prijs', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>

                {{--<!-- category id -->--}}
                <div class="form-group">
                    {!! Form::label('categorie', 'categorie') !!}
{{--                    {!! Form::select('category_id', array('' => '----- select -----', 'sub categories' => \App\Category::where('category_id', '!=', 0)->pluck('title', 'id')->toArray() ), null, ['class' => 'form-control'] ) !!}--}}
                    {!! Form::select('categorie', \App\Category::groupList(), null, ['class' => 'form-control'] ) !!}
                {{--{{ $category->children() }}--}}
{{--                    <br>{{\App\Category::groupList()}}--}}


                    {{--<pre>{{dd()}}</pre>--}}
                    {{--<pre>{{dd(\App\Category::groupList())}}</pre>--}}
                    {{--{{\App\Category::all()->orderBy('title')->pluck('title', 'id')}}--}}
                </div>

                {!! Form::file('images[]', array('multiple' => true)) !!}
{{----}}
                {!! Form::submit('Aanmaken', array('class' => 'btn btn-default pull-right'))!!}

                <a class="btn btn-danger pull-right" href="{{route('admin_product_index')}}">stop</a>

            {!! Form::close() !!}

        </div>
        </div>
        </div>
        </div>


        <div class="col-md-2">
            <ul class="list-group">
                <li class="list-group-item"><a href="{{route('admin_product_create')}}">new</a></li>
                 {{--<li class="list-group-item"><a href="{{route('admin_property_create')}}">new</a></li>--}}
            </ul>
        </div>

    </div>

@stop
