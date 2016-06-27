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
                Klant: {{ $customer->nickname }} <small>({{ $customer->adres }}, {{ $customer->postcode }} {{ $customer->woonplaats }})</small>
            </div>
            <div class="panel-body">
                @if (isset($customer))
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Naam</th>
                                <th>Achternaam</th>
                                <th>Email</th>
                                <th>Laatst bijgewerkt</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{ $customer->id }}</td>
                                <td>{{ $customer->voornaam }}</td>
                                <td>{{ $customer->achternaam }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->updated_at }}</td>
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
