@extends('admin-panel.layouts.admin')

@section('title', 'Nieuwe categorie')
@section('breadcrumb', Breadcrumbs::render('dashboard.category.create'))

@section('content')

    <div class="row">
        <div class="col-lg-6">
            <div class="table-responsive">
                <div class="panel panel-default">
                    {{--<div class="panel-heading">category</div>--}}

                    <div class="panel-body">

                        {!! Form::open(['route' => 'admin_category_store']) !!}

                        <!-- created_at -->
                        <div class="form-group">
                            {!! Form::label('title', 'titel') !!}
                            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                        </div>

                        <!-- category id -->
                        <div class="form-group">
                            {!! Form::label('category_id', 'categorie') !!}
                            {!! Form::select('category_id', array('' => '----- select -----', '0' => 'nieuwe categorie', 'koppel aan:' => \App\Category::where('category_id', 0)->pluck('title', 'id')->toArray() ), null, ['class' => 'form-control'] ) !!}
                        </div>

                        {!! Form::submit('upload', ['class' => 'btn btn-primary pull-right'])!!}

                        <div class="form-group">
                            <a class="btn btn-default pull-right" href="{{route('admin_category_index')}}" style="margin-right: 10px;">stop</a>
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('javascript')

@endsection