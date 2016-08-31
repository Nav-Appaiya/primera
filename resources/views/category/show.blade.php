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
        <div class="col-lg-3 thumbnail">
            <a></a>
            <h1>{{$child->title}}</h1>
        </div>
    @endforeach

@endsection