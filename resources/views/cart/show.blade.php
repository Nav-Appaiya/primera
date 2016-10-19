@extends('layouts.master')

@section('titel', 'Winkelwagen shop')
@section('breadcrumbs', Breadcrumbs::render('cart'))

@section('content')

    <div class="row">
        <div class="col-lg-12">
            @include('layouts.checkout-step')

            <center>
                <h2>Winkelwagen Betalen</h2>
            </center>
        </div>

        <div class="col-lg-12">
            {{--{{dd($order)}}--}}
            <div class="row">

                <div class="col-lg-8 well">
                    @foreach($order->orderItems as $product)
                        <div class="row">
                            <div class="col-lg-4">

                                <img width="70" alt="" src="/images/product/{{($product->property->product->productimages->first()->imagePath)}}">

                                {{($product->property->product->name)}}
                                {{--{{$product->product->name}}--}}
                            </div>
                            <div class="col-lg-4">
                                x{{$product->amount}}
                            </div>
                            <div class="col-lg-4">
                                €{{$product->property->product->price - $product->property->product->discount}}
                            </div>

                        </div><hr>
                    @endforeach

                    @if($order->delivery_type == 'verzenden')
                        <div class="row">
                            <div class="col-lg-4">
                                Totaal prijs €{{ number_format($order->total_price + $order->delivery_price, 2)}}<br><small>Incl. verzending & btw </small>
                                {{--<a class="pull-right" href="{{route('order.create', $order->id)}}"> Afrekenen</a>--}}

                                {!! Form::model(null, array('route' => 'order.create', 'method' => 'POST')) !!}

                                {!! Form::hidden('order_id', $order->id) !!}

                                <select name="issuer_id">
                                    @foreach ($issuers as $issuer)
                                        @if ($issuer->method == Mollie_API_Object_Method::IDEAL)
                                            <option value="{{$issuer->id}}">{{$issuer->name}}</option>
                                        @endif
                                    @endforeach
                                </select>

                                {!! Form::submit('Betalen', array('class' => 'form-control')) !!}


                                {{ Form::close() }}
                            </div>

                            <div class="col-lg-4">
                                verzendingskosten
                            </div>
                            <div class="col-lg-4">
                                1x
                            </div>
                            <div class="col-lg-4">
                                €{{$order->delivery_price}}
                            </div>
                        </div>
                    @endif
                </div>

                <div class="col-lg-4 well">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>Uw gegevens</h1>
                            {{Auth::user()->email}}<br>
                            {{Auth::user()->voornaam}} {{Auth::user()->achternaam}}
                        </div>
                        <div class="col-lg-6">
                            {{--TODO als verzendmethode ophalen is moet het afleveradres vervangen worden met afhaaladres--}}
                            <h3>Afleveradres</h3>
                            <p>{{Auth::user()->adres}} {{Auth::user()->huisnummer}}, <br>{{Auth::user()->postcode}} {{Auth::user()->woonplaats}}</p>
                        </div>
                        <div class="col-lg-6">
                            <h3>Factuuradres</h3>
                            <p>{{$order->adres}} {{$order->huisnummer}}, <br>{{$order->postcode}} {{$order->woonplaats}}</p>
                        </div>
                    </div>
                    <br>
                </div>

            </div>

        </div>

    </div>

@stop

@push('script')

@endpush

@push('css')

@endpush

