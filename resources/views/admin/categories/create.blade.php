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

                        @include('errors.message')

                        {!! Form::open(['route' => 'admin_category_store']) !!}

                            <!-- created_at -->
                            <div class="form-group">
                                {!! Form::label('name', 'name') !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                            </div>

                            <!-- category id -->
                            <div class="form-group">
                                {!! Form::label('cate_id', 'category') !!}
{{--                                {!! Form::select('category_id', array_merge(array('' => '----- select -----', '0' => 'main'), \App\Category::where('cate_id', 0)->pluck('name', 'id')->toArray()), null, ['class' => 'form-control'] ) !!}--}}
                                <select class="form-control" name="category_id">
                                    <option value="0">main</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}"> {{$category->name}}</option>
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
