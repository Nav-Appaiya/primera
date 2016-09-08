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
                    {!! Form::label('korting', 'korting') !!}
                    {!! Form::text('korting', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('prijs', 'prijs') !!}
                    {!! Form::text('prijs', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>

                {{--<!-- category id -->--}}
                <div class="form-group">
                    {!! Form::label('categorie', 'categorie') !!}
                    {!! Form::select('categorie', \App\Category::groupList(), null, ['class' => 'form-control'] ) !!}
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

    </div>

@stop
