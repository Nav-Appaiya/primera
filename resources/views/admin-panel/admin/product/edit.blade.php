@extends('admin-panel.layouts.admin')

@section('title', 'Product wijzigen')
@section('breadcrumb', Breadcrumbs::render('dashboard.product.edit', $product->id))

@section('content')

    <style>
        #img_container {
            position:relative;
            display:inline-block;
            text-align:center;
            border:1px solid red;
            /* background:url('http://jsfiddle.net/img/initializing.png') no-repeat;
            width:186px;
            height:157px;*/
        }

        .button {
            position:absolute;
            bottom:0px;
            right:10px;
            /*width:100px;*/
            /*height:30px;*/
        }
    </style>

    <div class="row">
        <div class="col-lg-6">
            <div class="table-responsive">
                <div class="panel panel-default">

                    <div class="panel-body">

                        <label>Foto's</label>
                        <div class="row">
                            @foreach($product->productimages as $image)
                                <div class="col-lg-2">
                                {!! Form::open([ 'method'  => 'delete', 'route' => [ 'admin_image_destroy', $image->id ], 'class' => 'img_container']) !!}
                                    <img style="height: 100px; width: 100px; border: 1px solid #777; display: inline;" src="/images/product/{{$image->imagePath}}"/>
                                    {!! Form::button('delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm button']) !!}
                                {!! Form::close() !!}
                                </div>
                            @endforeach
                        </div>

                        {!! Form::model($product, array('route' => 'admin_product_update', 'method' => 'patch', 'files' => true)) !!}

                        {!! Form::hidden('_id', $product->id) !!}
<br>
                        {!! Form::file('images[]', array('multiple' => true)) !!}
<br>

                        <div class="form-group">
                            {!! Form::label('name', 'name') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('description', 'description') !!}
                            {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('status', 'status') !!}
                            {!! Form::select('status', ['---select---', 'on' => 'Online', 'off' => 'Offline'], null, ['class' => 'form-control'] ) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('discount', 'discount') !!}
                            {!! Form::text('discount', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('price', 'price') !!}
                            {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('category_id', 'category_id') !!}
                            {!! Form::select('category_id', \App\Category::groupList(), null, ['class' => 'form-control'] ) !!}
                        </div>

                        {!! Form::submit('Wijzigen', ['class' => 'btn btn-primary pull-right'])!!}

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="thumbnail">

                <a class="btn btn-primary pull-right" style="margin-left: 10px;" href="{{route('admin_product_property_create', $product->id)}}">nieuw</a>

                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>serienummer</th>
                        <th>voorraad</th>
                        {{--<th>kleur</th>--}}
                        <th>detail</th>
                        {{--<th>{{$product->property->first()->details}}</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    {{--{{$product->productproperty}}--}}
                        @foreach ($product->property as $property)
                            <tr class="table-row" data-href="{{route('admin_product_property_edit', $property->id)}}">
                                <td>{{$property->id}}</td>
                                <td>{{$property->serialNumber}}</td>
                                <td>{{$property->stock}}</td>
                                {{--<td>{{$property->detail->value ? $property->detail->value : ''}}</td>--}}

                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </div>

@stop
