@extends('layouts.master')

@section('titel', 'Detail product')

@section('sidebar')
    @parent
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12 col-xs-12 col-sm-12">
            <div class="artist-data pull-left panel">
                <div class="artst-pic pull-left">
                    <a href="#">
                        <img src="{{ $product->imageurl }}" alt="" class="img-responsive" />
                    </a>
                </div>
                <div class="artst-prfle pull-right col-md-12 col-xs-12 col-sm-12">
                    <div class="art-title">
                        {{ $product->name }}
                        <span class="artst-sub"><span class="byname">{{ $product->description }}</span>
                            <h1 class="pull-right"><span class="daysago"></span>&euro;{{ $product->price }}</h1>
                        </span>
                    </div>
                    <div class="pull-right">
                        <div class="row center-block">
                            <div class="btn-group wishlist">
                                {{-- TODO: Add to shoppingcart button ajax --}}
                                <a href="#" class="btn btn-success btn-product" onclick="addCart(event, {{ $product }} );">
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
        @foreach ($related as $relate)
        <div class="col-xs-12 col-sm-6 col-md-3 wrapper">
            <div class="rlisting">
                <div class="col-md-12 nopad">
                    <img src="{{ $relate->imageurl }}" class="img-responsive">
                </div>
                <div class="col-md-12 nopad">
                    <h5>{{ $relate->name }}</h5>
                    <p>{{ $relate->description }}</p>
                    <div class="rfooter">
                        <div class="row center-block">
                            <div class="btn-group cart btn-block">
                                <a href="/product/{{  $relate->id }}" class="btn btn-warning btn-product">
                                    Meer weten <span class="fa fa-question-circle"></span>
                                </a>
                            </div>
                            <div class="btn-group wishlist btn-block">
                                <a href="/addProduct/{{ $relate->id }}" class="btn btn-success btn-product">
                                    In winkelwagen<span class="fa fa-shopping-cart"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>


    <style>
        .art-title{color:#231f20; font-size:20px; font-weight:700;}
        .artist-data{width:100%; padding-bottom: 25px;}
        .artst-pic{width:33%;position: relative;}
        .artst-pic span a{color: #fff; font-size: 16px; display: none;}
        .artst-pic span.artst-like{position: absolute; left: 11%; bottom: 10px;}
        .artst-pic span.artst-share{position: absolute; left:46%; bottom: 10px;}
        .artst-pic span.artst-plus{position: absolute; right: 9%; bottom: 10px;}
        .artst-prfle{width:63%;}
        .artst-prfle span.artst-sub{font-size:15px; color:#bbb; float:left; width:100%; font-weight:normal; padding:5px 0;}
        .artst-prfle span.artst-sub span.byname{font-weight:700; color:#aaa;}
        .artst-prfle span.artst-sub span.daysago{float:right; font-size:12px;}
        .counter-tab{float: left; width: 100%; padding-top: 45px;}
        .counter-tab div{float: left; width: 33%; color: #aaa; font-size: 12px;}
        .bot-links{float: left; width: 100%; padding-top: 10px;}
        .bot-links a{display: inline-block; padding: 5px; background: #ccc; font-size: 12px; margin-bottom: 5px; color: #9c9c9c; text-decoration:none;}
        span.play-icon{position: absolute; left: 31%; top: 32%; display: none;}
        .artst-pic:hover img.play-icon, .artst-pic:hover span a{display: block; }

    </style>
@endsection