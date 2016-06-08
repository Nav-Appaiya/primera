

@extends('layouts.master')

@section('titel', 'Primera shop')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            @foreach ($products as $product)
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail" >
                            <img src="{{$product->imageurl}}" class="img-responsive">
                            <div class="caption">
                                <div class="row">
                                    <div class="col-md-6 col-xs-6">
                                        <h4>{{$product->name}}</h4>
                                    </div>
                                    <div class="col-md-6 col-xs-6 price">
                                        <h3 class="pull-right"><label>&euro;{{number_format($product->price, 2, '.', ',')}}</label></h3>
                                    </div>
                                </div>
                                <p>{{$product->description}}</p>
                                <div class="row center-block">
                                    <div class="btn-group cart">
                                        <a href="/product/details/{{$product->id}}" class="btn btn-warning btn-product">
                                            Meer weten <span class="fa fa-question-circle"></span>
                                        </a>
                                    </div>
                                    <div class="btn-group wishlist">
                                        <a href="/addProduct/{{$product->id}}" class="btn btn-success btn-product">
                                            In winkelwagen<span class="fa fa-shopping-cart"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>

@endsection

