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
                <div class="panel-heading">Review bewerken</div>
                <div class="panel-body">
                    <p> Review van: {{ $review->user->name }} </p>
                    <p>Geplaats op: {{  $review->created_at }}</p>
                    @include('errors.message')

                    {!! Form::model($review, array('route' => array('admin_review_update', $review->id))) !!}

                    <input type="hidden" name="user_id" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">
                    <input type="hidden" name="product_id" value="{{ $review->id }}">

                    <div class="form-group">
                        {{ Form::label('description', 'Description') }}
                        {{ Form::textarea('description', null, ['class' => 'form-control']) }}
                    </div>
                    
                    <div class="form-group">
                        {{ Form::label('rating', 'Rating', ['class' => 'col-md-10 control-label']) }}
                        {{ Form::number('rating', null, ['class' => 'form-control']) }}
                    </div>

                    {!! Form::submit('save changes', ['class' => 'btn btn-primary'])!!}
                    
                    <a class="btn btn-default" href="{{URL::route('admin_review_index')}}">back</a>
                    <a class="btn btn-default" href="{{URL::route('admin_review_destroy', $review->id)}}">delete</a>
                    
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