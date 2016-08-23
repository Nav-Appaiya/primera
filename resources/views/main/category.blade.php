

@extends('layouts.master')

@section('titel', 'category')

{{--@section('sidebar')--}}
    {{--@parent--}}
{{--@endsection--}}

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">
                    {{--{{ $category->name }}--}}
                    {{--{!! $product->children() !!}--}}
                    {{--{{dd($product->product)}}--}}
                    @foreach($product->product as $child)
                        {{$child}}
                    @endforeach
                </h1>
            </div>

            <div class="col-md-12">
                <div id="categories-list" class="row list-group"    >
                    @foreach($products as $product)
                        <div class="item  col-xs-4 col-lg-4">
                            <div class="thumbnail">
                                <img class="group list-group-image" src="{{ $product->imageurl }}" alt="" />
                                <div class="caption">
                                    <h4 class="group inner list-group-item-heading">{{ $product->name }}</h4>
                                    <p class="group inner list-group-item-text">
                                        {{ $product->description }}
                                    </p>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6">
                                            <p class="lead">
                                                &euro; {{ $product->price }}</p>
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            <a class="btn btn-success pull-right" href="{{ route('product_detail', $product->id) }}">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

    </div>
@endsection

