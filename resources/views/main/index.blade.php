@extends('layouts.master')

@section('titel', 'Primera shop')
@section('seotags', 'seotags')

@section('sidebar')
    @parent
@endsection

@section('content')
    {{--<ol class="breadcrumb">--}}
      {{--<li><a href="{{ route('homepage') }}">Homepage</a></li>--}}
      {{--<li class="active">Products</li>--}}
    {{--</ol>--}}

    {{--{{ dd() }}--}}
    {{--@foreach($products->first()->product->where('status', 'on')->skip(0)->take(10)->get() as $product)--}}
        {{--@if(!$product->property->isEmpty())--}}

            {{--<div class="col-xs-3 col-sm-3 col-md-3">--}}

            {{--<div class="card">--}}
                {{--<img src="{{$product->productimages->first() ? '/images/product/'.$product->productimages->first()->imagePath : 'http://www.inforegionordest.ro/assets/images/default.jpg' }}" width="100%" height="220px" class="">--}}
                {{--<div class="caption">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-md-6 col-xs-6">--}}
                            {{--<h4>{!! $product->name !!}</h4>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-6 col-xs-6 price">--}}
                            {{--@if($product->discount == 0)--}}
                                {{--<h3 class="pull-right"><label>&euro;{{number_format($product->price, 2, '.', ',')}}</label></h3>--}}
                            {{--@else--}}
                                {{--<h3 class="pull-right"><small style="text-decoration:line-through;">&euro;{{number_format($product->price, 2, '.', ',')}}</small></h3>--}}
                                {{--<h3 class="pull-right" style="margin-top: -16px;"><label style="color: red">&euro;{{number_format($product->price - $product->discount, 2, '.', ',')}}</label></h3>--}}
                            {{--@endif--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="row center-block">--}}

                        {{--<div class="btn-group cart">--}}
                            {{--<a href="{{ route('product.show', [str_replace(' ', '-', $product->name), $product->id]) }}" class="btn btn-info btn-product">--}}
                                {{--Meer weten <span class="fa fa-question-circle"></span>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                        {{--@if($product->property()->sum('stock') == 0)--}}
                            {{--uitverkocht--}}
                        {{--@else--}}
                            {{--op voorraad--}}
                        {{--@endif--}}
                        {{--<div class="btn-group wishlist">--}}
                            {{--<a href="{{ route('cart.add', $product) }}" class="btn btn-success btn-product" onclick="">--}}
                                {{--In winkelwagen<span class="fa fa-shopping-cart"></span>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--@endif--}}




    {{--@endforeach--}}

@endsection

@section('scripts')
    <script>
        $(document).ready( function() {
            $('#myCarousel').carousel({
                interval:   4000
            });

            var clickEvent = false;
            $('#myCarousel').on('click', '.nav a', function() {
                clickEvent = true;
                $('.nav li').removeClass('active');
                $(this).parent().addClass('active');
            }).on('slid.bs.carousel', function(e) {
                if(!clickEvent) {
                    var count = $('.nav').children().length -1;
                    var current = $('.nav li.active');
                    current.removeClass('active').next().addClass('active');
                    var id = parseInt(current.data('slide-to'));
                    if(count == id) {
                        $('.nav li').first().addClass('active');
                    }
                }
                clickEvent = false;
            });
        });
    </script>
@endsection