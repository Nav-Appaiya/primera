@extends('layouts.app')

@section('titel', 'Nieuw product')

@section('sidebar')
    @parent
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Nieuw category toevoegen
                        <a class="btn btn-primary btn-xs pull-right" href="{{route('admin_category_create')}}">
                            Nieuwe category
                        </a>
                    </div>
                    <div class="panel-body">
        @include('errors.message')
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @foreach ($categories as $category)
                            <div class="col-lg-4">
                                <div class="thumbnail">
                                    <ul>
                                        <li style="margin-bottom: 7px;">
                                            <span style="font-weight: bold">{{$category->title}} </span>
                                            <a class="pull-right"
                                               href="{{ URL::route('admin_category_edit', $category->id) }}"><span
                                                        class="label label-default ">edit</span></a></li>
                                        <ul>
                                            @foreach ($category->children as $child)
                                                <li>
                                                    {{ $child->title }}
                                                    <a class="pull-right"
                                                       href="{{ URL::route('admin_category_edit', $child->id) }}">
                                                        <span class="label label-default">edit</span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </ul>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
