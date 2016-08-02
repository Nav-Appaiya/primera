

@extends('layouts.master')

@section('titel', 'category')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">
                    {{--{{ $category->name }}--}}
                </h1>
            </div>
        </div>
    </div>
@endsection

