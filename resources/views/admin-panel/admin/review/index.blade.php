@extends('admin-panel.layouts.admin')

@section('title')
   admin - all users
@endsection

@section('description')
    Here is you description. You can else echo content and use your foreach in here.
@stop

@section('content')

    <div class="row">
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
                </tr>
                </thead>
                <tbody>
                {{--@foreach ($products as $product)--}}
                    {{--<tr class="table-row" data-href="{{route('admin_product_edit', $product->id)}}">--}}
                        {{--<td>{{$product->id}}</td>--}}
                        {{--<td>{{$product->name}}</td>--}}
                        {{--<td>{{$product->description}}</td>--}}
                        {{--<td>{{$product->status}}</td>--}}
                        {{--<td>{{$product->price}}</td>--}}
                        {{--<td>{{$product->category->title}}</td>--}}
                        {{--<td>{{$product->created_at}}</td>--}}
                        {{--<td>{{$product->updated_at}}</td>--}}
                    {{--</tr>--}}
                {{--@endforeach--}}
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

@endsection

@section('javascript')

    <script type="text/javascript">
        $(document).ready(function($) {
            $(".table-row").click(function() {
                window.document.location = $(this).data("href");
            });
        });
    </script>

@endsection