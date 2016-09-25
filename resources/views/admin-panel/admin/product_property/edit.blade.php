@extends('admin-panel.layouts.admin')

@section('title', 'Product Detail Wijzigen')
@section('breadcrumb', Breadcrumbs::render('dashboard.product.edit.property.edit',$property->product->id))

@section('content')

    <div class="row">
        <div class="col-md-6">

            {!! Form::model($property, array('route' => ['admin_product_property_update' , $property->id], 'method' => 'patch')) !!}

            {!! Form::hidden('_id', $property->id) !!}
            {!! Form::hidden('_product', $property->product->id) !!}

            <!-- created_at -->
            <div class="form-group">
                {!! Form::label('stock', 'voorraad') !!}
                {!! Form::text('stock', null, ['class' => 'form-control', 'placeholder' => '']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('serialNumber', 'serialNumber') !!}
                {!! Form::text('serialNumber', null, ['class' => 'form-control', 'placeholder' => '']) !!}
{{--                {{ Form::select('serialNumber', ['color' => 'kleur', 'battery' => 'battery', 'nicotine' => 'nicotine'], null, ['class' => 'form-control']) }}--}}
            </div>
                {{--{{count($property->product->property)}}--}}
{{--{{count(\App\Details::where('type', $property->detail->type)->get())}}--}}
            <div class="form-group">
                {!! Form::label('detail', $property->first()->detail()->exists() ? '' : 'geen') !!}
                @if(count($property->product->property) == 1)
                    {{ Form::select('detail_id', array_merge(['null' => 'geen'], \App\Details::groupDetails()), null, ['class' => 'form-control']) }}
                @else
                    <?php
                        $all = collect(\App\Details::where('type',
                            \App\Product::find(
                                \App\Property::find(
                                    Request::segment(3)
                                )->product_id
                            )->property->first()->detail->type
                        )->get());

                        $used = \App\Property::where('product_id', \App\Property::find(Request::segment(3))->product_id) ->get();

                        $thisItem =  \App\Property::find(Request::segment(3))->detail;
    //
                        $array = [];

                        foreach ($used as $item){
                            array_push($array, $item->detail);
                        }

                        $newCollection = collect($all)->diff($array)->flatten(1);
                    ?>
                    {{ Form::select('detail_id', $newCollection->push($thisItem)->lists('value', 'id'), null, ['class' => 'form-control']) }}
                @endif
            </div>

            {!! Form::submit('submit', ['class' => 'btn btn-primary pull-right'])!!}

            <div class="form-group">
                <a class="btn btn-default pull-right" style="margin-right: 10px;">cancel</a>
            </div>

            {!! Form::close() !!}
        </div>

    </div>

@stop
