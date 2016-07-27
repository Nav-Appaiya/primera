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
                    <div class="panel-heading">Nieuw category toevoegen <a class="btn btn-primary btn-xs pull-right" href="{{route('admin_category_create')}}">nieuw category</a></div>
                    <div class="panel-body" >

                        @include('errors.message')

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
