@extends('layouts.master')

@section('titel', 'Home')
@section('description', '')
@section('breadcrumbs', Breadcrumbs::render('home'))

@section('content')

    <div class="col-lg-12">
        <h1>Nieuwste Producten</h1>
    </div>

    <div class="col-lg-12" >
        <div class="row">
            <div class="your-class col-xs-6 col-sm-6 col-md-6" style="margin-top: -0px">

                <img class="img-responsive" style="height: 350px;" src="/images/slider/shutterstock_166848608.jpg">


                {{--<div>--}}
                <img class="img-responsive" style="height: 350px;" src="/images/slider/shutterstock_166848608.jpg">

                {{--</div>--}}
                {{--<div class="col-lg-12">--}}
                    {{--<div class="row">--}}

                <img class="img-responsive" style="height: 350px;" src="/images/slider/shutterstock_349225046.jpg">
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-lg-12">--}}
                    {{--<div class="row">--}}

                <img class="img-responsive" style="height: 350px;" src="/images/slider/shutterstock_166848608.jpg">
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-lg-12">--}}
                    {{--<div class="row">--}}

                <img class="img-responsive" style="height: 350px;" src="/images/slider/shutterstock_490274650.jpg">
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-lg-12">            <div class="row">--}}

                <img class="img-responsive" style="height: 350px;" src="/images/slider/shutterstock_490891624.jpg">
                    {{--</div>--}}
                {{--</div>--}}
            </div>


            @foreach($products as $product)
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
                                    <div class="sale"></div>
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
        </div>
    </div>
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