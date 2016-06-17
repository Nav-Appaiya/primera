@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session()->has('status'))
            <p class="alert alert-info">
                {{	session()->get('status') }}
            </p>
        @endif
        <div class="panel panel-default">
            <div class="panel-heading">
                Order lijst
                <a href="{{ route('orders.create') }}" class="btn btn-success btn-xs">Order toevoegen</a>
            </div>
            <div class="panel-body">
                @if (isset($order))
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

                                <tr>
                                    <td>{{ $order->user->email }}</td>
                                    <td>{{ $order->user_id }}</td>
                                    <td>{{ $order->shipping_address }}</td>
                                    <td>{{ $order->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-success btn-xs">Edit</a>
                                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-xs">View</a>
                                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline-block">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-danger btn-xs">
                                                <span>DELETE</span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">

                    </div>
                @else
                    <p class="alert alert-info">
                        No Listing Found
                    </p>
                @endif
            </div>
        </div>
    </div>
@endsection
