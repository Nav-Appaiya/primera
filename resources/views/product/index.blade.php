@extends('layouts.master')

@section('titel', 'Primera shop')
@section('seotags', 'seotags')

@section('sidebar')
    @parent
@endsection

@section('content')

    <h1>Producten</h1>

{{--{{($category->product)}}aa--}}

    <div class="row">
        <div class="col-lg-3">
            filter
            {{$category}}
            @foreach($category->children as $parent)
                {{$parent}}a
            @endforeach
        </div>

        <div class="col-lg-9">
            <div class="row">
                @foreach($category->product as $product)
                    <div class="col-lg-3">
                        <img src="{{$product->productimages->first() ? '/images/product/'.$product->productimages->first()->imagePath : 'http://www.inforegionordest.ro/assets/images/default.jpg' }}" width="100%" height="220xp" class="">
                        <p class="text">{{$product->name}}</p>
                        <p class="text">{{$product->price}}</p>
                        <p class="text">{{$product->description}}</p>
                        {{--<a href="{{route('')}}"></a>--}}
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection