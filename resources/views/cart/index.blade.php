@extends('layouts.master')

@section('titel', 'Winkelwagen shop')
@section('breadcrumbs', Breadcrumbs::render('cart'))

@section('content')

    <div class="row">
        <div class="col-lg-12">

            @include('layouts.checkout-step')

            <center>
                <h2>Winkelwagen</h2>
            </center>
        </div>

        <div class="col-lg-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive cart_info">
                        @if(count($cart))
                            <table class="table table-condensed">
                                <thead>
                                    <tr class="cart_menu">
                                        <td class="image">Foto</td>
                                        <td class="description">Product</td>
                                        <td class="price">Price</td>
                                        <td class="quantity">Aantal</td>
                                        <td class="total">Totaal</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cart as $item)
                                        <tr>
                                            <td class="cart_product">
                                                <a href="{{$item->options[0]}}"><img height="150" width="150" src="/images/product/{{$item->options[0]->product->productimages->first()->imagePath}}" alt=""></a>
                                            </td>
                                            <td class="cart_description"><br>
                                                <h4>
                                                    <a href="{{route('product.show', [str_replace(' ', '-', $item->name), $item->id])}}">
                                                        {{$item->name}} - {{$item->options[0]->detail->value}}
                                                    </a>
                                                </h4>
                                                <p>Product Nr: {{$item->id}}</p>
                                            </td>
                                            <td class="cart_price"><br>
                                                <p>€{{$item->price}}</p>
                                            </td>
                                            <td class="cart_quantity"><br>
                                                <div class="cart_quantity_button">
                                                    @if($product->find($item->id)->stock > $item->qty)
                                                        <form method="POST" action="{{route('cart.increase')}}" style="display: inline-block">
                                                            <input type="hidden" name="product_id" value="{{$item->id}}">
                                                            <input type="hidden" name="increment" value="1">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <button type="submit" class="btn btn-fefault add-to-cart">
                                                                <i class="fa phpdebugbar-fa-plus"></i>
                                                            </button>
                                                        </form>
                                                    @else
                                                        <button type="submit" class="btn btn-fefault add-to-cart" disabled>
                                                            <i class="fa phpdebugbar-fa-plus"></i>
                                                        </button>
                                                    @endif
                                                    <input class="cart_quantity_input" type="text" name="quantity" value="{{$item->qty}}" autocomplete="off" size="2">
                                                    @if($item->qty > 1)
                                                        <form method="POST" action="{{route('cart.decrease')}}" style="display: inline-block">
                                                            <input type="hidden" name="product_id" value="{{$item->id}}">
                                                            <input type="hidden" name="decrease" value="0">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <button type="submit" class="btn btn-fefault add-to-cart">
                                                                <i class="fa phpdebugbar-fa-minus"></i>
                                                            </button>
                                                        </form>
                                                    @else
                                                        <button type="submit" class="btn btn-fefault add-to-cart" disabled>
                                                            <i class="fa phpdebugbar-fa-minus"></i>
                                                        </button>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="cart_total"><br>
                                                <p class="cart_total_price">€{{$item->subtotal}}</p>
                                            </td>
                                            <td class="cart_delete"><br>
                                                <form method="POST" action="{{route('cart.remove')}}">
                                                    <input type="hidden" name="product_id" value="{{$item->id}}">
                                                    <input type="hidden" name="remove" value="true">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-fefault add-to-cart">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>You have no items in the shopping cart</p>
                        @endif

                    </div>

                    {{--@if(Session::has('cart'))--}}
                        {{--<div class="row well">--}}
                            {{--<div class="col-xs-2">Foto</div>--}}
                            {{--<div class="col-xs-4">Naam</div>--}}
                            {{--<div class="col-xs-2">korting</div>--}}
                            {{--<div class="col-xs-4">Prijs</div>--}}
                        {{--</div>--}}
                        {{--{{dd(Session::get('cart'))}}--}}
                        {{--@foreach($products->items as $product => $key)--}}
                            {{--{{($product)}}--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-xs-2">--}}
                                    {{--<img class="img-responsive"--}}
                                         {{--src="/images/product/{{$key['item']->product->productimages->first()->imagePath}}">--}}
                                {{--</div>--}}
                                {{--<div class="col-xs-4">--}}
                                    {{--<h4 class="product-name">--}}
                                        {{--<strong>{{$key['item']->product->name}} {{$key['item']->detail ? '- '.$key['item']->detail->value : ''}}</strong>--}}
                                        {{--<br>--}}
                                        {{--<small>{{str_limit($key['item']->product->description, 60, '...')}}</small>--}}
                                    {{--</h4>--}}
                                {{--</div>--}}
                                {{--<div class="col-xs-6">--}}
                                    {{--<div class="col-xs-4">--}}
                                        {{--<h6><strong>{{$key['item']->product->discount != 0 ? '€'.$key['item']->product->discount : ''}}<span class="text-muted"></span></strong></h6>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-xs-4">--}}
                                        {{--<h6><strong>€{{ number_format($key['price'], 2)}}<span class="text-muted"></span></strong></h6>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-xs-4">--}}

                                        {{--<form action="{{ route('cart.remove') }}" method="post">--}}
                                            {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                                            {{--<button type="submit" class="btn btn-sm btn-default fa fa-minus pull-left" name="serialcode" {{$key['qty'] == 1 ? 'disabled' : '' }}--}}
                                                    {{--id="serialcode" value="{{ $key['item']->serialNumber }}">--}}
                                            {{--</button>--}}
                                        {{--</form>--}}

                                        {{--<input type="text" style="width: 40px; margin-right: 4px;"--}}
                                               {{--class="form-control input-sm pull-left text-center"--}}
                                               {{--value="{{$key['qty']}}" disabled>--}}

                                        {{--<form action="{{ route('cart.add') }}" method="post">--}}
                                            {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                                            {{--<button type="submit" class="btn btn-sm btn-default fa fa-plus pull-left" name="serialcode"--}}
                                                    {{--id="serialcode" value="{{ $key['item']->serialNumber }}">--}}
                                            {{--</button>--}}
                                        {{--</form>--}}

                                    {{--</div>--}}
                                    {{--<div class="col-xs-2">--}}

                                        {{--<form action="{{ route('cart.remove_key') }}" method="post">--}}
                                            {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                                            {{--<button type="submit" class="btn btn-sm btn-default pull-left" name="serialcode"--}}
                                                    {{--id="serialcode" value="{{ $product }}">--}}
                                                {{--<span class="glyphicon glyphicon-trash"> </span>--}}
                                            {{--</button>--}}
                                        {{--</form>--}}

                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<hr>--}}
                        {{--@endforeach--}}
                    {{--@else--}}
                        {{--Uw winkelwagen is leeg.--}}
                    {{--@endif--}}
                </div>

            </div>
        </div>
        <div class="col-lg-3">
            <div class="panel panel-default">
                <div class="panel-body">

                    <h5 class="text-right">Subtotaal excl. btw <strong>€ {{ Session::has('cart') ? number_format(Cart::total() - round( (Cart::total() / 100) * 21, 2), 2) : 0}}</strong>
                    </h5>
                    <small class="pull-right">btw 21%
                        <strong>€ {{Session::has('cart') ? round( (Cart::total() / 100) * 21, 2) : 0}}</strong>
                    </small>

                    <br>
                    <h4 class="text-right">Totaal incl. btw
                        € <strong id="totalprice">{{ Session::has('cart') ? number_format(Cart::total(), 2) : 0}}</strong>
                    </h4>
                    <hr/>
                    <a href="{{count(Cart::content()) ? URL::route('cart.checkout') : ''}}" class="btn btn-success btn-block" {{count(Cart::content()) ? '': 'disabled'}}>
                        afrekenen
                    </a>
                    {{Form::open(['route' => 'cart.destroy'])}}
                        {{Form::submit('legen', ['class' => 'btn btn-danger btn-block', count(Cart::content()) ? '': 'disabled'])}}
                    {{Form::close()}}
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
{{--<link rel="stylesheet" type="text/css" href="css/msdropdown/dd.css"/>--}}
@endpush

