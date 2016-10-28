@extends('admin-panel.layouts.admin')

@section('title', 'orders')
@section('breadcrumb', Breadcrumbs::render('dashboard.orders.edit', $order->id))

@section('content')

    <div class="row">
        <div class="col-lg-6">
            <div class="table-responsive">
                <div class="panel panel-default">
                    <div class="panel-body">

                        @include('errors.message')

                        {!! Form::model($order, array('route' => array('admin_order_update', $order->id), 'class' => '', 'method' => 'post' )) !!}

                        <fieldset>
                            <!-- id -->
                            <div class="form-group">
                                {!! Form::label('id', 'id') !!}
                                {!! Form::text('id', null, ['class' => 'form-control', 'placeholder' => '', 'disabled']) !!}
                            </div>

                            <!-- postcode -->
                            <div class="form-group">
                                {!! Form::label('postcode', 'postcode') !!}
                                {!! Form::text('postcode', null, ['class' => 'form-control', 'placeholder' => '', 'disabled']) !!}
                            </div>

                            <!-- adres -->
                            <div class="form-group">
                                {!! Form::label('adres', 'adres') !!}
                                {!! Form::text('adres', null, ['class' => 'form-control', 'placeholder' => '', 'disabled']) !!}
                            </div>

                            <!-- huisnummer -->
                            <div class="form-group">
                                {!! Form::label('huisnummer', 'huisnummer') !!}
                                {!! Form::text('huisnummer', null, ['class' => 'form-control', 'placeholder' => '', 'disabled']) !!}
                            </div>

                            <!-- woonplaats -->
                            <div class="form-group">
                                {!! Form::label('woonplaats', 'woonplaats') !!}
                                {!! Form::text('woonplaats', null, ['class' => 'form-control', 'placeholder' => '', 'disabled']) !!}
                            </div>

                            <!-- status -->
                            <div class="form-group">
                                {!! Form::label('status', 'status') !!}
                                {!! Form::text('status', null, ['class' => 'form-control', 'placeholder' => '', 'disabled']) !!}
                            </div>

                            <!-- delivery_type -->
                            <div class="form-group">
                                {!! Form::label('delivery_type', 'delivery_type') !!}
                                {!! Form::text('delivery_type', null, ['class' => 'form-control', 'placeholder' => '', 'disabled']) !!}
                            </div>

                            <!-- delivery_price -->
                            <div class="form-group">
                                {!! Form::label('delivery_price', 'delivery_price') !!}
                                {!! Form::text('delivery_price', null, ['class' => 'form-control', 'placeholder' => '', 'disabled']) !!}
                            </div>

                            <!-- total_price -->
                            <div class="form-group">
                                {!! Form::label('total_price', 'total_price') !!}
                                {!! Form::text('total_price', null, ['class' => 'form-control', 'placeholder' => '', 'disabled']) !!}
                            </div>

                            <!-- total_price -->
                            <div class="form-group">
                                {!! Form::label('payment_id', 'payment_id') !!}
                                {!! Form::text('payment_id', null, ['class' => 'form-control', 'placeholder' => '', 'disabled']) !!}
                            </div>

                            <!-- notification -->
                            <div class="form-group">
                                {!! Form::label('notification', 'notification') !!}
                                {!! Form::text('notification', null, ['class' => 'form-control', 'placeholder' => '', 'disabled']) !!}
                            </div>

                            <!-- Submit Button -->
                            <div class="form-group">
                                <a href="{{route('admin_order_index')}}" class="btn btn-default pull-right">terug</a>
                            </div>

                        </fieldset>

                        {!! Form::close()  !!}

                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">

            <div class="panel panel-default">
                <div class="panel-body">
                    @if($order->status == 'paid' && $order->delivery_type == 'verzenden')

                        {!! Form::model($order, array('route' => array('admin_order_update', $order->id), 'method' => 'post' )) !!}

                            <!-- notification -->
                            <div class="form-group">
                                {!! Form::label('track_trace', 'track & trace') !!}
                                {!! Form::text('track_trace', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                            </div>

                            <!-- Submit Button -->
                            <div class="form-group">
                                {!! Form::submit('Bestelling verzenden', ['class' => 'btn btn-primary pull-right'] ) !!}
                            </div>
                        {{Form::close()}}
                    @else
                        Deze bestelling word afgehaald.
                    @endif
                </div>
            </div>


        </div>


        <div class="col-lg-6">
            @foreach($order->orderitems as $item)
                <div class="table-responsive">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-lg-3">
                                <img style="height: 100px; !important;" class="img-responsive" src="/images/product/{{$item->property->product->productimages()->first()->imagePath}}">
                            </div>
                            <div class="col-lg-1">
                                <br>
                                <b>x{{$item->amount}}</b>
                            </div>
                            <div class="col-lg-8">
                                <span>{{$item->property->product->name}}</span> - <b>{{$item->property->detail->value}}</b><br>
                                <small class="text-muted">SN: {{$item->property->serialNumber}}</small>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            @endforeach
        </div>
    </div>

@endsection