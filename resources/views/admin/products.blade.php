

@extends('layouts.master')

@section('titel', 'Product overzicht')

@section('sidebar')
    @parent
@endsection

@section('content')

        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                    <td>Naam</td>
                    <td>Prijs</td>
                    <td>Omschrijving</td>
                    <td>Afbeelding</td>
                    <td></td>
                    </thead>
                    <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{$product->name}}</td>
                            <td>&euro;{{$product->price}}</td>
                            <td>{{$product->description}}</td>
                            <td>
                                <img src="{{$product->imageurl}}" alt="" width="75px">
                            </td>
                            <td>
                                <a href="/admin/product/destroy/{{$product->id}}">
                                    <button class="btn btn-danger">Verwijderen</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <a href="/admin/product/new"><button class="btn btn-success">Product toevoegen</button></a>
            </div>
        </div>

@endsection

