@extends('layouts.app')

@section('title')
   admin - all users
@endsection

@section('description')
    Here is you description. You can else echo content and use your foreach in here.
@stop

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">admin all users</div>

                    <div class="panel-body">

                        @include('layouts.menus.admin_menu')

                        @include('errors.message')

                        {!! Form::model($review, array('route' => array('admin_reviews_update', $review->id))) !!}

                            {!! Form::label('biography', 'biography') !!}
                            {!! Form::textarea('biography', null,  ['class' => 'form-control']) !!}
                            <br>
                            <hr>
                            {!! Form::submit('save changes', ['class' => 'btn btn-primary'])!!}
                            <a class="btn btn-default" href="{{URL::route('admin_authors_all')}}">back</a>
                            <a class="btn btn-default" href="{{URL::route('admin_reviews_destroy', $review->id)}}">delete</a>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')

    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

@endsection