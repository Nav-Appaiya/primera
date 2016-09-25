@extends('admin-panel.layouts.admin')

@section('title', 'Product Detail Wijzigen')
@section('breadcrumb', Breadcrumbs::render('dashboard.product.edit.property.edit',$property->product->id))

@section('content')

    <div class="row">
        <div class="col-md-10">

            {!! Form::model($property, array('route' => ['admin_product_property_update' , $property->id], 'method' => 'patch')) !!}

            {!! Form::hidden('_id', $property->id) !!}
            {!! Form::hidden('_product', $property->product->id) !!}

{{--                @foreach($property->product as $pro)--}}
                    {{--{{$pro}}--}}
                {{--@endforeach--}}
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
                    {{ Form::select('detail_id', \App\Details::where('type', $property->detail->type)->lists('value', 'id'), null, ['class' => 'form-control']) }}
                @endif
            </div>

                <?php
//                TODO: fix select menu alleen items die niet eerder op dit product gebruikts zij.
                {{--//not clean fix later--}}
                {{--$all = collect(\App\Details::where('type', \App\Product::find($property->product()->first()->id)->property->first()->detail->type)->get());--}}
                {{--$used = \App\Property::where('product_id' ,Request::segment(3))->get();--}}
                {{--$array = [];--}}
                {{--foreach ($used as $item){--}}
                    {{--array_push($array, $item->detail);--}}
                {{--}--}}
                {{--$newCollection = collect($all)->diff($array)->flatten(1) ;--}}
                {{--?>--}}

                {{--<div class="form-group">--}}
{{--                    {!! Form::label('detail', 'detail > '.\App\Product::find($property->product()->first()->id)->property->first()->detail->type) !!}--}}
                    {{--@if(count($used) == 1)--}}
                        {{--{{ Form::select('detail', $newCollection->pluck('value', 'id')->toArray(), null, ['class' => 'form-control']) }}--}}
                    {{--@else--}}
                        {{--{{ Form::select('detail', $newCollection->pluck('value', 'id')->toArray(), null, ['class' => 'form-control', count($newCollection) == 0 ? 'disabled' : '']) }}--}}
                        {{--@if (count($newCollection) == 0)--}}
                            {{--<label>Uw details zijn op. Maak <a href="{{route('admin_property_index')}}">hier</a> meer aan.</label>--}}
                        {{--@endif--}}
                    {{--@endif--}}
                {{--</div>--}}
            {{--<div class="form-group">--}}
                {{--{!! Form::label('color', 'kleur') !!}--}}
                {{--{{ Form::select('color', [\App\Details::where('type', 'color')->pluck('value', 'value')->toArray()], null, ['class' => 'form-control']) }}--}}
            {{--</div>--}}

            {{--<div class="form-group">--}}
                {{--{!! Form::label('nicotine', 'nicotine') !!}--}}
                {{--{{ Form::select('nicotine', [\App\Details::where('type', 'nicotine')->pluck('value', 'value')->toArray()], null, ['class' => 'form-control']) }}--}}
            {{--</div>--}}

            {{--<div class="form-group">--}}
                {{--{!! Form::label('battery', 'battery') !!}--}}
                {{--{{ Form::select('battery', ['' => \App\Details::where('type', 'battery')->pluck('value', 'value')->toArray()], null, ['class' => 'form-control']) }}--}}
            {{--</div>--}}

            {!! Form::submit('submit', ['class' => 'btn btn-primary pull-right'])!!}

            <div class="form-group">
                <a class="btn btn-default pull-right" style="margin-right: 10px;">cancel</a>
            </div>

            {!! Form::close() !!}
        </div>

    </div>

@stop
