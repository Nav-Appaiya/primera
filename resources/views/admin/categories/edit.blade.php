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
                    <div class="panel-heading">Nieuw category toevoegen <a class="btn btn-primary btn-xs pull-right" href="{{route('admin_category_create')}}">nieuw category</a></div>
                    <div class="panel-body" >

                    @include('errors.message')

                    {!! Form::model($cate, array('route' => 'admin_category_update', 'method' => 'patch')) !!}
                    {!! Form::hidden('id', $cate->id) !!}

                    <!-- name -->
                        <div class="form-group">
                            {!! Form::label('name', 'name') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => $cate->title]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::select('category', App\Category::lists('title', 'categoryID'), null, array('class' => 'form-control')) !!}
                        </div>

                        {!! Form::submit('edit', ['class' => 'btn btn-primary pull-right'])!!}

                    {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
