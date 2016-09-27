@extends('layouts.master')

@section('titel', 'Winkelwagen shop')

@section('content')

    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col-lg-2 col-lg-offset-1">
                    <div class="table-bordered">
                        @if(Session::has('cart'))
                            <a><i class="fa fa-check-circle-o" style="color: #2cff1c" aria-hidden="true"></i> Bestelling</a><br>
                            product(en) - {{Session::get('cart')['qty']}}<br>
                            Totaal prijs - {{Session::get('cart')['price']}}<br>
                        @else
                            <a><i class="fa fa-times-circle-o" style="color: #8e8b92;" aria-hidden="true"></i> Gegevens</a><br>
                            U heeft geen producten in uw winkelwagen
                        @endif


                    </div>
                </div>
                <div class="col-lg-2">

                    <div class="table-bordered">
                        @if(Auth::check())
                            @if(Auth::user()->adres && Auth::user()->huisnummer && Auth::user()->voornaam && Auth::user()->achternaam && Auth::user()->postcode && Auth::user()->woonplaats)
                                 <a><i class="fa fa-check-circle-o" style="color: #2cff1c" aria-hidden="true"></i> Gegevens</a><br>
                                {{Auth::user()->voornaam}} {{ Auth::user()->achternaam}}<br>
                                {{Auth::user()->adres}} -  {{Auth::user()->huisnummer}}<br>
                                {{Auth::user()->postcode}} -  {{Auth::user()->woonplaats}}
                            @else
                                <a><i class="fa fa-times-circle-o" style="color: #8e8b92;" aria-hidden="true"></i> Gegevens</a><br>
                                U heeft nog geen of volledig adres opgegeven
                            @endif
                        @else
                            <a><i class="fa fa-times-circle-o" style="color: #8e8b92;" aria-hidden="true"></i> Gegevens</a><br>
                            <a>Inloggen</a>
                        @endif

                    </div>
                </div>
                <div class="col-lg-2">
                    <a>levering</a>
                </div>
                <div class="col-lg-2">
                    <a>betaling</a>
                </div>
                <div class="col-lg-2">
                    <a>Bevestiging</a>
                </div>
            </div>
            <div class="col-xs-8">
                <div class="panel">
                    <div class="panel-body">

                        <h1>Winkelwagen</h1>
                        <hr>
                        @if(Session::has('cart'))
                            @foreach($products->items as $product)
                                <div class="row">
                                    <div class="col-xs-2">
                                        <img class="img-responsive" src="/images/product/{{$product['item']->product->productimages->first()->imagePath}}">

                                    </div>
                                    <div class="col-xs-4">
                                        <h4 class="product-name">
                                            <strong>{{$product['item']->product->name}} {{$product['item']->detail ? '- '.$product['item']->detail->value : ''}}</strong>
                                            <br>
                                            <small>{{str_limit($product['item']->product->description, 60, '...')}}</small>
                                        </h4>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="col-xs-4 text-right">
                                            <h6><strong>€{{number_format($product['price'], 2)}}<span class="text-muted"></span></strong></h6>
                                        </div>
                                        <div class="col-xs-6">
                                            <a href="{{route('cart.add', $product['item']->product->id)}}" class="btn btn-sm btn-default fa fa-minus pull-left" aria-hidden="true"></a>
                                            <input type="text" style="width: 40px; margin-right: 4px;" class="form-control input-sm pull-left text-center" value="{{$product['qty']}}" disabled>
                                            <a href="{{route('cart.add', $product['item']->product->name)}}" class="btn btn-sm btn-default fa fa-plus pull-left" aria-hidden="true"></a>
                                        </div>
                                        <div class="col-xs-2">
                                            <button type="button" class="btn btn-link btn-xs">
                                                <span class="glyphicon glyphicon-trash"> </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        @else
                            Uw winkelwagen is leeg.
                        @endif

                    </div>

                </div>
            </div>

            <div class="col-xs-4">
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-12">
                            <h4 class="text-right">Totaal <strong>€ {{Session::has('cart') ? number_format($products['price'], 2) : 0}}</strong></h4>

                            <label>Levering</label><br>

                            <input type="radio" name="levering" value="aa"> Verzenden met PostNL<br>
                            <small>+ €3.95</small><br>

                            <input type="radio" name="levering" value="aa"> Ophalen in Eindhoven <br>
                            <small>+ €0.00</small>

                            <?php

                            $methods = Mollie::api()->methods()->all();
