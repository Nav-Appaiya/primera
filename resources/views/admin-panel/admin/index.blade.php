@extends('admin-panel.layouts.admin')

@section('title', 'Dashboard')
@section('breadcrumb', Breadcrumbs::render('dashboard'))

@section('content')

    <div class="row">

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$reviews->where('created_at', '<=', \Carbon\Carbon::now()->startOfMonth())->count()}}</div>
                            <div>Aantal reviews - ( {{\Carbon\Carbon::now()->startOfMonth()->format('d/m/Y')}} )</div>
                        </div>
                    </div>
                </div>
                <a href="{{route('admin_review_index')}}">
                    <div class="panel-footer">
                        <span class="pull-left">Bekijk Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <style>
            .asd{
                color: #d9534f;
            }
        </style>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-shopping-cart fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$orders->where('status', 'paid')->count()}}</div>
                            <div>Nieuwe bestellingen!</div>
                        </div>
                    </div>
                </div>
                <a href="{{route('admin_order_index')}}">
                    <div class="panel-footer">
                        <span class="pull-left">Bekijk Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa phpdebugbar-fa-archive fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$products->count()}}</div>
                            <div>Aantal geregistreerde producten</div>
                        </div>
                    </div>
                </div>
                <a href="{{route('admin_product_index')}}">
                    <div class="panel-footer">
                        <span class="pull-left">Bekijk Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa phpdebugbar-fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$users->count()}}</div>
                            <div>Aantal geregistreerde gebruikers.</div>
                        </div>
                    </div>
                </div>
                <a href="{{route('admin_user_index')}}">
                    <div class="panel-footer">
                        <span class="pull-left">Bekijk Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <h3>Orders</h3><br>
            <div id="order-chart" style="height: 250px;"></div>
        </div>
        <div class="col-lg-6">
            <h3>Users</h3><br>
            <div id="user-chart" style="height: 250px;"></div>
        </div>
    </div>

@stop

@push('scripts')
    <script>
        new Morris.Line({
            // ID of the element in which to draw the chart.
            element: 'user-chart',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: {!! json_encode( \DB::table('users')
            ->select(DB::raw('MONTHNAME(created_at) as month'), DB::raw("DATE_FORMAT(created_at,'%Y-%m') as monthNum"), DB::raw('count(*) as users'))
            ->groupBy('monthNum')
            ->get()) !!},
            // The name of the data record attribute that contains x-values.
            xkey: 'monthNum',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['users'],
            // Labels for value ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['users']
        });

        new Morris.Line({
            // ID of the element in which to draw the chart.
            element: 'order-chart',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: {!! json_encode( \DB::table('orders')
            ->select(DB::raw('MONTHNAME(updated_at) as month'), DB::raw("DATE_FORMAT(updated_at,'%Y-%m') as monthNum"), DB::raw('count(*) as orders'))
            ->groupBy('monthNum')
            ->get()) !!},
            // The name of the data record attribute that contains x-values.
            xkey: 'monthNum',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['orders'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['orders']
        });

    </script>
@endpush
