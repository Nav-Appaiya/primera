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
                            <h4 class="text-right">incl. btw <strong>€ {{Session::has('cart') ? round( ($products['price'] / 100) * 3.8, 2) : 0}}</strong></h4>

                            {!! Form::model(null, array('route' => array('cart.update'), 'method' => 'PATCH')) !!}

                                <label>Levering</label><br>

                            {{ Form::text('text', null, ['class' => 'form']) }}
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
                                ?>
                                <br>
                                <label>Betaalmethoden</label>
                                <br>
                            {{--{{dd($methods)}}--}}

                                <select onchange="this.form.submit()">
                                    @foreach ($methods as $method)
                                        <option value="{{$method->id}}" style="background-image:url({{$method->image->normal}});">
                                             {{($method->description)}}
                                             {{htmlspecialchars($method->id)}}
                                             <small class="text-right" style="font-size: 6px !important;">+ {{$method->amount->minimum}}</small>
                                        </option>
                                    @endforeach
                                </select>
                                <br><br>


                                <?php

    //                            $data = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?region=NL&language=nederlands&address=' . rawurlencode('pietercoecke straat 14'));
    //                            $data = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?sensor=false&address=' . rawurlencode('5643 VK'));
    //                            $object = json_decode($data);
    //                            dd($object);

                                ?>


                            {!! Form::submit('afrekenen', ['class' => 'btn btn-success btn-block'])!!}

                            <a href="{{URL::route('cart.empty')}}" class="btn btn-danger btn-block">
                                legen
                            </a>

                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('script')
<script src="js/msdropdown/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="js/msdropdown/jquery.dd.min.js" type="text/javascript"></script>
{{--<link rel="stylesheet" type="text/css" href="css/msdropdown/dd.css" />--}}
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

@push('css')
<link rel="stylesheet" type="text/css" href="css/msdropdown/dd.css" />
@endpush

