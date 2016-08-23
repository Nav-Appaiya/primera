@extends('admin-panel.layouts.admin')

@section('title', 'categories')
{{--@section('breadcrumb', Breadcrumbs::render('dashboard.category'))--}}

@section('content')

    <div class="row">
        <div class="col-lg-10">
            <div class="table-responsive">
                {{--@foreach ($categories as $category)--}}
                    {{--<div class="col-lg-4">--}}
                        {{--<div class="thumbnail">--}}
                            {{--<ul>--}}
                                {{--<li style="margin-bottom: 7px;"><span style="font-weight: bold">{{$category->name}} {{ $category->video->count()}} </span><a class="pull-right " href="{{ URL::route('admin_category_edit', str_replace(' ', '-', $category->name)) }}"><span class="label label-default ">edit</span></a></li>--}}
                                {{--<ul>--}}
                                    {{--@foreach ($category->children as $child)--}}
                                        {{--<li>{{ $category->id }} - {{ $child->name }} <a class="pull-right" href="{{ URL::route('admin_category_edit', str_replace(' ', '-', $child->name)) }}"><span class="label label-default">edit</span></a></li>--}}
                                    {{--@endforeach--}}
                                {{--</ul>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--@endforeach--}}
                    {{--@foreach ($videos as $video)--}}
                        {{--<tr class="table-row" data-href="{{route('admin_videos_edit', $video->id)}}">--}}
                            {{--<td>{{$video->id}}</td>--}}
                            {{--<td>{{$video->name}}</td>--}}
                            {{--<td>{{$video->prijs}}</td>--}}
                            {{--<td>--}}
                                {{--{{$video->author->name}}--}}
                            {{--</td>--}}
                            {{--<td>{{$video->order->count()}}</td>--}}
                            {{--<td>{{$video->order->count() * $video->prijs}}</td>--}}
                        {{--</tr>--}}
                    {{--@endforeach--}}
            </div>
        </div>

        <div class="col-lg-2 pull-right">
            <ul class="list-group">
                <li class="list-group-item"><a href="{{route('admin_category_create')}}">new</a></li>
            </ul>
        </div>

    </div>

@endsection

@section('javascript')

@endsection