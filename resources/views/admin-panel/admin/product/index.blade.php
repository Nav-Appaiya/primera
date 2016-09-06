@extends('admin-panel.layouts.admin')

@section('title', 'Producten')
@section('breadcrumb', Breadcrumbs::render('dashboard.product.index'))

@section('content')

    <div class="row">

        <div class="col-lg-6">
            <div class = "panel panel-default">
                <div class = "panel-body ">
                    <div class="row">
                    {!! Form::model(array('route' => 'admin_product_property_addstock', 'method' => 'patch', 'class' => 'form-inline, panel')) !!}

                        <label class="col-lg-12">Voeg product toe aan voorraad</label>
                        <div class="col-sm-4">
                            {!! Form::text('serialNumber', null, ['class' => 'form-control col-lg-8', 'placeholder' => 'product nummer']) !!}
                        </div>
                        <div class="col-sm-2">
                            {!! Form::number('stock', null, ['class' => 'form-control col-lg-2', 'placeholder' => 'aantal', 'min' => '1', 'max' => '1000']) !!}
                        </div>

                        {!! Form::submit('toevoegen', ['class' => 'btn btn-primary']) !!}

                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-10">

            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>Beschrijving</th>
                        <th>Status</th>
                        <th>Prijs</th>
                        <th>cate</th>
                        <th>toegevoegd</th>
                        <th>gewijzigd</th>
                    </tr>
                </thead>
                <tbody>
                     @foreach ($products as $product)
                        <tr class="table-row" data-href="{{route('admin_product_edit', $product->id)}}">
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->status}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->category->title}}</td>
                            <td>{{$product->created_at}}</td>
                            <td>{{$product->updated_at}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
            {{--</div>--}}

        <div class="col-md-2">
            <ul class="list-group">
                <li class="list-group-item"><a href="{{route('admin_product_create')}}">new</a></li>
                {{--<li class="list-group-item"><a href="{{route('admin_property_create')}}">new</a></li>--}}
            </ul>
        </div>

    </div>

@stop
