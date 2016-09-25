@extends('admin-panel.layouts.admin')

@section('title', 'Dashboard')
@section('breadcrumb', Breadcrumbs::render('dashboard'))

@section('content')

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
    {{--{{$users = $user->all()->groupBy(function($date) {--}}
        {{--return Carbon::parse($date->created_at)->format('Y'); // grouping by years--}}
        {{--//return Carbon::parse($date->created_at)->format('m'); // grouping by months--}}
    {{--})}}--}}
    {{--@foreach($user as $item)--}}
        {{--{{$item->created_at}}<br>--}}
    {{--@endforeach--}}
    {{--{{$user}}--}}

    {{--@foreach($users as $user)--}}
        {{--{{$user}}<br><br>--}}
    {{--@endforeach--}}

    @foreach($products as $product)
        {{$product}}<br><br>
    @endforeach


@stop

@section('javascript')

    <script>
        new Morris.Line({
            // ID of the element in which to draw the chart.
            element: 'order-chart',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data:
                    [
                { year: '2008', value: 20 },
                { year: '2009', value: 10 },
                { year: '2010', value: 11 },
                { year: '2011', value: 5 },
                { year: '2012', value: 20 }
            ],
            // The name of the data record attribute that contains x-values.
            xkey: 'year',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['value'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['Value']
        });

        new Morris.Line({
            // ID of the element in which to draw the chart.
            element: 'user-chart',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: [
                { year: '2008', value: 5 },
                { year: '2009', value: 1 },
                { year: '2010', value: 17 },
                { year: '2011', value: 5 },
                { year: '2012', value: 14 }
            ],
            // The name of the data record attribute that contains x-values.
            xkey: 'year',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['value'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['Value']
        });
    </script>
@endsection
