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
                </div>
            </div>
        </div>
    </div>

@endsection
