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
                    <div class="panel-heading">Nieuw categorie toevoegen</div>
                    <div class="panel-body" >

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {!! Form::open(['route' => 'admin_category_store']) !!}

                            <!-- created_at -->
                            <div class="form-group">
                                {!! Form::label('name', 'Naam') !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                            </div>

                            <!-- category id -->
                            <div class="form-group">
                                {!! Form::label('category', 'category') !!}
                                <select class="form-control" name="category_id">
                                    <option value="0">main</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}"> {{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            {!! Form::submit('submit', ['class' => 'btn btn-primary pull-right'])!!}

                            <div class="form-group">
                                <a class="btn btn-default pull-right" style="margin-right: 10px;">cancel</a>
                            </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
