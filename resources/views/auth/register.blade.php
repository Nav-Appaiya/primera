@extends('layouts.master')

@section('titel', 'Registeren')
@section('description', '')
@section('breadcrumbs', Breadcrumbs::render('home'))

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <center>
                        <h1>Registreren</h1>
                    </center>
                    <br>
                    {!! Form::open(array('route' => 'register', 'method' => 'post', 'class' => 'form-horizontal' )) !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Gebruikersnaam</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
                                {{--{{Form::text('name', null, ['class' => 'form-control'])}}--}}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Herhaal Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('voornaam') ? ' has-error' : '' }}">
                            <label for="voornaam" class="col-md-4 control-label">Voornaam</label>

                            <div class="col-md-6">
                                <input id="voornaam" type="text" class="form-control" name="voornaam" value="{{ old('voornaam') }}">

                                @if ($errors->has('voornaam'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('voornaam') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('achternaam') ? ' has-error' : '' }}">
                            <label for="achternaam" class="col-md-4 control-label">Achternaam</label>

                            <div class="col-md-6">
                                <input id="achternaam" type="text" class="form-control" name="achternaam" value="{{ old('achternaam') }}">

                                @if ($errors->has('achternaam'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('achternaam') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('geslacht') ? ' has-error' : '' }}">
                            <label for="geslacht" class="col-md-4 control-label">Geslacht</label>

                            <div class="col-md-6">
                                <label for="geslacht" class="col-md-3 control-label">vrouw: </label>
                                <input id="geslacht" type="radio" class="col-md-3" name="geslacht" value="vrouw">

                                <label for="geslacht" class="col-md-3 control-label">man: </label>
                                <input id="geslacht" type="radio" class="col-md-3" name="geslacht" value="man">

                                @if ($errors->has('geslacht'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('geslacht') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('geboortedatum') ? ' has-error' : '' }}">
                            <label for="geboortedatum" class="col-md-4 control-label">geboortedatum</label>

                            <div class="col-md-6">
                                <input id="geboortedatum" type="date" class="form-control" name="geboortedatum" value="{{ old('geboortedatum') }}">

                                @if ($errors->has('geboortedatum'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('geboortedatum') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('adres') ? ' has-error' : '' }}">
                            <label for="adres" class="col-md-4 control-label">adres</label>

                            <div class="col-md-6">
                                <input id="adres" type="text" class="form-control" name="adres" value="{{ old('adres') }}">

                                @if ($errors->has('adres'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('adres') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('huisnummer') ? ' has-error' : '' }}">
                            <label for="huisnummer" class="col-md-4 control-label">huisnummer</label>

                            <div class="col-md-6">
                                <input id="huisnummer" type="text" class="form-control" name="huisnummer" value="{{ old('huisnummer') }}">

                                @if ($errors->has('huisnummer'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('huisnummer') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('postcode') ? ' has-error' : '' }}">
                            <label for="postcode" class="col-md-4 control-label">postcode</label>

                            <div class="col-md-6">
                                <input id="postcode" type="text" class="form-control" name="postcode" value="{{ old('postcode') }}">

                                @if ($errors->has('postcode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('postcode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('woonplaats') ? ' has-error' : '' }}">
                            <label for="woonplaats" class="col-md-4 control-label">woonplaats</label>

                            <div class="col-md-6">
                                <input id="woonplaats" type="text" class="form-control" name="woonplaats" value="{{ old('woonplaats') }}">

                                @if ($errors->has('woonplaats'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('woonplaats') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('telMobiel') ? ' has-error' : '' }}">
                            <label for="telMobiel" class="col-md-4 control-label">telMobiel</label>

                            <div class="col-md-6">
                                <input id="telMobiel" type="text" class="form-control" name="telMobiel" value="{{ old('telMobiel') }}">

                                @if ($errors->has('telMobiel'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telMobiel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('telThuis') ? ' has-error' : '' }}">
                            <label for="telThuis" class="col-md-4 control-label">telThuis</label>

                            <div class="col-md-6">
                                <input id="telThuis" type="text" class="form-control" name="telThuis" value="{{ old('telThuis') }}">

                                @if ($errors->has('telThuis'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telThuis') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Registreer
                                </button>
                            </div>
                        </div>
            {!! Form::close() !!}
       </div>
   </div>
</div>
@endsection
