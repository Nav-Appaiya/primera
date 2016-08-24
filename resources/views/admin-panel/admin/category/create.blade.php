@extends('admin-panel.layouts.admin')

@section('title', 'new category')
{{--@section('breadcrumb', Breadcrumbs::render('dashboard.category.edit'))--}}

@section('content')

    <div class="row">
        <div class="col-lg-6">
            <div class="table-responsive">
                <div class="panel panel-default">
                    <div class="panel-heading">category</div>

                    <div class="panel-body">
                        @include('errors.message')

                        {!! Form::open(['route' => 'admin_category_store']) !!}

                        <!-- created_at -->
                        <div class="form-group">
                            {!! Form::label('name', 'name') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                        </div>

                        <!-- category id -->
                        <div class="form-group">
                            {!! Form::label('cate_id', 'category') !!}
                            {!! Form::select('category_id', array('' => '----- select -----', '0' => 'nieuwe categorie', 'sub categorieen' => \App\Category::where('CategoryID', 0)->pluck('title', 'id')->toArray() ), null, ['class' => 'form-control'] ) !!}
                        </div>

                        {!! Form::submit('submit', ['class' => 'btn btn-primary pull-right'])!!}

                        <div class="form-group">
                            <a class="btn btn-default pull-right" style="margin-right: 10px;">cancel</a>
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