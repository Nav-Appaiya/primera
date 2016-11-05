@extends('layouts.master')

@section('titel', $category->title)
@section('breadcrumbs', Breadcrumbs::render('category', $category))

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>{{$category->title}}</h1>
            <hr>
        </div>
            @foreach($category->children as $child)
                <a href="{{ route('product.index', [str_replace(' ', '-', $category->title), str_replace(' ', '-', $child->title), $child->id ]) }}">
                    <div class="col-lg-4">
                        <div class="panel grey" style="border: 1px solid #E8E8E8;">
                            <div class="panel-body">
                                <h6>{{$child->title}}</h6>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection