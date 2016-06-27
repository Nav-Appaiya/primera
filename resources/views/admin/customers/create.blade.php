@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session()->has('status'))
            <p class="alert alert-info">
                {{	session()->get('status') }}
            </p>
        @endif
        <div class="col-sm-6 col-sm-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Toevoegen Klant
                </div>
                <div class="panel-body">
                    {{ Form::open(['url' => route('admin.customers.create'), 'method' => 'POST' ]) }}
                    @include('admin.customers._form')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
