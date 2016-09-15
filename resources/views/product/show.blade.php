@extends('layouts.master')

@section('titel', 'Detail product')

@section('sidebar')
    @parent
@endsection

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{ URL::route('homepage') }}">Homepage</a></li>
        <li>Products</li>
        <li class="active">Product name</li>
    </ol>
    <div class="row">
        <div class="col-md-12">

            {{--@if($product->category_id)--}}
            {{--{!! Breadcrumbs::render('product_detail', $product) !!}--}}
            {{--@endif--}}

            @if (Session::has('status'))
                <div class="alert alert-info">{{ Session::get('status') }}</div>
            @endif

        </div>
        <div class="col-md-12 col-xs-12 col-sm-12">
            <div class="content">
                <div class="artst-pic pull-left">
                    <a href="#">
                        @foreach($product->productimages as $image)
                            <img style="height: 200px; width: 200px; margin: 10px; border: 1px solid #777;" src="/images/product/{{$image->imagePath}}">
                        @endforeach
                        {{--<img src="{{$product->productimages->first() ? '/images/product/'.$product->productimages->first()->imagePath : 'http://www.inforegionordest.ro/assets/images/default.jpg' }}" width="350" height="230" class="">--}}
                    </a>
                </div>
                <div class="artst-prfle pull-right col-md-12 col-xs-12 col-sm-12">

                    <div class="art-title">
                        {{--{{ $product->name }} ({{$product->categories()->first()->title}})--}}
                        <br><span class="artst-sub">
                            <label>beschrijving</label><br>
                            <span class="byname">{{ $product->description }}</span>
                            <h1 class="pull-right"><span class="daysago"></span>
                                &euro;{{ $product->price }}</h1>
                            <small style="color: green; font-weight: 900;">
                                <br>
                                <br>
                                @if($product->property->sum('stock') != 0)
                                    op voorraad
                                @else
                                    uitverkocht
                                @endif

                            </small>
                            {{--{{ Form::select('number', \App\Property::where('product_id', $product->id)->pluck('nicotine', 'id')->toArray(), null) }}--}}


                        </span>
                    </div>
                    {{--@if(count($seotags))--}}
                    {{--<div class="pull-left">--}}
                    {{--<ul>--}}
                    {{--<strong>Seotags: </strong><br>--}}
                    {{--@foreach($seotags as $seotag)--}}
                    {{--<li>{{ $seotag->seotag }}</li>--}}
                    {{--@endforeach--}}
                    {{--</ul>--}}
                    {{--</div>--}}
                    {{--@endif--}}
                    <div class="pull-right">
                        <div class="row center-block">
                            <div class="btn-group wishlist">
                                <label>{{$product->property()->first()->detail->type}}</label>
                                @if($product->property()->first()->detail->type)
                                    <select class="form-control" name="serialcode">
                                        @foreach($product->property as $property)
                                            @if($property->stock == 0)
                                                <option value="{{$property->serialNumber}}" disabled>{{$property->detail->value}}  -  <small>uitverkocht</small></option>
                                            @else
                                                <option value="{{$property->serialNumber}}">{{$property->detail->value}}  -  <small>op voorraad</small></option>
                                            @endif
                                        @endforeach
                                    </select>
                                @endif

                                {{-- TODO: Add to shoppingcart button ajax --}}
                                <a href="{{ route('cart.add', $product) }}" class="btn btn-success btn-product"
                                   onclick="">
                                    In winkelwagen<span class="fa fa-shopping-cart"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <h4 class="text-center">Andere aanbiedingen</h4>
        <br>
        {{--@foreach ($related as $relate)--}}
        {{--<div class="col-xs-12 col-sm-6 col-md-3 wrapper">--}}
        {{--<div class="rlisting">--}}
        {{--<div class="col-md-12 nopad">--}}
        {{--<img src="{{ $relate->imageurl }}" class="img-responsive">--}}
        {{--</div>--}}
        {{--<div class="col-md-12 nopad">--}}
        {{--<h5>{{ $relate->name }}</h5>--}}
        {{--<p>{{ $relate->description }}</p>--}}
        {{--<div class="rfooter">--}}
        {{--<div class="row center-block">--}}
        {{--<div class="btn-group cart btn-block">--}}
        {{--<a href="/product/{{  $relate->id }}" class="btn btn-warning btn-product">--}}
        {{--Meer weten <span class="fa fa-question-circle"></span>--}}
        {{--</a>--}}
        {{--</div>--}}
        {{--<div class="btn-group wishlist btn-block">--}}
        {{--<a href="{{ URL::route('cart.add', $relate) }}" class="btn btn-success btn-product">--}}
        {{--In winkelwagen<span class="fa fa-shopping-cart"></span>--}}
        {{--</a>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--@endforeach--}}
    </div>


    <style>
        .art-title {
            color: #231f20;
            font-size: 20px;
            font-weight: 700;
        }

        .artist-data {
            width: 100%;
            padding-bottom: 25px;
        }

        .artst-pic {
            width: 33%;
            position: relative;
        }

        .artst-pic span a {
            color: #fff;
            font-size: 16px;
            display: none;
        }

        .artst-pic span.artst-like {
            position: absolute;
            left: 11%;
            bottom: 10px;
        }

        .artst-pic span.artst-share {
            position: absolute;
            left: 46%;
            bottom: 10px;
        }

        .artst-pic span.artst-plus {
            position: absolute;
            right: 9%;
            bottom: 10px;
        }

        .artst-prfle {
            width: 63%;
        }

        .artst-prfle span.artst-sub {
            font-size: 15px;
            color: #bbb;
            float: left;
            width: 100%;
            font-weight: normal;
            padding: 5px 0;
        }

        .artst-prfle span.artst-sub span.byname {
            font-weight: 700;
            color: #aaa;
        }

        .artst-prfle span.artst-sub span.daysago {
            float: right;
            font-size: 12px;
        }

        .counter-tab {
            float: left;
            width: 100%;
            padding-top: 45px;
        }

        .counter-tab div {
            float: left;
            width: 33%;
            color: #aaa;
            font-size: 12px;
        }

        .bot-links {
            float: left;
            width: 100%;
            padding-top: 10px;
        }

        .bot-links a {
            display: inline-block;
            padding: 5px;
            background: #ccc;
            font-size: 12px;
            margin-bottom: 5px;
            color: #9c9c9c;
            text-decoration: none;
        }

        span.play-icon {
            position: absolute;
            left: 31%;
            top: 32%;
            display: none;
        }

        .artst-pic:hover img.play-icon, .artst-pic:hover span a {
            display: block;
        }

    </style>
@endsection