@extends('admin-panel.layouts.admin')

@section('title', 'Categorieën')
{{--@section('breadcrumb', Breadcrumbs::render('dashboard.category'))--}}

@section('content')

    <div class="row">
        <div class="col-lg-10">
            <div class="table-responsive">
                @if(count($categories) >= 1)
                    @foreach ($categories as $category)
                        <div class="col-lg-4">
                            <div class="thumbnail">
                                <ul>
                                    <li style="margin-bottom: 7px;"><span style="font-weight: bold">{{$category->title}} </span><a class="pull-right " href="{{ URL::route('admin_category_edit', $category->id) }}"><span class="label label-default ">edit</span></a></li>
                                    <ul>
                                        @foreach ($category->children as $child)
                                            <li>{{ $category->id }} - {{ $child->title }} <a class="pull-right" href="{{ URL::route('admin_category_edit', str_replace(' ', '-', $child->title)) }}"><span class="label label-default">edit</span></a></li>
                                        @endforeach
                                    </ul>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>Er zijn nog geen categorieen aangemaakt</p>
                @endif

            </div>
        </div>

        <div class="col-lg-2 pull-right">
            <ul class="list-group">
                <li class="list-group-item"><a href="{{route('admin_category_create')}}">new</a></li>
            </ul>
        </div>

    </div>

@stop