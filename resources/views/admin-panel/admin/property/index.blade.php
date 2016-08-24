@extends('admin-panel.layouts.admin')

@section('title', 'categories')
{{--@section('breadcrumb', Breadcrumbs::render('dashboard.category'))--}}

@section('content')

    <div class="row">
        <div class="col-md-10">

            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                    </tr>
                </thead>
                <tbody>
                     @foreach ($property as $prop)
                        <tr class="table-row" data-href="{{route('admin_property_edit', $prop->id)}}">
                            <td>{{$prop->id}}</td>
                            <td>{{$prop->name}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

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