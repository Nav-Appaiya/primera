@extends('layouts.master')

@section('titel', 'Primera shop')
@section('seotags', 'seotags')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">Jouw bestellingen</h3>
                @if(count($orders))

                    <table class="table user-list">
                        <thead>
                        <tr>
                            <th><span>Datum</span></th>
                            <th><span>status</span></th>
                            <th class="text-center"><span>Bedrag</span></th>
                            <th><span>Verzendadres</span></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>
                                    {{ $order->created_at }}
                                </td>
                                <td>{{ $order->status }}</td>
                                <td class="text-center">
                                    {{ $order->amount }}
                                </td>
                                <td>
                                    {{ $order->shipping_address }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                @else
                    <h3 class="text-center">Sorry, nog geen bestelling om te weergeven.</h3>
                @endif
            </div>
        </div>
    </div>
@endsection

