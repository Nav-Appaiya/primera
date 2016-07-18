@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session()->has('status'))
            <p class="alert alert-info">
                {{	session()->get('status') }}
            </p>
        @endif
        <div class="panel panel-default">
            <div class="panel-heading">
                Klant bewerken
            </div>
            <div class="panel-body">
                @if (isset($customer))
                    <h1>Bewerk <strong>{{ $customer->voornaam }}</strong> </h1>


                <!-- if there are creation errors, they will show here -->

                    {{ Html::ul($errors->all()) }}
                    {{ Form::model($customer, array('route' => array('admin.customers.store', $customer->id), 'method' => 'POST')) }}

                    <div class="form-group">
                        {{ Form::label('voornaam', 'Voornaam') }}
                        {{ Form::text('voornaam', null, array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('achternaam', 'Achternaam') }}
                        {{ Form::text('achternaam', null, array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('email', 'Email') }}
                        {{ Form::email('email', null, array('class' => 'form-control')) }}
                    </div>



                    {{ Form::submit('Bewerking opslaan', array('class' => 'btn btn-primary')) }}

                    {{ Form::close() }}

                @else
                    <p class="alert alert-info">
                        Geen items gevonden.
                    </p>
                @endif
            </div>
        </div>
    </div>
@endsection
