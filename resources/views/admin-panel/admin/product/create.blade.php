@extends('admin-panel.layouts.admin')

@section('title', 'new product')
{{--@section('breadcrumb', Breadcrumbs::render('dashboard.category'))--}}

@section('content')

    <div class="row">
        <div class="col-md-10">

<pre>
    {!! var_dump($errors) !!}
    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach
</pre>

        @include('errors.message')

            {!! Form::open(array('route' => 'admin_product_store', 'method' => 'post', 'files' => true )) !!}

            <div class="form-group">
                {!! Form::label('name', 'name') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => '']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('description', 'description') !!}
                {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => '']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('status', 'status') !!}
                {!! Form::text('status', null, ['class' => 'form-control', 'placeholder' => '']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('discount', 'discount') !!}
                {!! Form::text('discount', null, ['class' => 'form-control', 'placeholder' => '']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('price', 'price') !!}
                {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => '']) !!}
            </div>

            <!-- category id -->
            <div class="form-group">
                {!! Form::label('cate_id', 'category') !!}
                {!! Form::select('category_id', array('' => '----- select -----', 'sub categories' => \App\Category::where('categoryID', '!=', 0)->pluck('title', 'id')->toArray() ), null, ['class' => 'form-control'] ) !!}
{{--                {!! Form::select('category_id', array('' => '----- select -----', '0' => 'new main category', 'for sub categories' => \App\Category::where('categoryID', 0)->pluck('title', 'id')->toArray() ), null, ['class' => 'form-control'] ) !!}--}}
            </div>

            {!! Form::file('images[]', array('multiple' => true)) !!}

            {!! Form::submit('submit', array('class' => 'btn btn-default'))!!}

        {!! Form::close() !!}

        </div>


        <div class="col-md-2">
            <ul class="list-group">
                <li class="list-group-item"><a href="{{route('admin_product_create')}}">new</a></li>
                 {{--<li class="list-group-item"><a href="{{route('admin_property_create')}}">new</a></li>--}}
            </ul>
        </div>

    </div>

@stop
