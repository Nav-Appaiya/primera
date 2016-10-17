@extends('admin-panel.layouts.admin')

@section('title', 'orders')
@section('breadcrumb', Breadcrumbs::render('dashboard.orders'))

@section('content')

    <div class="row">
        <div class="col-lg-6">
            <h2>Bordered Table</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>order id</th>
                            <th>mollie id</th>
                            <th>Aflevering</th>
                            <th>Revenue</th>
                            <th>status</th>
                            <th>date</th>
                            <th>paid on</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr class="table-row" data-href="{{route('admin_order_edit', $order->id)}}">
                            <td>{{$order->id}}</td>
                            <td>{{$order->payment_id}}</td>
                            <td>{{$order->delivery_type}}</td>
                            <td>{{number_format($order->total_price, 2)}}</td>
                            <td>{{$order->status}}</td>
                            <td>{{$order->created_at}}</td>
                            <td>{{$order->updated_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-lg-6">
            asdasd
        </div>

    </div>

@endsection