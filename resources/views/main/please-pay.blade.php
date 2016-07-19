


@extends('layouts.master')

@section('titel', 'Primera shop')
@section('seotags', 'seotags')

@section('sidebar')
    {{--@parent--}}
@endsection

@section('content')
    <div class="container wrapper">


        <div class="row">
            <div class="col-md-12">
                @if(isset($message))
                    <h3 class="text-center">{!! $message !!} </h3>
                    <br>
                    @if(isset($url) and isset($info))
                        <div class="text-center">
                            <a href="{{ $url }}" class="btn btn-danger">{{ $info }}</a>
                        </div>
                    </span>
                    @endif
                @endif
            </div>
        </div>


    </div>
@endsection

