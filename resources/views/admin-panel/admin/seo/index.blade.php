@extends('admin-panel.layouts.admin')

@section('title', 'Dashboard')
@section('breadcrumb', Breadcrumbs::render('dashboard'))

@section('content')

{{dd($pages)}}
    {{--@foreach($pages as $page => $value)--}}
        {{--{{dd($value)}}--}}
        {{--{{$value['url']}}<br>--}}

        {{--{{$page}}<br>--}}
    {{--@endforeach--}}

    {{Form::open(array('route' => 'admin_seo_create', 'method' => 'patch'))}}
    {{Form::text('text', null, ['class' => ''])}}
    {{Form::select('text', $pages->lists('url', 'method'), ['class' => ''])}}
    {{Form::submit('submit', ['class' => ''])}}

    {{Form::close()}}

@stop

@push('scripts')

@endpush
