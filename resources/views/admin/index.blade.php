


@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">Dashboard producten
                            <a class="btn btn-xs btn-success pull-right" style="margin-left: 5px" href="{{ route('admin_product_new') }}">Nieuw product toevoegen</a>
                            <a class="btn btn-xs btn-success pull-right" style="margin-left: 5px" href="{{ route('admin_category_index') }}">Nieuw category toevoegen</a>
                            <a class="btn btn-xs btn-success pull-right" style="margin-left: 5px" href="{{ route('admin_property_index') }}">Nieuw property toevoegen</a>
                        </div>

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
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Order lijst
                            <a href="{{ route('orders.create') }}" class="btn btn-success btn-xs">Order toevoegen</a>
                        </div>
                        <div class="panel-body">
                            @if (count($orders))
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>User</th>
                                            <th>Verzendadres</th>
                                            <th>Last Updated</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $order)
                                            <tr>
                                                <td>{{ $order->user->email or ''}}</td>
                                                <td>{{ $order->user_id or ''}}</td>
                                                <td>{{ $order->shipping_address or ''}}</td>
                                                <td>{{ $order->updated_at or ''}}</td>
                                                <td>
                                                    <a href="{{ route('orders.edit', $order->id) }}"
                                                       class="btn btn-success btn-xs">Edit</a>
                                                    <a href="{{ route('orders.show', $order->id) }}"
                                                       class="btn btn-info btn-xs">View</a>
                                                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST"
                                                          style="display:inline-block">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button class="btn btn-danger btn-xs">
                                                            <span>DELETE</span>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-center">
                                    {{--{{ $orders->links() }}--}}
                                </div>
                            @else
                                <p class="alert alert-info">
                                    No Listing Found
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

