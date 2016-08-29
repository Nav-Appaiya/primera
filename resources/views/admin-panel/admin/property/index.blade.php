@extends('admin-panel.layouts.admin')

@section('title', 'Product details')
{{--@section('breadcrumb', Breadcrumbs::render('dashboard.category'))--}}

@section('content')

    <div class="row">
        <div class="col-md-10">

            <div class="row">
                <div class="col-md-4">
                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Nicotine</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($property->where('type', 'nicotine') as $prop)
                            <tr class="table-row" data-href="{{route('admin_property_edit', $prop->id)}}">
                                <td>{{$prop->id}}</td>
                                <td>{{$prop->value}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="col-md-4">
                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>mAh</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($property->where('type', 'battery') as $prop)
                            <tr class="table-row" data-href="{{route('admin_property_edit', $prop->id)}}">
                                <td>{{$prop->id}}</td>
                                <td>{{$prop->value}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="col-md-4">
                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>color</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($property->where('type', 'color') as $prop)
                            <tr class="table-row" data-href="{{route('admin_property_edit', $prop->id)}}">
                                <td>{{$prop->id}}</td>
                                <td>{{$prop->value}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
            {{--</div>--}}

        <div class="col-md-2">
            <ul class="list-group">
                <li class="list-group-item"><a href="{{route('admin_property_create')}}">new</a></li>
                {{--<li class="list-group-item"><a href="{{route('admin_property_create')}}">new</a></li>--}}
            </ul>
        </div>

    </div>

@stop
