@extends('layouts.master')

@section('titel', 'Inloggen')
@section('description', '')
@section('breadcrumbs', Breadcrumbs::render('home'))

@section('content')
    <div class="row">
        <div class="content">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <h1 class="text-center">Inloggen</h1>
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">

                        <div class="panel-body">
                            {{ csrf_field() }}

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
                                    <input id="password" type="password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Vergeet mij niet
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel-footer">
                            <div class="form-group">
                                <center>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-sign-in"></i> Login
                                    </button>
                                    <a class="btn btn-primary" style="background-color: #3B5998" href="/redirect">
                                        <i class="fa fa-facebook-official" aria-hidden="true"></i>
                                        Facebook Login
                                    </a>
                                    <br/>
                                    <a class="btn btn-link" href="{{ url('/password/reset') }}">Wachtwoord vergeten?</a>
                                    <a class="btn btn-link" href="{{ route('register') }}">Nog geen account?</a>
                                </center>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
