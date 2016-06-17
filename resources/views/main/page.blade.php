

@extends('layouts.master')

@section('titel', 'Primera shop')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">{{ $page->name }}</h1>
            </div>
        </div>

        @if(Request::route()->pageId === 'producten')
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">Onze producten

                        <div class="panel-body">

                            <table class="table table-striped">
                                <thead>
                                <td>Naam</td>
                                <td>Prijs</td>
                                <td>Omschrijving</td>
                                <td>Afbeelding</td>
                                </thead>
                                <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>
                                            <a href="{{ URL::route('product_detail', $product->id) }}">{{ $product->name }}</a>
                                        </td>
                                        <td>&euro;{{$product->price}}</td>
                                        <td>{{$product->description}}</td>
                                        <td><img src="{{$product->imageurl}}" alt="" width="75px"></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
                @else
                    <div class="row">
                        <div class="col-md-12">
                <span>
                {!! $page->content !!}
                </span>
                        </div>
                    </div>
        @endif
    </div>

@endsection

