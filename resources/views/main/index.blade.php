@extends('layouts.master')

@section('titel', 'Home')
@section('description', '')
@section('breadcrumbs', Breadcrumbs::render('home'))

@section('content')
    <div class="row">
    <div class="col-lg-12" >
        <div class="row">
            <div class="your-class col-xs-12 col-sm-8 col-md-8 col-lg-9" style="margin-top: -0px">

                <img class="img-responsive" style="height: 405px;" src="/images/slider/shutterstock_166848608.jpg">


                {{--<div>--}}
                <img class="img-responsive" style="height: 405px;" src="/images/slider/shutterstock_166848608.jpg">

                {{--</div>--}}
                {{--<div class="col-lg-12">--}}
                    {{--<div class="row">--}}

                <img class="img-responsive" style="height: 405px;" src="/images/slider/shutterstock_349225046.jpg">
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

                    <a href="{{ route('product.show', [str_replace(' ', '-', $product->name), $product->id]) }}">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
                            <div class="product">
                                <div class="col-lg-12">
                                    <div class="image">
                                        <img src="{{$product->productimages->first() ? '/images/product/'.$product->productimages->first()->imagePath : 'http://www.inforegionordest.ro/assets/images/default.jpg' }}" width="100%">
                                    </div>
                                    <div class="title">
                                        <h3>{{$product->name}}</h3>
                                    </div>
                                    <div class="vooraad text-muted">
                                        @if($product->property->sum('stock') > 1)
                                            op vooraad
                                        @else
                                            Uitverkocht
                                        @endif
                                    </div>
                                    <div class="prijs">
                                        @if($product->discount != 0)
                                            <div class="text-center">
                                                <small style="text-decoration:line-through;">&euro; {{$product->price}}</small>
                                                <b style=""> &euro; {{number_format($product->price - $product->discount, 2)}}</b>
                                            </div>
                                        @else
                                            <div class="text-center">&euro; {{number_format($product->price, 2)}}</div>
                                        @endif
                                    </div>
                                </div>
                                    <div class="information">
                                        <span class="product-hover">Bekijken</span>
                                    </div>
                            </div>
                        </div>
                    </a>

                @endif
            @endforeach
        </div>
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