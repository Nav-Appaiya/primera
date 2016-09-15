@extends('layouts.master')

@section('titel', 'Winkelwagen shop')


@section('content')
    @if(count($products) >= 1)
        <ol class="breadcrumb">
            <li><a href="{{ URL::route('homepage') }}">Homepage</a></li>
            <li class="active">Winkelwagen</li>
        </ol>

        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    @if (Session::has('status'))
                        <div class="alert alert-info">{{ Session::get('status') }}</div>
                    @endif
                </div>
                <div class="col-md-12">
                    <table id="cart" class="table table-hover table-condensed">
                        <thead>
                        <tr>
                            <th style="width:50%">Product</th>
                            <th style="width:10%">Price</th>
                            <th style="width:8%">Quantity</th>
                            <th style="width:22%" class="text-center">Subtotal</th>
                            <th style="width:10%"></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($products as $item)
                            <tr>
                                <td data-th="Product">
                                    <div class="row">
                                        <div class="col-sm-3 hidden-xs">
                                            
                                            @if(count($item->productimages()->first()) >= 1)
                                                <img src="{{ $item->productimages()->first()->imagePath }}"
                                                     alt="{{ $item->productimages()->first()->rel }}"
                                                     class="img-responsive"
                                                     style="max-width: none !important; width: 100px !important;"
                                                >
                                            @else
                                                {{-- Default image at /images/product/default.jpg --}}
                                                <img src="/images/product/default.jpg" alt="{{ $item->name }}"
                                                     class="img-responsive"/>
                                            @endif
                                        </div>
                                        <div class="col-sm-9">
                                            <h4 class="nomargin">{{ $item->name }}</h4>
                                            <p>
                                                <a href="{{ route('product.show', [$item->name, $item->id]) }}">
                                                    {{ $item->description }}
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td data-th="Price">&euro; {{ $item->price }}</td>
                                <td data-th="Quantity">
                                    <input type="number" class="form-control text-center" value="1">
                                </td>
                                <td data-th="Subtotal" class="text-center">{{ $item->price }}</td>
                                <td class="actions" data-th="">
                                    <a href="{{ URL::route('cart.remove', $item) }}" class="btn btn-danger btn-sm"
                                       role="button">Verwijderen uit winkelwagen <i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr class="visible-xs">
                            <td class="text-center"><strong>Totaal: &euro;{{ number_format($total, 2, '.', ',') }}</strong>
                            </td>
                        </tr>
                        <tr>
                            <td><a href="{{ URL::route('homepage') }}" class="btn btn-warning"><i
                                            class="fa fa-angle-left"></i> Nog meer winkelen</a></td>
                            <td colspan="2" class="hidden-xs"></td>
                            <td class="hidden-xs text-center">
                                <strong>Totaal: &euro;{{ number_format($total, 2, '.', ',') }}</strong></td>
                            <td>
                                <a type="button" class="btn btn-success pull-right" href="{{ route('checkout') }}">
                                    Bestelling plaatsen
                                </a>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            @else
                <ol class="breadcrumb">
                    <li><a href="{{ URL::route('homepage') }}">Homepage</a></li>
                    <li class="active">Winkelwagen</li>
                </ol>
                <div class="content">
                    <h3 class="text-center">
                        Je hebt geen artikelen in je winkelwagen.

                        <a href="{{ URL::route('homepage') }}"> Ga naar de producten</a>.
                    </h3>
                </div>
            @endif
        </div>
        <script>
            var items = JSON.parse(localStorage.getItem('cart'));
            for (i = 0; i < JSON.parse(localStorage.getItem('cart')).length; i++) {
                document.write(items[i] + "<br />");
            }
        </script>
@endsection

