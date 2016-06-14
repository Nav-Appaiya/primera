@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    Beheren van <a href="{{ url('/admin/products') }}">producten</a> of <a href="{{ url('/admin/orders') }}">Orders</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
