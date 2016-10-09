@extends('layouts.master')

@section('titel', 'Primera shop')
@section('seotags', 'seotags')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container">

            <div class="row">
                {!! Form::model($user, array('route' => 'user.edit', 'method' => 'post', 'files' => true )) !!}
                <fieldset>
ss
ss
ss
                    <div class="form-group">
                        {!! Form::label('email', 'email') !!}
                        {!! Form::text('email', NULL, array('class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('username', 'username') !!}
                        {!! Form::text('username', NULL, array('class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('password', 'password') !!}
                        {{--{!! Form::password('password', NULL, array('class' => 'form-control')) !!}--}}
                        {{--{{ Form::password('secret', array('class' => 'field')) }}--}}
{{--                        {{ Form::password('password', array('id' => 'password', 'value' => '*******', "class" => "form-control", "autocomplete" => "off", 'disabled')) }}--}}

                    </div>
                    <div class="form-group">
                        {!! Form::label('voorletters', 'voorletters') !!}
                        {!! Form::text('voorletters', NULL, array('class' => 'form-control')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('achternaam', 'achternaam') !!}
                        {!! Form::text('achternaam', NULL, array('class' => 'form-control')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('voornaam', 'voornaam') !!}
                        {!! Form::text('voornaam', NULL, array('class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('geslacht', 'geslacht') !!}
                        {!! Form::text('geslacht', NULL, array('class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('geboortedatum', 'geboortedatum') !!}
                        {!! Form::text('geboortedatum', NULL, array('class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('adres', 'adres') !!}
                        {!! Form::text('adres', NULL, array('class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('huisnummer', 'huisnummer') !!}
                        {!! Form::text('huisnummer', NULL, array('class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('postcode', 'postcode') !!}
                        {!! Form::text('postcode', NULL, array('class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('woonplaats', 'woonplaats') !!}
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


                    {{ Form::submit('wijzigen', null) }}

                {{ Form::close() }}
            </div>
    </div>
@endsection

