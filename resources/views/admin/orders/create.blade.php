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
                    Toevoegen order
                </div>
                <div class="panel-body">
                    {{ Form::open(['url' => route('orders.store'), 'method' => 'POST' ]) }}
                        @include('admin.orders._form')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
