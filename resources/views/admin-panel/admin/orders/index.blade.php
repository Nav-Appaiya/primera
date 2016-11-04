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

        <div class="col-lg-6" >
            <div id="donut-status" class="col-lg-3" style="height: 200px !important; width:200px;"><label class="tex">Orders status</label></div>
            <div id="donut-methode" class="col-lg-3" style="height: 200px !important; width:200px;"></div>
        </div>

    </div>

@endsection

@push('scripts')
    <script>
        /*
         * Play with this code and it'll update in the panel opposite.
         *
         * Why not try some of the options above?
         */
        Morris.Donut({
            element: 'donut-status',
            data: {!! json_encode(\Illuminate\Support\Facades\DB::table('orders')
                ->groupBy('status')
                ->orderBy('status', 'ASC')
                ->get([
                  \Illuminate\Support\Facades\DB::raw('COUNT(*) as value'),
                  \Illuminate\Support\Facades\DB::raw('status as label')
                ])) !!}
        });

        Morris.Donut({
            element: 'donut-methode',
            data: {!! json_encode(\Illuminate\Support\Facades\DB::table('orders')
                ->groupBy('payment_method')
                ->orderBy('payment_method', 'ASC')
                ->get([
                  \Illuminate\Support\Facades\DB::raw('COUNT(*) as value'),
                  \Illuminate\Support\Facades\DB::raw('payment_method as label')
                ])) !!}
        });
    </script>
@endpush