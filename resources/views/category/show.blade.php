@extends('layouts.master')

@section('titel', 'Primera shop')
@section('breadcrumbs', Breadcrumbs::render('category', $category))

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>{{$category->title}}</h2>
        </div>
                @foreach($category->children as $child)
                    <a href="{{ route('product.index', [str_replace(' ', '-', $category->title), str_replace(' ', '-', $child->title), $child->id ]) }}">
                        <div class="col-lg-4">
                            <div class="panel grey">
                                <div class="panel-body">
                                    <h6>{{$child->title}}</h6>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection