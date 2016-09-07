@extends('admin-panel.layouts.admin')

@section('title', 'Producten')
@section('breadcrumb', Breadcrumbs::render('dashboard.product.index'))

@section('content')

    <style>
        .tooltip .tooltiptext {
            width: 120px;
            top: 100%;
            left: 50%;
            margin-left: -60px; /* Use half of the width (120/2 = 60), to center the tooltip */
        }
    </style>

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
                        <th>serienummer</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                     @foreach ($products as $product)
                         {{--<tr class="clickable " data-toggle="collapse" id="row{{$product->id}}" data-target=".row{{$product->id}}">--}}
                         {{--<tr data-toggle="collapse" data-target="#demo2" class="accordion-toggle">--}}
                        <tr class="table-row" data-href="{{route('admin_product_edit', $product->id)}}">
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->status}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->category->title}}</td>
                            <td>{{$product->created_at}}</td>
                            <td>{{$product->updated_at}}</td>
                            <td>{{$product->updated_at}}</td>
                            {{--<td><a data-container="body" title="Looooooooooooooooooooooooooooooooooooooong Message" href="#" class="tooltiplink" data-toggle="tooltip" data-placement="bottom" data-html="true"><i class="glyphicon glyphicon-info-sign"></i></a></td>--}}
                            <td>
                                <p style="margin-bottom: 0px" data-toggle="tooltip" data-placement="left" data-container="body" title="
                                    <label class='pull-left' style='padding-right:5em'>nummer</label> <label class='pull-right'>voorraad</label><br>
                                    @foreach($product->property as $item)
                                        <label class='pull-left' style='padding-right:5em'>{{$item->serialNumber}}</label> <label class='pull-right'>{{$item->stock}}</label><br>
                                    @endforeach
                                    " data-html="true">
                                    @if($product->property->first())
                                        {{--{{ $product->property->first() ? null : 'aaa'}}--}}
                                        {{$product->property->sum('stock')}}
                                    @else
                                        incompleet
                                    @endif
                                </p>
                            </td>
                         {{--@foreach($product->property as $item)--}}
                             {{--<tr class="collapse row{{$product->id}}">--}}
                                 {{--<td>- child row</td>--}}
                                 {{--<td>--}}
                                     {{--{{$item->serialNumber}}--}}
                                 {{--</td>--}}
                             {{--</tr>--}}
                             {{--@endforeach--}}
                            {{--</td>--}}

                        </tr>
                             {{--<tr>--}}
                                 {{--<td colspan="6" class="hiddenRow"><div id="demo2" class="accordian-body collapse">Demo2</div></td>--}}
                             {{--</tr>--}}


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

@push('scripts')
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip({
            container : 'body'
        });
    });
</script>
@endpush