@extends('admin-panel.layouts.admin')

@section('title', 'orders')
{{--@section('breadcrumb', Breadcrumbs::render('dashboard.orders.edit', $order->id))--}}

@section('content')

    <div class="row">
        <div class="col-lg-6">

            @include('errors.message')

            {!! Form::model($order, array('route' => array('admin_order_update', $order->id), 'class' => '', 'method' => 'post' )) !!}

            <fieldset>

                <!-- id -->
                <div class="form-group">
                    {!! Form::label('id', 'id') !!}
                    {!! Form::text('id', null, ['class' => 'form-control', 'placeholder' => '', 'disabled']) !!}
                </div>

                <!-- price -->
                <div class="form-group">
                    {!! Form::label('price', 'price') !!}
                    {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => '', 'disabled']) !!}
                </div>

                <!-- order_id -->
                <div class="form-group">
                    {!! Form::label('order_id', 'order id') !!}
                    {!! Form::text('order_id', null, ['class' => 'form-control', 'placeholder' => '', 'disabled']) !!}
                </div>

                <!-- order_id -->
                <div class="form-group">
                    {!! Form::label('mollie_id', 'mollie id') !!}
                    {!! Form::text('mollie_id', null, ['class' => 'form-control', 'placeholder' => '', 'disabled']) !!}
                </div>

                <!-- status -->
                <div class="form-group">
                    {!! Form::label('status', 'status') !!}
                    {{--{!! Form::select('status', \App\CreditOrder::lists('status', 'status'), null, ['class' => 'form-control'] ) !!}--}}
                </div>

                <!-- Submit Button -->
                <div class="form-group">
                    {!! Form::submit('Submit', ['class' => 'btn btn-sm btn-primary pull-right'] ) !!}

                </div>

            </fieldset>

            {!! Form::close()  !!}

        </div>
    </div>

@endsection