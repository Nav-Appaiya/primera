@extends('admin-panel.layouts.admin')

@section('title', 'orders')
{{--@section('breadcrumb', Breadcrumbs::render('dashboard.orders'))--}}

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
                            <th>Revenue</th>
                            <th>status</th>
                            <th>date</th>
                            <th>paid on</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr class="table-row" data-href="{{route('admin_orders_edit', $order->id)}}">
                            <td>{{$order->order_id}}</td>
                            <td>{{$order->mollie_id}}</td>
                            <td>{{number_format($order->price, 2)}}</td>
                            <td>{{$order->status}}</td>
                            <td>{{$order->created_at}}</td>
                            <td>{{$order->updated_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $orders->render() !!}
            </div>
        </div>

        <div class="col-lg-6">
            asdasd
        </div>

    </div>

@endsection