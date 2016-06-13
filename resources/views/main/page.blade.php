

@extends('layouts.master')

@section('titel', 'Primera shop')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">{{ $page->name }}</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <span>
{!! $page->content !!}
                </span>
            </div>
        </div>
    </div>

@endsection

