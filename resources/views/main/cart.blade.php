@extends('layouts.master')

@section('titel', 'Winkelwagen shop')


@section('content')

<section class="bread-crumb">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="#">Homepage</a></li>
            <li><a href="#">Cartomizers</a></li>
            <li class="active">Product #1</li>
        </ol>
    </div>
</section>

<section class="content">
    <div class="container">
        <div class="row">
            
        </div>
    </div>
</section>

    <div class="container">
        <div class="row">
            <div class="col-xs-8">
                <div class="panel">
                    <div class="panel-body">
                        <h1>Winkelwagen</h1>
                        <hr>
                        @if(Session::has('cart'))
                            @foreach($products->items as $product)
                                <div class="row">
                                    <div class="col-xs-2">
                                        <img class="img-responsive" src="/images/product/{{$product['item']->product->productimages->first()->imagePath}}">

                                    </div>
                                    <div class="col-xs-4">
                                        <h4 class="product-name">
                                            <strong>{{$product['item']->product->name}} {{$product['item']->detail ? '- '.$product['item']->detail->value : ''}}</strong>
                                            <br>
                                            <small>{{str_limit($product['item']->product->description, 60, '...')}}</small>
                                        </h4>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="col-xs-4 text-right">
                                            <h6><strong>€{{number_format($product['price'], 2)}}<span class="text-muted"></span></strong></h6>
                                        </div>
                                        <div class="col-xs-6">
{{--                                            <a href="{{route('cart.add', $product['item']->product->id)}}" class="btn btn-sm btn-default fa fa-minus pull-left" aria-hidden="true"></a>--}}
                                            <input type="text" style="width: 40px; margin-right: 4px;" class="form-control input-sm pull-left text-center" value="{{$product['qty']}}" disabled>
{{--                                            <a href="{{route('cart.add', $product['item']->product->name)}}" class="btn btn-sm btn-default fa fa-plus pull-left" aria-hidden="true"></a>--}}
                                        </div>
                                        <div class="col-xs-2">
                                            <button type="button" class="btn btn-link btn-xs">
                                                <span class="glyphicon glyphicon-trash"> </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        @else
                            Uw winkelwagen is leeg.
                        @endif

                    </div>
                    <div class="panel-footer">
                        <div class="row text-center">
                            <div class="col-xs-9">
                                <h4 class="text-right">Totaal <strong>€ {{number_format($products['price'], 2)}}</strong></h4>
                            </div>
                            <div class="col-xs-3">
{{--                                <a href="{{route('cart.store', $product->id)}}">bestellen</a>--}}
                                {{--<a href="{{URL::route('cart.checkout')}}" class="btn btn-success btn-block">--}}
                                    checkout
                                </a>
                                {{--<a href="{{URL::route('cart.empty')}}" class="btn btn-danger btn-block">--}}
                                    empty
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--@if(count($products) >= 1)--}}
        {{--<ol class="breadcrumb">--}}
            {{--<li><a href="{{ URL::route('homepage') }}">Homepage</a></li>--}}
            {{--<li class="active">Winkelwagen</li>--}}
        {{--</ol>--}}

        {{--<div class="content">   --}}
            {{--<div class="row">--}}
                {{--<div class="col-md-12">--}}
                    {{--@if (Session::has('status'))--}}
                        {{--<div class="alert alert-info">{{ Session::get('status') }}</div>--}}
                    {{--@endif--}}
                {{--</div>--}}
                {{--<div class="col-md-12">--}}
                    {{--<table id="cart" class="table table-hover table-condensed">--}}
                        {{--<thead>--}}
                        {{--<tr>--}}
                            {{--<th style="width:50%">Product</th>--}}
                            {{--<th style="width:10%">Price</th>--}}
                            {{--<th style="width:8%">Quantity</th>--}}
                            {{--<th style="width:22%" class="text-center">Subtotal</th>--}}
                            {{--<th style="width:10%"></th>--}}
                        {{--</tr>--}}
                        {{--</thead>--}}
                        {{--<tbody>--}}

                        {{--@foreach($products as $item)--}}
                            {{--<tr>--}}
                                {{--<td data-th="Product">--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-sm-3 hidden-xs">--}}
                                            {{----}}
                                            {{--@if(count($item->productimages()->first()) >= 1)--}}
                                                {{--<img src="/uploads/img/{{ $item->productimages()->first()->imagePath }}"--}}
                                                     {{--alt="{{ $item->productimages()->first()->rel }}"--}}
                                                     {{--width="120%" class="text-center" style="margin-top:30px;"--}}
                                                {{-->--}}
                                            {{--@else--}}
                                                {{-- Default image at /images/product/default.jpg --}}
                                                {{--<img src="/uploads/img/default.jpg" alt="{{ $item->name }}"--}}
                                                     {{--class="img-responsive"/>--}}
                                            {{--@endif--}}
                                        {{--</div>--}}
                                        {{--<div class="col-sm-9">--}}
                                            {{--<h4 class="nomargin">{{ $item->name }}</h4>--}}
                                            {{--<p>--}}
                                                {{--<a href="{{ route('product.show', [$item->name, $item->id]) }}">--}}
                                                    {{--{{ $item->description }}--}}
                                                {{--</a>--}}
                                            {{--</p>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</td>--}}
                                {{--<td data-th="Price">&euro; {{ $item->price }}</td>--}}
                                {{--<td data-th="Quantity">--}}
                                    {{--<input type="number" class="form-control text-center" value="1">--}}
                                {{--</td>--}}
                                {{--<td data-th="Subtotal" class="text-center">{{ $item->price }}</td>--}}
                                {{--<td class="actions" data-th="">--}}
                                    {{--<a href="{{ URL::route('cart.remove', $item) }}" class="btn btn-danger btn-sm"--}}
                                       {{--role="button">Verwijderen uit winkelwagen <i class="fa fa-trash-o"></i></a>--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                        {{--@endforeach--}}

                        {{--</tbody>--}}
                        {{--<tfoot>--}}
                        {{--<tr class="visible-xs">--}}
                            {{--<td class="text-center"><strong>Totaal: &euro;{{ number_format($total, 2, '.', ',') }}</strong>--}}
                            {{--</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td><a href="{{ URL::route('homepage') }}" class="btn btn-warning"><i--}}
                                            {{--class="fa fa-angle-left"></i> Nog meer winkelen</a></td>--}}
                            {{--<td colspan="2" class="hidden-xs"></td>--}}
                            {{--<td class="hidden-xs text-center">--}}
                                {{--<strong>Totaal: &euro;{{ number_format($total, 2, '.', ',') }}</strong></td>--}}
                            {{--<td>--}}
                                {{--<a type="button" class="btn btn-success pull-right" href="{{ route('checkout_index') }}">--}}
                                    {{--Bestelling plaatsen--}}
                                {{--</a>--}}
                            {{--</td>--}}
                        {{--</tr>--}}
                        {{--</tfoot>--}}
                    {{--</table>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--@else--}}
                {{--<ol class="breadcrumb">--}}
                    {{--<li><a href="{{ URL::route('homepage') }}">Homepage</a></li>--}}
                    {{--<li class="active">Winkelwagen</li>--}}
                {{--</ol>--}}
                {{--<div class="content">--}}
                    {{--<h3 class="text-center">--}}
                        {{--Je hebt geen artikelen in je winkelwagen.--}}

                        {{--<a href="{{ URL::route('homepage') }}"> Ga naar de producten</a>.--}}
                    {{--</h3>--}}
                {{--</div>--}}
            {{--@endif--}}
        {{--</div>--}}
        {{--<script>--}}
            {{--var items = JSON.parse(localStorage.getItem('cart'));--}}
            {{--for (i = 0; i < JSON.parse(localStorage.getItem('cart')).length; i++) {--}}
                {{--document.write(items[i] + "<br />");--}}
            {{--}--}}
        {{--</script>--}}
@endsection

