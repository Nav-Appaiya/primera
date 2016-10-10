@extends('layouts.master')

@section('titel', 'Primera shop')
@section('breadcrumbs', Breadcrumbs::render('user.dashboard'))

@section('content')

        <div class="col-lg-12">
            <center>
                <h2 style="margin-bottom: 45px; margin-top: 0px;">Laatste bestellingen</h2>
            </center>
        </div>

        <div class="col-md-12">
          <div class="row">
          <div class="panel panel-default">
            <div class="panel-body">
            <table class="table table-striped custab">
                <h3></h3>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Order datum</th>
                        <th>Adres gegevens</th>
                        <th>Laatste wijziging</th>
                    </tr>
                </thead>

                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>{{ $order->adres }}  {{ $order->huisnummer }}, {{ $order->woonplaats }}
                        </td>
                        <td>{{ $order->updated_at }}</td>
                    </tr>
                @endforeach()
            </table>
            <hr>
        </div>
      </div>
      </div>
    </div>
    <div class="col-lg-12">
    <center>
        <h2 style="margin-bottom: 45px; margin-top: 25px;">Account info</h2>
    </center>
    </div>
    <div class="content">
      <div class="row">
        <div class="col-md-6">
      <div class="panel panel-default">
      <div class="panel-body">
        <h3>Persoonlijke gegevens</h3>

      {!! Form::model($user) !!}

          <div class="form-group col-lg-12">
              {!! Form::label('voorletters', 'voorletters') !!}
              {!! Form::text('voorletters', null, ['class' => 'form-control', 'disabled']) !!}
          </div>
          <div class="form-group col-lg-12">
              {!! Form::label('voornaam', 'voornaam') !!}
              {!! Form::text('voornaam', null, ['class' => 'form-control', 'disabled']) !!}
          </div>
          <div class="form-group col-lg-12">
              {!! Form::label('achternaam', 'achternaam') !!}
              {!! Form::text('achternaam', null, ['class' => 'form-control', 'disabled']) !!}
          </div>
          <div class="form-group col-lg-12">
              {!! Form::label('geslacht', 'geslacht') !!}
              {!! Form::text('geslacht', null, ['class' => 'form-control', 'disabled']) !!}
          </div>
          <div class="form-group col-lg-12">
              {!! Form::label('geboortedatum', 'geboortedatum') !!}
              {!! Form::text('geboortedatum', null, ['class' => 'form-control', 'disabled']) !!}
          </div>
          <div class="form-group col-lg-9">
              {!! Form::label('adres', 'adres') !!}
              {!! Form::text('adres', null, ['class' => 'form-control', 'disabled']) !!}
          </div>
          <div class="form-group col-lg-3">
              {!! Form::label('huisnummer', 'huis nr.') !!}
              {!! Form::text('huisnummer', null, ['class' => 'form-control', 'disabled']) !!}
          </div>
          <div class="form-group col-lg-5">
              {!! Form::label('postcode', 'postcode') !!}
              {!! Form::text('postcode', null, ['class' => 'form-control', 'disabled']) !!}
          </div>
          <div class="form-group col-lg-7">
              {!! Form::label('woonplaats', 'woonplaats') !!}
              {!! Form::text('woonplaats', null, ['class' => 'form-control', 'disabled']) !!}
          </div>
          <div class="form-group col-lg-6">
              {!! Form::label('telThuis', 'Tel. Thuis') !!}
              {!! Form::text('telThuis', null, ['class' => 'form-control', 'disabled']) !!}
          </div>
          <div class="form-group col-lg-6">
              {!! Form::label('telMobiel', 'Tel. Mobiel') !!}
              {!! Form::text('telMobiel', null, ['class' => 'form-control', 'disabled']) !!}
          </div>

      {!! Form::close() !!}

          <div class="form-group col-lg-12">
            <a href="{{route('user.edit')}}" class="btn btn-default">Wijzigen</a>
          </div>

          </div>
        </div>
        </div>
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-body">
        <h3>Account gegevens</h3>
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-lg-3 control-label">Email adres:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="{{ $user->email }}" disabled>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Gebruikersnaam:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="{{ $user->name }}" disabled>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Wachtwoord:</label>
            <div class="col-lg-8">
              <input class="form-control" type="password" value="*******" disabled>
            </div>
          </div>
        </div>
        <div class="panel-footer o-hidden">
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <a href="{{route('user.password.edit')}}" class="btn btn-default">Wijzigen</a>
              <span></span>
            </div>
          </div>
        </form>
        </div>
    </div>
    </div>
    </div>
    </div>

@endsection

