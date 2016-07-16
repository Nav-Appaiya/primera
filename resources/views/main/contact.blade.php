

@extends('layouts.master')

@section('titel', 'Primera shop')
@section('seotags', 'seotags')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">Contact met ons opnemen</h3>

                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @if(Session::has('message'))
                    <div class="alert alert-info">
                        {{Session::get('message')}}
                    </div>
                @endif

                {!! Form::open(array('route' => 'contact_store', 'class' => 'form')) !!}

                <div class="form-group">
                    {!! Form::label('Naam') !!}
                    {!! Form::text('name', null,
                        array('required',
                              'class'=>'form-control',
                              'placeholder'=>'Volledige naam')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Email-adres') !!}
                    {!! Form::text('email', null,
                        array('required',
                              'class'=>'form-control',
                              'placeholder'=>'john@doe.nl')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Bericht') !!}
                    {!! Form::textarea('message', null,
                        array('required',
                              'class'=>'form-control',
                              'placeholder'=>'Je bericht, vraag of opmerking aan ons.')) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Formulier verzenden',
                      array('class'=>'btn btn-primary')) !!}
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection

