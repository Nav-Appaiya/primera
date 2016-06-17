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
                Order lijst
                <a href="{{ route('orders.create') }}" class="btn btn-success btn-xs">Order toevoegen</a>
            </div>
            <div class="panel-body">
                @if (isset($order))
                    <h1>Edit Order {{ $order->id }}</h1>

                    <!-- if there are creation errors, they will show here -->

                    {{ Html::ul($errors->all()) }}
                    {{ Form::model($order, array('route' => array('orders.store', $order->id), 'method' => 'POST')) }}

                    <div class="form-group">
                        {{ Form::label('name', 'Name') }}
                        {{ Form::text('name', null, array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('email', 'Email') }}
                        {{ Form::email('email', null, array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('password', 'password') }}
                        {{ Form::select('password', array('0' => 'Select a Level', '1' => 'Sees Sunlight', '2' => 'Foosball Fanatic', '3' => 'Basement Dweller'), null, array('class' => 'form-control')) }}
                    </div>

                    {{ Form::submit('Edit the Nerd!', array('class' => 'btn btn-primary')) }}

                    {{ Form::close() }}

                @else
                    <p class="alert alert-info">
                        No Listing Found
                    </p>
                @endif
            </div>
        </div>
    </div>
@endsection
