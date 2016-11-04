@extends('layouts.master')

@section('titel', 'Winkelwagen shop')
@section('breadcrumbs', Breadcrumbs::render('cart'))

@section('content')

    <div class="row">
        <div class="col-lg-12">
            @include('layouts.checkout-step')
            <hr>
            <center>
                <h2>Winkelwagen Betalen</h2>
            </center>
        </div>

        <div class="col-lg-12">

            <div class="row">

                <div class="col-lg-8 well">

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Artikel</th>
                                <th>Aantal</th>
                                <th>Prijs Totaal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->orderItems as $product)
                                <tr>
                                    <td>
                                        <img width="70" alt="" src="/images/product/{{($product->property->product->productimages->first()->imagePath)}}">
                                    </td>
                                    <td> {{($product->property->product->name )}} - {{$product->property->detail->value}}</td>
                                        {{--{{$product->product->name}}--}}

                                    <td>x{{$product->amount}}</td>
{{--                                    <td> €{{$product->property->product->price - $product->property->product->discount}}</td>--}}
                                    <td> €{{number_format($product->amount * $product->property->product->price - $product->property->product->discount, 2)}}</td>
                                </tr>
                            @endforeach

                            @if($order->delivery_type == 'verzenden')
                                <tr>
                                    <td>

                                    </td>
                                    <td>
                                        verzendingskosten
                                    </td>
                                    <td>
                                        x1
                                    </td>
                                    <td>
                                        €{{env('PACKAGE_POST_PRICE')}}
                                    </td>
                                </tr>
                            @endif

                        </tbody>
                    </table>


                    @if($order)

                        <br>
                        <div class="row">
                            <div class="col-lg-6">

                                {!! Form::model(null, array('route' => 'order.create', 'method' => 'POST')) !!}

                                {!! Form::hidden('order_id', $order->id) !!}

                                @if($order->payment_method == 'ideal')

                                    <label>Selecteer uw bank</label>
                                    <select name="issuer_id">
                                        @foreach ($issuers as $issuer)
                                            @if ($issuer->method == Mollie_API_Object_Method::IDEAL)
                                                <option value="{{$issuer->id}}">{{$issuer->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                @endif

                                <br>

                                {!! Form::submit('Betalen', array('class' => 'form-control')) !!}

                                <br>
                                {!! Form::checkbox('voorwaarden', $order->id) !!}
                                <small style="{{$errors->has('voorwaarden') ? 'font-weight: bold; color: #a94442;' : '' }}"> Gaat u akkoord met de <a style="text-decoration: underline" href="{{route('voorwaarde')}}">algemene voorwaarden</a> van esigaret eindhoven</small>

                                {{ Form::close() }}
                            </div>

                            <div class="col-lg-6">
                                @if($order->payment_method == 'ideal')
                                    <img src="{{$ideal->image->bigger}}">
                                @endif
                                <div class="pull-right">
                                    <b style="font-size: 18px;">Totaal prijs €{{ number_format($order->total_price + $order->delivery_price, 2)}}</b><br>
                                    <small>Incl. verzending & 21% btw </small>
                                </div>

                            </div>

                        </div>
                    @else
                        ssad
                    @endif
                </div>

                <div class="col-lg-4">
                    <div class="">
                        <div class="col-lg-12">
                            <h1>Uw gegevens</h1>
                            @if(Auth::check())
                                email: {{Auth::user()->email}}<br>
                                Naam: {{$order->name}}
                            @else
                                email: {{$order->email}}<br>
                                Naam: {{$order->name}} {{$order->achternaam}}
                            @endif
                        </div>
                        <div class="col-lg-6">
                            {{--TODO als verzendmethode ophalen is moet het afleveradres vervangen worden met afhaaladres--}}
                            <h3>Afleveradres</h3>
                            <p>{{$order->adres}} {{$order->huisnummer}}, <br>{{$order->postcode}} {{$order->woonplaats}}</p>
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

