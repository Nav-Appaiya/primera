@extends('layouts.master')

@section('titel', 'Winkelwagen shop')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Winkelwagen</h1>
            </div>
        </div>

        <div class="row">
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
                    @foreach(session('cart')['item'] as $item)
                        <tr>
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-sm-2 hidden-xs">
                                        <img src="{{ $item->imageurl }}" alt="{{ $item->name }}" class="img-responsive"/>
                                    </div>
                                    <div class="col-sm-10">
                                        <h4 class="nomargin">{{ $item->name }}</h4>
                                        <p>{{ $item->description }}</p>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price">&euro; {{ $item->price }}</td>
                            <td data-th="Quantity">
                                <input type="number" class="form-control text-center" value="1">
                            </td>
                            <td data-th="Subtotal" class="text-center">{{ $item->price }}</td>
                            <td class="actions" data-th="">
                                <button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
                    <tr class="visible-xs">
                        <td class="text-center"><strong>Total 1.99</strong></td>
                    </tr>
                    <tr>
                        <td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Nog meer winkelen</a></td>
                        <td colspan="2" class="hidden-xs"></td>
                        <td class="hidden-xs text-center"><strong>Total $1.99</strong></td>
                        <td><a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <script>
        var items = JSON.parse(localStorage.getItem('cart'));
        for (i = 0; i < JSON.parse(localStorage.getItem('cart')).length; i++) {
            document.write(items[i] + "<br />");
        }
    </script>
@endsection
