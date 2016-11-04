@extends('layouts.master')

@section('titel', $product->name)
@section('description', '')
@section('breadcrumbs', Breadcrumbs::render('product.show', $product))

@push('meta')
    {{--<!-- for Facebook -->--}}
    <meta property="og:title" content="{{$product->name}}" />
    <meta property="og:type" content="company" />
    <meta property="og:image" content="{{route('homepage')}}/images/product/{{$product->productimages()->first()->imagePath}}" />
    <meta property="og:url" content="{{Request::url()}}" />
    <meta property="og:description" content="{{$product->description}}" />

    <meta property="article:section" content="{{$product->name}}" />
    <meta property="article:published_time" content="{{$product->created_at}}" />
    <meta property="article:modified_time" content="{{$product->updated_at}}" />
    {{--<!-- for Twitter -->--}}
    <meta name="twitter:card" content="product" />
    <meta name="twitter:title" content="{{$product->name}}" />
    <meta name="twitter:description" content="{{$product->description}}" />
    <meta name="twitter:url" content="{{Request::url()}}" />
    <meta name="twitter:image" content="{{route('homepage')}}/images/product/{{$product->productimages()->first()->imagePath}}" />
@endpush

@section('content')
    <div class="row">
        <div class="col-md-5">
            <div class="panel panel-default">
                <div class="panel-body">
                     @if($product->productimages()->exists())
                        @foreach($product->productimages()->get() as $image) 
                            <img width="100%" alt="{{$product->name}}" src="/images/product/{{$image->imagePath}}">
                        @endforeach
                    @else
                        <img width="100%" src="/images/dummy.jpg">
                    @endif
                </div>
                <div class="panel-footer"></div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 style="font-size: 17px">{{$product->name}}</h3>
                    <label>beschrijving</label><br />
                    {!! str_replace(array("\r\n", "\r", "\n"), "<br />", $product->description) !!}
                    {{--<h1 class="pull-right"><span class="daysago"></span>--}}

                    @if($product->discount == 0)
                        <h2>&euro;{{ $product->price }}</h2>
                    @else
                        <h2>&euro;{{ $product->price - $product->discount }}</h2>
                        <small style="text-decoration:line-through;">&euro;{{ $product->price }}</small>
                    @endif
                </div>
                <div class="panel-footer">
                    {!! Form::model($product, array('route' => 'cart.add', 'method' => 'post')) !!}
                        @if($product->property()->first()->detail_id)
                            <label for="detail" class="{{ $errors->has('product_id') ? ' text-danger' : '' }}">{{$product->property()->first()->detail->type}}</label>
                            @if($product->property()->first()->detail->type)
                                <select id="product_id" class="form-control" name="product_id" >
                                    <option value="">Maak uw keuzen.</option>
                                    @foreach($product->property as $property)
                                        @if($property->stock < 1)
                                            <option value="{{$property->id}}" disabled>{{$property->detail->value}}  -  <small>uitverkocht</small></option>
                                        @else
                                            <option value="{{$property->id}}">{{$property->detail->value}}  -  <small>op voorraad</small></option>
                                        @endif
                                    @endforeach
                                </select>
                                <p class="text-danger">{{ $errors->has('product_id') ? 'Selecteer' : '' }}</p>
                            @endif
                        @else
                            <input type="hidden" value="{{$product->property()->first()->serialNumber}}" name="serialcode">
                        @endif
                    {{ Form::submit('In winkelwagen', ['class' => 'btn btn-primary']) }}
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                <h3>Andere aanbiedingen</h3>
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
    </div>
    </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">

            <h3>reviews</h3>
            @foreach($product->review as $review)
                <div class="well">
                    <span>Naam: {{$review->user->voornaam}}</span><span class="pull-right">Rating: {{$review->rating}}</span><br><br>
                    <p>Beschrijving: <br>{{$review->description}}</p>
                </div>

            @endforeach
            </div>
            </div>
        </div>
    </div>


    {{--TODO antoine dit moet in css--}}
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