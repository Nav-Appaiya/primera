@extends('layouts.master')

@section('titel', 'Primera shop')
@section('seotags', 'seotags')

@section('sidebar')
    @parent
@endsection

@section('content')

<ol class="breadcrumb">
    <li><a href="{{ URL::route('homepage') }}">Homepage</a></li>
    <li>End</li>
    <li>Somethings</li>
    <li class="active">Products</li>
</ol>

<div class="content">

    <h3>Filter</h3>

{{--{{($category->product)}}aa--}}

        <div class="col-lg-3">
            filter<br>

            <style>
                .active > a{
                    color: green;
                }
                .list > li > .active{
                    display: block !important;
                }
                .list ul {
                    display: none;
                }

            </style>

            <ul class="list">
                @foreach(\App\Category::where('category_id', 0)->get() as $parent)
                    <li>
                        <a href="{{route('product.index', [str_replace(' ', '-', $category->parent->title), str_replace(' ', '-', $parent->children()->first()->title), $parent->children()->first()->id])}}">{{$parent->title}}</a>
                        <ul class="{{ $parent->id == $category->parent->id ? 'active' : '' }}">
                            @foreach($parent->children as $children)
                               <li class="{{$children->id == str_replace('c-', '', Request::segment(3)) ? 'active' : '' }}">
                                    <a href="{{route('product.index', [ str_replace(' ', '-', $category->parent->title),  str_replace(' ', '-', $children->title), $children->id])}}">{{$children->title}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>

            prijs<br>
            <input value="{{$category->product->min('price')}}">
            <input value="{{$category->product->max('price')}}">

        </div>
</div>
<div class="content">
        <div class="col-lg-9">
            <div class="row">
                {{--{{var_dump($category->product()->get()->property->SeralNumber)}}--}}
                {{$property}}
                {{--@foreach($property->product as $item)--}}
                    {{--{{$item}}--}}
                {{--@foreach($property->product as $product)--}}
                    {{--{{$product}}--}}
                    {{--<div class="col-lg-3">--}}
                        {{--<img src="{{$product->productimages->first() ? '/images/product/'.$product->productimages->first()->imagePath : 'http://www.inforegionordest.ro/assets/images/default.jpg' }}" width="100%" height="220xp" class="">--}}
                        {{--<p class="text">{{$product->name}}</p>--}}
                        {{--<p class="text">{{$product->price}}</p>--}}
                        {{--<p class="text">{{$product->description}}</p>--}}
                        {{--<a href="{{route('product.show', [str_replace(' ', '-', $product->name), $product->id])}}">bekijken</a>--}}
                        {{--<a href="{{route('')}}"></a>--}}
                    {{--</div>--}}
                {{--@endforeach--}}
            </div>
        </div>
    </div>
@endsection