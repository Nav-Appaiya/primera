@extends('admin-panel.layouts.admin')

@section('title', 'Producten')
@section('breadcrumb', Breadcrumbs::render('dashboard.product.index'))


@push('scripts')
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip({
            container : 'body'
        });
    });
</script>
@endpush

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

        <div class="col-md-8">
            <div class="thumbnail">
                <a class="btn btn-primary pull-right" style="margin-left: 10px;" href="{{route('admin_product_create')}}">nieuw</a>
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
                            <th>voorraad <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" data-container="body" title="Het product dat het minste op voorraad is wordt getoond als notificatie, als u er overheen hoverd ziet u meer. Incompleet betekent dat er nog geen details aangemaakt zijn op het product." aria-hidden="true"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach ($products as $product)
                             {{--<tr class="clickable " data-toggle="collapse" id="row{{$product->id}}" data-target=".row{{$product->id}}">--}}
                             {{--<tr data-toggle="collapse" data-target="#demo2" class="accordion-toggle">--}}
                            <tr class="table-row" data-href="{{route('admin_product_edit', $product->id)}}">
                                <td>{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{str_limit($product->description, 30)}}</td>
                                <td>{{$product->status}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->category->title}}</td>
                                <td>{{date("d M, Y", strtotime($product->created_at))}}</td>
                                <td>{{date("d M, Y", strtotime($product->updated_at))}}</td>
                                <td>
                                    <p style="margin-bottom: 0px" data-toggle="tooltip" data-placement="left" data-container="body" title="
                                        <label class='pull-left' style='padding-right:5em'>nummer</label> <label class='pull-right'>voorraad</label><br>
                                        @foreach($product->property as $item)
                                            <label class='pull-left' style='padding-right:5em'>{{$item->serialNumber}}</label> <label class='pull-right'>{{$item->stock}}</label><br>
                                        @endforeach<br>
                                        " data-html="true">
                                        @if($product->property->first())
                                            @foreach($product->property()->orderBy('stock', 'ASC')->get() as $property)
                                                @if($property->stock == 0)
                                                    <span class="label label-danger">uitverkocht</span>
                                                    @break;
                                                @elseif($property->stock > 14)
                                                    <span class="label label-primary">15 of meer</span>
                                                    @break;
                                                @elseif($property->stock > 5)
                                                    <span class="label label-success">6 of meer</span>
                                                    @break;
                                                @elseif($property->stock <= 5)
                                                    <span class="label label-warning">5 of minder</span>
                                                    @break;
                                                @endif
                                            @endforeach
                                        @else
                                            <span class="label label-default">incompleet</span>
                                        @endif
                                    </p>
                                </td>

                            </tr>

                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="col-lg-4">
            <div class = "panel panel-default">
                <div class = "panel-body ">
                    <div class="row">
                        <div class="col-sm-12">
                            {!! Form::open(array('route' => 'admin_product_property_addstock', 'method' => 'patch', 'class' => 'form-inline, panel')) !!}

                            <div class="row">
                                <label class="col-lg-12">Voeg product toe aan voorraad</label>

                                <div class="col-sm-9">
                                    {!! Form::text('serialNumber', null, ['class' => 'form-control col-lg-8', 'placeholder' => 'product nummer']) !!}
                                </div>
                                <div class="col-sm-3">
                                    {!! Form::number('stock', null, ['class' => 'form-control col-lg-2', 'placeholder' => 'aantal', 'min' => '1', 'max' => '1000']) !!}
                                </div>
                            </div>
                            <br>
                                {!! Form::submit('toevoegen', ['class' => 'btn btn-primary']) !!}

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
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