//
//                            $payment = Mollie::api()->payments()->create([
//                                    "amount"      => 10.00,
//                                    "description" => "My first API payment",
//                                    "redirectUrl" => "https://webshop.example.org/order/12345/",
//                            ]);
//
//                            $payment = Mollie::api()->payments()->get($payment->id);
//
//                            if ($payment->isPaid())
//                            {
//                                echo "Payment received.";
//                            }

//                            $mollie = new Mollie_API_Client;
//                            $mollie->setApiKey('test_dHar4XY7LxsDOtmnkVtjNVWXLSlXsM');
//
//                            $methods = $mollie->methods->all();
//
                            foreach ($methods as $method)
                            {
                                echo '<div style="line-height:40px; vertical-align:top">';
                                echo '<img src="' . htmlspecialchars($method->image->normal) . '"> ';
                                echo htmlspecialchars($method->description);
                                echo ' (' .  htmlspecialchars($method->id). ')';
                                echo '</div>';
                            }
                            ?>

                            {{--                                <a href="{{route('cart.store', $product->id)}}">bestellen</a>--}}
                            <a href="{{URL::route('cart.checkout')}}" class="btn btn-success btn-block">
                                afrekenen
                            </a>
                            <a href="{{URL::route('cart.empty')}}" class="btn btn-danger btn-block">
                                legen
                            </a>
                            <?php

