@extends('layouts.app')

@section('titel', 'Nieuw product')

@section('sidebar')
    @parent
@endsection

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Nieuw category toevoegen <a class="btn btn-primary btn-xs pull-right" href="{{route('admin_category_create')}}">nieuw category</a></div>
                    <div class="panel-body" >

                    {!! Form::model($cate, array('route' => 'admin_category_update', 'method' => 'patch')) !!}
                    {!! Form::hidden('id', $cate->id) !!}

                    <!-- name -->
                        <div class="form-group">
                            {!! Form::label('title', 'title') !!}
                            {!! Form::text('title', $cate->title, [
                                'class' => 'form-control',
                                'required' => 'required'
                            ]) !!}
                        </div>

                        <div class="form-group">
                            <select class="form-control" data-style="btn-success" style="">
                                <option value="{{ $cate->id }}" selected>{{ $cate->title }}</option>

                                @foreach(\App\Category::all() as $c)
                                    @if($c->id != $cate->id)
                                        <option value="{{ $c->id }}">{{ $c->title }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        {!! Form::submit('edit', ['class' => 'btn btn-primary pull-right'])!!}

                    {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
