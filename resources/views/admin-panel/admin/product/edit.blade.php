@extends('admin-panel.layouts.admin')

@section('title', 'Product wijzigen')
{{--@section('breadcrumb', Breadcrumbs::render('dashboard.category.edit'))--}}

@section('content')

    <div class="row">
        <div class="col-lg-6">
            <div class="table-responsive">
                <div class="panel panel-default">
                    {{--<div class="panel-heading">category</div>--}}

                    <div class="panel-body">

                        {{--{{ displayAlert() }}--}}

                        @include('errors.message')

                        <label>Foto's</label>
                        <div class="thumbnail">
                            @foreach($product->productimages as $image)
                                <img style="height: 100px; width: 100px; display: inline;" src="/images/product/{{$image->imagePath}}">
                                <button style="margin: 0px -10px -40px 0px">x</button>
                            @endforeach
                        </div>

                        {!! Form::model($product, array('route' => 'admin_product_update', 'method' => 'patch', 'files' => true)) !!}

                        {!! Form::hidden('_id', $product->id) !!}

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
                            {!! Form::text('status', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('discount', 'discount') !!}
                            {!! Form::text('discount', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('price', 'price') !!}
                            {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                        </div>

                        <!-- category id -->
                        <div class="form-group">
                            {!! Form::label('cate_id', 'category') !!}
                            {!! Form::select('category_id', \App\Category::groupList(), null, ['class' => 'form-control'] ) !!}
                            {{--                {!! Form::select('category_id', array('' => '----- select -----', '0' => 'new main category', 'for sub categories' => \App\Category::where('categoryID', 0)->pluck('title', 'id')->toArray() ), null, ['class' => 'form-control'] ) !!}--}}
                        </div>

                        {!! Form::file('images[]', array('multiple' => true)) !!}

                        {!! Form::submit('edit', ['class' => 'btn btn-primary pull-right'])!!}

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <a class="btn btn-default" href="{{route('admin_product_property_create', $product->id)}}">nieuw</a>
            <br>
            <br>
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>id</th>
                    <th>serienummer</th>
                    <th>voorraad</th>
                    <th>kleur</th>
                    <th>battery</th>
                    <th>nicotine</th>
                </tr>
                </thead>
                <tbody>
                {{--{{$product->productproperty}}--}}
                    @foreach ($product->property as $property)
                        <tr class="table-row" data-href="{{route('admin_product_property_edit', $property->id)}}">
                            <td>{{$property->id}}</td>
                            <td>{{$property->serialNumber}}</td>
                            <td>{{$property->stock}}</td>
                            <td>{{$property->color}}</td>
                            <td>{{$property->mah}}</td>
                            <td>{{$property->nicotine}}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>

@stop
