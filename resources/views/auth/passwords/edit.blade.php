@extends('layouts.master')

@section('titel', '')
@section('breadcrumbs', Breadcrumbs::render('user.dashboard.password.wijzigen'))

@section('content')
    
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default"> 
            <div class="panel-body">
            {!! Form::model($user, array('route' => 'user.password.edit', 'method' => 'PATCH', 'files' => true )) !!}

                @include('errors.message')
                <center><h4>ACCOUNT GEGEVENS</h4></center>

                <div class="form-group">
                    {!! Form::label('email', 'E-mail') !!}
                    {!! Form::text('email', NULL, array('class' => 'form-control', 'disabled')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('name', 'Gebruikersnaam') !!}
                    {!! Form::text('name', NULL, array('class' => 'form-control', 'disabled')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'huidig wachtwoord') !!}
                    {!! Form::password('old_password', array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password', 'nieuwe wachtwoord') !!}
                    {!! Form::password('password', array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password', 'Bevestig wachtwoord') !!}
                    {!! Form::password('password_confirmation', array('class' => 'form-control')) !!}
                </div>

                <small>Alle velden met een (*) zijn verplicht. </small><br>

                {{ Form::submit('wijzigen', ['class' => 'btn btn-primary']) }}

                <a href="{{route('user.show')}}" class="btn btn-default">Terug</a>

                {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

@stop