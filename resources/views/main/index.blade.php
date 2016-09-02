@extends('layouts.master')

@section('titel', 'Primera shop')
@section('seotags', 'seotags')

@section('sidebar')
    @parent
@endsection

@section('content')
        <ol class="breadcrumb">
          <li><a href="{{ URL::route('homepage') }}">Homepage</a></li>
          <li class="active">Products</li>
        </ol>

        <div class="content">
            <div class="col-md-12">
                    <h3>Test</h3>

            @foreach ($products as $product)
                    <div class="col-xs-4 col-sm-4 col-md-3">
                        <div class="product-list">
                            {{--{{$product->productimages->first() ? $product->productimages->first()->imagePath : '' }}--}}
                            {{--@if($product->productimages->first() != null)--}}
{{--                                {{$product->productimages->first()->imagePath}}--}}
                            {{--@endif--}}
                            {{--<img src="{{$product->productimages()->first->imagePath}}" class="img-responsive">aa--}}
                            <img src="{{$product->productimages->first() ? '/images/product/'.$product->productimages->first()->imagePath : 'http://www.inforegionordest.ro/assets/images/default.jpg' }}" width="100%" height="220px" class="">
                            <div class="caption">
                                <div class="row">
                                    <div class="col-md-6 col-xs-6">
                                        <h4>{!! $product->name !!}</h4>
                                    </div>
                                    <div class="col-md-6 col-xs-6 price">
                                        <h3 class="pull-right"><label>&euro;{{number_format($product->price, 2, '.', ',')}}</label></h3>
                                    </div>
                                </div>
                                <div class="row center-block">
                                    <div class="btn-group cart">
                                        <a href="{{ URL::route('product.show', [$product->name, $product->id]) }}" class="btn btn-info btn-product">
                                            Meer weten <span class="fa fa-question-circle"></span>
                                        </a>
                                    </div>
                                    {{--<div class="btn-group wishlist">--}}
                                        {{--<a href="{{ URL::route('cart.add', $product) }}" class="btn btn-success btn-product" onclick="">--}}
                                            {{--In winkelwagen<span class="fa fa-shopping-cart"></span>--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
                </div>
        </div>

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