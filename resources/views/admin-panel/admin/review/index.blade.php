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
                    <th>product naam</th>
                    <th>product nummers</th>
                    <th>Beschrijving</th>
                    <th>aantal <br>reviews</th>
                    <th>Gem. <br>score</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        @if($product->review->count())
                            <tr class="table-row" data-href="{{route('admin_product_edit', $product->id)}}">
                                <td>{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td>
                                    @foreach($product->property as $property)
                                        {{$property->serialNumber}},
                                    @endforeach
                                </td>
                                <td>{{$product->description}}</td>
                                <td>{{$product->review->count()}}</td>
                                <td>{{$product->review->avg('rating')}}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>

        </div>
        {{--</div>--}}

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