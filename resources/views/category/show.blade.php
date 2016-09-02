@extends('layouts.master')

@section('titel', 'Primera shop')
@section('seotags', 'seotags')

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>{{$category->title}}</h1>
    <hr>

    <br>
    @foreach($category->children as $child)
        <a href="{{ route('product.index', [str_replace(' ', '-', $category->title), str_replace(' ', '-', $child->title), $child->id ]) }}">
            <div class="col-lg-3 thumbnail">
                <h1>{{$child->title}}</h1>
            </div>
        </a>
    @endforeach

@endsection