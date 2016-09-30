@extends('layouts.master')

@section('titel', 'Winkelwagen shop')
@section('breadcrumbs', Breadcrumbs::render('cart'))

@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <center>
                        <h2 style="margin-bottom: 25px; margin-top: 0px;">Winkelwagen</h2>
                    </center>
                </div>

                <div class="col-lg-9">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            @if(Session::has('cart'))
                                @foreach($products->items as $product)
                                    <div class="row">
                                        <div class="col-xs-2">
                                            <img class="img-responsive"
                                                 src="/images/product/{{$product['item']->product->productimages->first()->imagePath}}">

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
                                                <h6><strong>€{{number_format($product['price'], 2)}}<span
                                                                class="text-muted"></span></strong></h6>
                                            </div>
                                            <div class="col-xs-6">
                                                <a href="{{route('cart.add', $product['item']->product->id)}}"
                                                   class="btn btn-sm btn-default fa fa-minus pull-left"
                                                   aria-hidden="true"></a>
                                                <input type="text" style="width: 40px; margin-right: 4px;"
                                                       class="form-control input-sm pull-left text-center"
                                                       value="{{$product['qty']}}" disabled>
                                                <a href="{{route('cart.add', $product['item']->product->name)}}"
                                                   class="btn btn-sm btn-default fa fa-plus pull-left"
                                                   aria-hidden="true"></a>
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

                        <div class="panel-footer" style="overflow: hidden;">
                            <div class="col-lg-offset-8 col-lg-4">
                                <h4 class="text-right">Subtotaal excl. btw <strong>€ {{ Session::has('cart') ? 
                                number_format($products['price'] - round( ($products['price'] / 100) * 21, 2), 2) : 0}}</strong>
                                </h4>
                                <h4 class="text-right">btw 21%
                                    <strong>€ {{Session::has('cart') ? round( ($products['price'] / 100) * 21, 2) : 0}}</strong>
                                </h4>

                                <h4 class="text-right">Totaal incl. btw
                                    € <strong id="totalprice">{{ Session::has('cart') ? number_format($products['price'], 
                                    2) : 
                                    0}}</strong>
                                </h4>
                            </div>
                            {!! Form::model(null, array('route' => array('cart.update'), 'method' => 'PATCH')) !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            
                                <label>Levering</label><br>

                                {{--{{ Form::text('text', null, ['class' => 'form']) }}--}}
                                <input type="radio" name="levering" value="postnl" onclick="verzendkosten(this.value)" checked> 
                                Verzenden met 
                                PostNL<br>
                                <small>+ €3.95</small>
                                <br>

                                <input type="radio" name="levering" value="ophalen" onclick="verzendkosten(this.value)"> 
                                Ophalen in
                                Eindhoven <br>
                                <small>+ €0.00</small>
                            <hr/>
                            <label>Betaalmethoden</label>
                                <select onchange="this.form.submit()" name="betaalmethode" id="betaalmethode">
                                    @foreach ($methods as $method)
                                        <option value="{{$method->id}}"
                                                style="background-image:url({{$method->image->normal}});">
                                            {{($method->description)}}
                                            {{htmlspecialchars($method->id)}}
                                            <small class="text-right" style="font-size: 6px !important;">
                                                + {{$method->amount->minimum}}</small>
                                        </option>
                                    @endforeach
                                </select>
                                <hr/>
                                {!! Form::submit('afrekenen', ['class' => 'btn btn-success btn-block'])!!}

                                <a href="{{URL::route('cart.empty')}}" class="btn btn-danger btn-block">
                                    legen
                                </a>

                                {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

@stop

@push('script')
<script src="js/msdropdown/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="js/msdropdown/jquery.dd.min.js" type="text/javascript"></script>
{{--<link rel="stylesheet" type="text/css" href="css/msdropdown/dd.css" />--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.devbridge-autocomplete/1.2.26/jquery.autocomplete.js"></script>
<script>

    //        $(document).ready(function() {
    //            $('#submit').click(function(e) {
    //                e.preventDefault();
    //                $.ajax({
    //                    type: 'POST',
    ////                    http://maps.googleapis.com/maps/api/geocode/json?region=NL&language=nederlands&address=pietercoecke%20straat,14
    //                    url: 'http://maps.googleapis.com/maps/api/geocode/json?sensor=false&address=5643vk 11',
    //                    data: {id1: $('#id1').val()},
    //                    success: function(data)
    //                    {
    //                        console.log(data);
    //                        $("#content").html(data);
    //                    }
    //                });
    //            });
    //        });

</script>

@endpush

@push('css')
<link rel="stylesheet" type="text/css" href="css/msdropdown/dd.css"/>
@endpush

