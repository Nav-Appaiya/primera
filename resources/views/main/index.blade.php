@extends('layouts.master')

@section('titel', 'Primera shop')
@section('description', 'test')
@section('breadcrumbs', Breadcrumbs::render('home'))

@section('content')

    {{--<div class="row">--}}
        {{--@section('content')--}}
            {{--<section id="advertisement">--}}
                {{--<div class="container">--}}
                    {{--<img src="{{asset('images/shop/advertisement.jpg')}}" alt="" />--}}
                {{--</div>--}}
            {{--</section>--}}

            {{--<section>--}}
                {{--<div class="container">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-sm-3">--}}
                            {{--<div class="left-sidebar">--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="col-sm-9 padding-right">--}}
                            {{--<div class="features_items"><!--features_items-->--}}
                                {{--<h2 class="title text-center">Features Items</h2>--}}
                                {{--@foreach ($products as $product)--}}
                                    {{--<div class="col-sm-4">--}}
                                        {{--<div class="product-image-wrapper">--}}
                                            {{--<div class="single-products">--}}
                                                {{--<div class="productinfo text-center">--}}
                                                    {{--<img src="{{asset('images/shop/product9.jpg')}}" alt="" />--}}
                                                    {{--<h2>${{$product->price}}</h2>--}}
                                                    {{--<p>{{$product->name}}</p>--}}
                                                    {{--<a href="{{url('cart')}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>--}}
                                                    {{--<a href='{{url("products/details/$product->id")}}' class="btn btn-default add-to-cart"><i class="fa fa-info"></i>View Details</a>--}}
                                                {{--</div>--}}
                                                {{--<div class="product-overlay">--}}
                                                    {{--<div class="overlay-content">--}}
                                                        {{--<h2>${{$product->price}}</h2>--}}
                                                        {{--<p>${{$product->name}}</p>--}}
                                                        {{--<form method="POST" action="{{url('cart')}}">--}}
                                                            {{--<input type="hidden" name="product_id" value="{{$product->id}}">--}}
                                                            {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                                                            {{--<button type="submit" class="btn btn-fefault add-to-cart">--}}
                                                                {{--<i class="fa fa-shopping-cart"></i>--}}
                                                                {{--Add to cart--}}
                                                            {{--</button>--}}
                                                        {{--</form>--}}
                                                        {{--<a href='{{url("products/details/$product->id")}}' class="btn btn-default add-to-cart"><i class="fa fa-info"></i>View Details</a>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="choose">--}}
                                                {{--<ul class="nav nav-pills nav-justified">--}}
                                                    {{--<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>--}}
                                                    {{--<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--@endforeach--}}
                                {{--<ul class="pagination">--}}
                                    {{--<li class="active"><a href="">1</a></li>--}}
                                    {{--<li><a href="">2</a></li>--}}
                                    {{--<li><a href="">3</a></li>--}}
                                    {{--<li><a href="">»</a></li>--}}
                                {{--</ul>--}}
                            {{--</div><!--features_items-->--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</section>--}}
        {{--@endsection--}}
    {{--</div>--}}


        <div class="your-class container">
            <div><img src="http://lorempixel.com/1140/300/sports/"></div>
            <div><img src="http://lorempixel.com/1140/300/sports/"></div>
            <div><img src="http://lorempixel.com/1140/300/sports/dummy-mage"></div>
        </div>
    <div class="col-lg-12">
        <h2>Nieuwste Producten</h2>
    </div>
    @foreach($products->first()->product->where('status', 'on')->skip(0)->take(10)->get() as $product)
        @if(!$product->property->isEmpty())
            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <img src="{{$product->productimages->first() ? '/images/product/'.$product->productimages->first()->imagePath : 'http://www.inforegionordest.ro/assets/images/default.jpg' }}" width="100%" height="220px" class="">
                        <div class="row">
                        <div class="col-md-6 col-xs-6">
                            <h4>{!! $product->name !!}</h4>
                        </div>

                        <div class="col-md-6 col-xs-6">
                        @if($product->discount == 0)
                            <h3 class="pull-right"><label>&euro;{{number_format($product->price, 2, '.', ',')}}</label></h3>
                        @else
                            <h3 class="pull-right"><small style="text-decoration:line-through;">&euro;{{number_format($product->price, 2, '.', ',')}}</small></h3>
                            <h3 class="pull-right" style="margin-top: -16px;"><label style="color: red">&euro;{{number_format($product->price - $product->discount, 2, '.', ',')}}</label></h3>
                        @endif
                        </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="btn-group cart">
                            <a href="{{ route('product.show', [str_replace(' ', '-', $product->name), $product->id]) }}" class="btn btn-info btn-product">
                                bekijken
                            </a>
                        </div>
                        <div class="btn-group wishlist">
                            <form action="{{ route('cart.add') }}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                        </div>
                        <font class="pull-right">
                            @if($product->property()->sum('stock') == 0)
                                uitverkocht
                            @else
                                op voorraad
                            @endif
                        </font>
                    </div>
                </div>
            </div>

        @endif

    @endforeach

@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>

@endpush

@push('script')
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>

<script>
    $(document).ready(function(){
        $('.your-class').slick({

        });
    });
</script>
    {{--<script>--}}
        {{--$(document).ready( function() {--}}
            {{--$('#myCarousel').carousel({--}}
                {{--interval:   4000--}}
            {{--});--}}

            {{--var clickEvent = false;--}}
            {{--$('#myCarousel').on('click', '.nav a', function() {--}}
                {{--clickEvent = true;--}}
                {{--$('.nav li').removeClass('active');--}}
                {{--$(this).parent().addClass('active');--}}
            {{--}).on('slid.bs.carousel', function(e) {--}}
                {{--if(!clickEvent) {--}}
                    {{--var count = $('.nav').children().length -1;--}}
                    {{--var current = $('.nav li.active');--}}
                    {{--current.removeClass('active').next().addClass('active');--}}
                    {{--var id = parseInt(current.data('slide-to'));--}}
                    {{--if(count == id) {--}}
                        {{--$('.nav li').first().addClass('active');--}}
                    {{--}--}}
                {{--}--}}
                {{--clickEvent = false;--}}
            {{--});--}}
        {{--});--}}
    {{--</script>--}}
@endpush