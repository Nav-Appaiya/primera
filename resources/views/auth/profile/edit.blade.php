@extends('layouts.master')

@section('titel', 'Primera shop')
@section('breadcrumbs', Breadcrumbs::render('user.dashboard.wijzigen'))

@section('content')
    <div class="container">

        <div class="row">
            {!! Form::model($user, array('route' => 'user.update', 'method' => 'PATCH', 'files' => true )) !!}
            <fieldset>

                @include('errors.message')

                <h1>PERSOONLIJKE GEGEVENS</h1>

                <div class="form-group">
                    {!! Form::label('voorletters', 'voorletters *') !!}
                    {!! Form::text('voorletters', NULL, array('class' => 'form-control')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('achternaam', 'achternaam *') !!}
                    {!! Form::text('achternaam', NULL, array('class' => 'form-control')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('voornaam', 'voornaam *') !!}
                    {!! Form::text('voornaam', NULL, array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('geslacht', 'geslacht') !!}<br>
                    {!! Form::label('geslacht', 'man') !!}
                    {!! Form::radio('geslacht', 'man', ['class' => 'form-control', 'disabled']) !!}<br>
                    {!! Form::label('geslacht', 'vrouw') !!}
                    {!! Form::radio('geslacht', 'vrouw', ['class' => 'form-control', 'disabled']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('geboortedatum', 'geboortedatum *') !!}
                    {!! Form::text('geboortedatum', NULL, array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('adres', 'adres *') !!}
                    {!! Form::text('adres', NULL, array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('huisnummer', 'huisnummer *') !!}
                    {!! Form::text('huisnummer', NULL, array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('postcode', 'postcode *') !!}
                    {!! Form::text('postcode', NULL, array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('woonplaats', 'woonplaats *') !!}
                    {!! Form::text('woonplaats', NULL, array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('telMobiel', 'telMobiel') !!}
                    {!! Form::text('telMobiel', NULL, array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('telThuis', 'telThuis') !!}
                    {!! Form::text('telThuis', NULL, array('class' => 'form-control')) !!}
                </div>

                <small>Alle velden met een (*) zijn verplicht. </small><br>

                {{ Form::submit('wijzigen', ['class' => 'btn btn-primary']) }}
                <a href="{{route('user.show')}}" class="btn btn-default">Terug</a>

            {{ Form::close() }}
        </div>
    </div>
@endsection

