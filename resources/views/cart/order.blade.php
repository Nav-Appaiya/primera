@extends('layouts.master')

@section('titel', 'Winkelwagen shop')
@section('breadcrumbs', Breadcrumbs::render('cart'))

@section('content')

    <div class="row">
        <div class="col-lg-12">
            @include('layouts.checkout-step')
            <hr>
            <center>
                <h2>Bedankt voor uw bestelling het word nu verwerkt</h2>
                <p>U ontvang een email zodra de bestelling verwerkt is.</p>
            </center>
        </div>

        <div class="col-lg-9">
{{--            {{isset($order) ? $order : ''}}--}}
            {{--{{isset($payment) ? $payment : ''}}--}}
            {{--{{dd($payment)}}--}}
        </div>
        <div class="col-lg-3">

        </div>
    </div>

@stop

@push('script')

@endpush

@push('css')

@endpush

