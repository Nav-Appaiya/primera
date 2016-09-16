


@extends('layouts.master')

@section('titel', 'Primera shop')
@section('seotags', 'seotags')

@section('sidebar')
    {{--@parent--}}
@endsection

@section('content')
    <div class="container wrapper">

        <div class="row">
            <br>
            <br>
            <br>
            <div class="col-md-12">
                <div class="text-center center-block">
                    <div class="logo">
                        <img src="http://esiggie.nl/wp-content/uploads/2014/12/Esiggie-logo.png" width="200">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                @if(isset($message))
                    <h3 class="text-center">{!! $message !!} </h3>
                    <br>
                    <br>
                    @if(isset($url) and isset($info))
                        <div class="text-center">
                            <a href="{{ $url }}" class="btn btn-danger">{{ $info }}</a>
                        </div>
                    </span>
                    @endif
                    <br>
                    <br>
                @endif
            </div>
        </div>


    </div>
@endsection

