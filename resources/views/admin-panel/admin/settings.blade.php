@extends('admin-panel.layouts.admin')

@section('title', 'Dashboard')
@section('breadcrumb', Breadcrumbs::render('dashboard'))

@section('content')

    Settings
    {{$path}}


    {!! Form::open(array('route' => 'dashboard.settings.update', 'method' => 'PATCH')) !!}

        {!! Form::label('PACKAGE_POST_PRICE', 'PACKAGE_POST_PRICE') !!}
        {!! Form::text('PACKAGE_POST_PRICE', env('PACKAGE_POST_PRICE'), ['class' => 'form-control', 'placeholder' => '']) !!}

        {!! Form::label('PACKAGE_GET_PRICE', 'PACKAGE_GET_PRICE') !!}
        {!! Form::text('PACKAGE_GET_PRICE', env('PACKAGE_GET_PRICE'), ['class' => 'form-control', 'placeholder' => '']) !!}

        {!! Form::label('MOLLIE_KEY_LIVE', 'MOLLIE_KEY_LIVE') !!}
        {!! Form::text('MOLLIE_KEY_LIVE', env('MOLLIE_KEY_LIVE'), ['class' => 'form-control', 'placeholder' => '']) !!}

        {!! Form::label('MOLLIE_KEY_TEST', 'MOLLIE_KEY_TEST') !!}
        {!! Form::text('MOLLIE_KEY_TEST', env('MOLLIE_KEY_TEST'), ['class' => 'form-control', 'placeholder' => '']) !!}

        {!! Form::label('MOLLIE_TEST_MODE', 'MOLLIE_TEST_MODE') !!}
        {!! Form::text('MOLLIE_TEST_MODE', env('MOLLIE_TEST_MODE'), ['class' => 'form-control', 'placeholder' => '']) !!}

        {!! Form::submit('aanpassen', ['class' => 'brn btn-primary']) !!}
    {!! Form::close() !!}


        PACKAGE_POST_PRICE=4.95
    PACKAGE_GET_PRICE=0

    MOLLIE_KEY_LIVE=
    MOLLIE_KEY_TEST=
    MOLLIE_TEST_MODE=
@stop

@push('scripts')

@endpush
