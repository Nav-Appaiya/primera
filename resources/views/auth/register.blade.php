@extends('layouts.master')

@section('titel', 'Registreren')

@section('sidebar')
    @parent
@endsection

@section('content')

    <div style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Registreren</div>
                <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="/auth/login" onclick="$('#signupbox').hide(); $('#loginbox').show()">Al geregistreerd?</a></div>
            </div>
            <div class="panel-body" >
                <form method="POST" action="/auth/register"  class="form-horizontal" role="form">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="email" class="col-md-3 control-label">Email</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="email" placeholder="Emailadres">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="firstname" class="col-md-3 control-label">Naam</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="name" placeholder="naam">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-md-3 control-label">Wachtwoord</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="password" placeholder="Wachtwoord">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-md-3 control-label">Wachtwoord</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Wachtwoord">
                        </div>
                    </div>
                    <div class="form-group">
                        <!-- Button -->
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" id="btn-signup" class="btn btn-success"><i class="fa fa-hand-o-right"></i> &nbsp Inschrijven</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
