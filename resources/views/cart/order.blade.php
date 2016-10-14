@extends('layouts.master')

@section('titel', 'Winkelwagen shop')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            @include('layouts.checkout-step')

            <center>
                <h2>Bedankt voor uw bestelling het word nu verwerkt</h2>
            </center>
        </div>

        <div class="col-lg-9">
            {{isset($order) ? $order : ''}}
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