//                            $data = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?region=NL&language=nederlands&address=' . rawurlencode('pietercoecke straat 14'));
//                            $data = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?sensor=false&address=' . rawurlencode('5643 VK'));
//                            $object = json_decode($data);
//                            dd($object);

                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--@if(count($products) >= 1)--}}
        {{--<ol class="breadcrumb">--}}
            {{--<li><a href="{{ URL::route('homepage') }}">Homepage</a></li>--}}
            {{--<li class="active">Winkelwagen</li>--}}
        {{--</ol>--}}

        {{--<div class="content">   --}}
            {{--<div class="row">--}}
                {{--<div class="col-md-12">--}}
                    {{--@if (Session::has('status'))--}}
                        {{--<div class="alert alert-info">{{ Session::get('status') }}</div>--}}
                    {{--@endif--}}
                {{--</div>--}}
                {{--<div class="col-md-12">--}}
                    {{--<table id="cart" class="table table-hover table-condensed">--}}
                        {{--<thead>--}}
                        {{--<tr>--}}
                            {{--<th style="width:50%">Product</th>--}}
                            {{--<th style="width:10%">Price</th>--}}
                            {{--<th style="width:8%">Quantity</th>--}}
                            {{--<th style="width:22%" class="text-center">Subtotal</th>--}}
                            {{--<th style="width:10%"></th>--}}
                        {{--</tr>--}}
                        {{--</thead>--}}
                        {{--<tbody>--}}

                        {{--@foreach($products as $item)--}}
                            {{--<tr>--}}
                                {{--<td data-th="Product">--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-sm-3 hidden-xs">--}}
                                            {{----}}
                                            {{--@if(count($item->productimages()->first()) >= 1)--}}
                                                {{--<img src="/uploads/img/{{ $item->productimages()->first()->imagePath }}"--}}
                                                     {{--alt="{{ $item->productimages()->first()->rel }}"--}}
                                                     {{--width="120%" class="text-center" style="margin-top:30px;"--}}
                                                {{-->--}}
                                            {{--@else--}}
                                                {{-- Default image at /images/product/default.jpg --}}
                                                {{--<img src="/uploads/img/default.jpg" alt="{{ $item->name }}"--}}
                                                     {{--class="img-responsive"/>--}}
                                            {{--@endif--}}
                                        {{--</div>--}}
                                        {{--<div class="col-sm-9">--}}
                                            {{--<h4 class="nomargin">{{ $item->name }}</h4>--}}
                                            {{--<p>--}}
                                                {{--<a href="{{ route('product.show', [$item->name, $item->id]) }}">--}}
                                                    {{--{{ $item->description }}--}}
                                                {{--</a>--}}
                                            {{--</p>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</td>--}}
                                {{--<td data-th="Price">&euro; {{ $item->price }}</td>--}}
                                {{--<td data-th="Quantity">--}}
                                    {{--<input type="number" class="form-control text-center" value="1">--}}
                                {{--</td>--}}
                                {{--<td data-th="Subtotal" class="text-center">{{ $item->price }}</td>--}}
                                {{--<td class="actions" data-th="">--}}
                                    {{--<a href="{{ URL::route('cart.remove', $item) }}" class="btn btn-danger btn-sm"--}}
                                       {{--role="button">Verwijderen uit winkelwagen <i class="fa fa-trash-o"></i></a>--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                        {{--@endforeach--}}

                        {{--</tbody>--}}
                        {{--<tfoot>--}}
                        {{--<tr class="visible-xs">--}}
                            {{--<td class="text-center"><strong>Totaal: &euro;{{ number_format($total, 2, '.', ',') }}</strong>--}}
                            {{--</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td><a href="{{ URL::route('homepage') }}" class="btn btn-warning"><i--}}
                                            {{--class="fa fa-angle-left"></i> Nog meer winkelen</a></td>--}}
                            {{--<td colspan="2" class="hidden-xs"></td>--}}
                            {{--<td class="hidden-xs text-center">--}}
                                {{--<strong>Totaal: &euro;{{ number_format($total, 2, '.', ',') }}</strong></td>--}}
                            {{--<td>--}}
                                {{--<a type="button" class="btn btn-success pull-right" href="{{ route('checkout_index') }}">--}}
                                    {{--Bestelling plaatsen--}}
                                {{--</a>--}}
                            {{--</td>--}}
                        {{--</tr>--}}
                        {{--</tfoot>--}}
                    {{--</table>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--@else--}}
                {{--<ol class="breadcrumb">--}}
                    {{--<li><a href="{{ URL::route('homepage') }}">Homepage</a></li>--}}
                    {{--<li class="active">Winkelwagen</li>--}}
                {{--</ol>--}}
                {{--<div class="content">--}}
                    {{--<h3 class="text-center">--}}
                        {{--Je hebt geen artikelen in je winkelwagen.--}}

                        {{--<a href="{{ URL::route('homepage') }}"> Ga naar de producten</a>.--}}
                    {{--</h3>--}}
                {{--</div>--}}
            {{--@endif--}}
        {{--</div>--}}
        {{--<script>--}}
            {{--var items = JSON.parse(localStorage.getItem('cart'));--}}
            {{--for (i = 0; i < JSON.parse(localStorage.getItem('cart')).length; i++) {--}}
                {{--document.write(items[i] + "<br />");--}}
            {{--}--}}
        {{--</script>--}}
@stop

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.devbridge-autocomplete/1.2.26/jquery.autocomplete.js"></script>
    <script>

//        $(document).ready(function() {
//            $('#submit').click(function(e) {
//                e.preventDefault();
//                $.ajax({
//                    type: 'POST',
////                    http://maps.googleapis.com/maps/api/geocode/json?region=NL&language=nederlands&address=pietercoecke%20straat,14
//                    url: 'http://maps.googleapis.com/maps/api/geocode/json?sensor=false&address=5643vk 11',
//                    data: {id1: $('#id1').val()},
//                    success: function(data)
//                    {
//                        console.log(data);
//                        $("#content").html(data);
//                    }
//                });
//            });
//        });

    </script>
@endpush

