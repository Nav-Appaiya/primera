@extends('admin-panel.layouts.admin')

@section('title', 'user')
@section('breadcrumb', Breadcrumbs::render('dashboard.user.edit', $user->id))

@section('content')

    <div class="row">
        <div class="col-lg-6">
            <div class="table-responsive">
                <div class="panel panel-default">
                    <div class="panel-body">

                        {!! Form::model($user, array('route' => ['admin_user_update', $user->id], 'method' => 'patch')) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'username') !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('voorletters', 'voorletters') !!}
                            {!! Form::text('voorletters', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('voornaam', 'voornaam') !!}
                            {!! Form::text('voornaam', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('achternaam', 'achternaam') !!}
                            {!! Form::text('achternaam', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('geboortedatum', 'geboortedatum') !!}
                            {!! Form::date('geboortedatum', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('geslacht', 'geslacht') !!}<br>
                            <label>male</label> {!! Form::radio('geslacht', 'man') !!}<br>
                            <label>female</label> {!! Form::radio('geslacht', 'vrouw') !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('adres', 'adres') !!}
                            {!! Form::text('adres', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('huisnummer', 'huisnummer') !!}
                            {!! Form::text('huisnummer', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('postcode', 'postcode') !!}
                            {!! Form::text('postcode', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('woonplaats', 'woonplaats') !!}
                            {!! Form::text('woonplaats', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('telMobiel', 'telMobiel') !!}
                            {!! Form::text('telMobiel', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('telThuis', 'telThuis') !!}
                            {!! Form::text('telThuis', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('huisnummer', 'huisnummer') !!}
                            {!! Form::text('huisnummer', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('geboortedatum', 'geboortedatum') !!}
                            {!! Form::text('geboortedatum', null, array('id' => 'datepicker', 'class' => 'form-control')) !!}
                        </div>

                        {!! Form::submit('Wijzigen', ['class' => 'btn btn-primary']) !!}

                        <a href="{{ URL::route('admin_user_index') }}" class="btn btn-default">terug</a>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('javascript')

@endsection