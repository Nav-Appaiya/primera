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
                @if (count($customers))
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Voornaam</th>
                                <th>Achternaam</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customers as $key => $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->voornaam }}</td>
                                    <td>{{ $value->achternaam }}</td>
                                    <td>{{ $value->email }}</td>

                                    <!-- we will also add show, edit, and delete buttons -->
                                    <td>

                                        <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                                        <!-- we will add this later since its a little more complicated than the other two buttons -->

                                        <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                                        <a class="btn btn-small btn-success" href="{{ URL::to('admin/customers/' . $value->id) }}">Bekijk klant</a>

                                        <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                                        <a class="btn btn-small btn-info" href="{{ URL::to('admin/customers/' . $value->id . '/edit') }}">Bewerk klant</a>

                                    </td>
                                </tr>
                            @endforeach
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
