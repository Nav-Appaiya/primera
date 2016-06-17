@extends('layouts.app')

@section('titel', 'Product overzicht')

@section('sidebar')
    @parent
@endsection

@section('content')

    <div class="container">
            @if (Session::has('message'))
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="alert alert-info">

                            {{ Session::get('message') }}

                        </div>
                    </div>

                </div>
            @endif


            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard producten
                        <a class="btn btn-xs btn-success pull-right" href="/admin/product/new">
                            Nieuw product toevoegen</a></div>

                    <div class="panel-body">

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
                                    <td class="btn-block">
                                        <a href="/admin/product/destroy/{{$product->id}}"
                                           onclick="confirm('Weet je zeker dat je dit product wilt verwijderen?')">
                                            <button class="btn btn-success btn-block">Verwijderen</button>
                                        </a>
                                        <div style="margin-top: 10px"></div>
                                        <a href="/admin/product/{{$product->id}}/edit" style="display: block">
                                            <button class="btn btn-block btn-warning">Aanpassen</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
    </div>

@endsection

