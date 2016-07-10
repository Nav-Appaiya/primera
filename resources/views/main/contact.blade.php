

@extends('layouts.master')

@section('titel', 'Primera shop')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Neem contact op met ons</h1>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                @if(Session::has('status'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('status') }}</p>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-offset-3">
                <form id="contact" method="post" action="/contact" class="form" role="form">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-xs-6 col-md-6 form-group">
                            <input class="form-control" id="name" name="name" placeholder="Naam" type="text" required autofocus />
                        </div>
                        <div class="col-xs-6 col-md-6 form-group">
                            <input class="form-control" id="email" name="email" placeholder="Email" type="email" required />
                        </div>
                    </div>
                    <textarea class="form-control" id="message" name="message" placeholder="Bericht of vraag" rows="5"></textarea>
                    <br />
                    <div class="row">
                        <div class="col-xs-12 col-md-12 form-group">
                            <button class="btn btn-primary pull-right" type="submit">Verstuur</button>
                </form>
            </div>
        </div>
    </div>

    {{--<!-- New Contact Form -->--}}
    {{--<form action="/contact" method="POST" class="form-horizontal">--}}
    {{--{{ csrf_field() }}--}}

    {{--<!-- Contact Name -->--}}
        {{--<div class="form-group">--}}
            {{--<label for="task" class="col-sm-3 control-label">Contact</label>--}}

            {{--<div class="col-sm-6">--}}
                {{--<input type="text" name="name" id="task-name" class="form-control">--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<!-- Add Task Button -->--}}
        {{--<div class="form-group">--}}
            {{--<div class="col-sm-offset-3 col-sm-6">--}}
                {{--<button type="submit" class="btn btn-default">--}}
                    {{--<i class="fa fa-plus"></i> Add Task--}}
                {{--</button>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</form>--}}
    {{--</div>--}}


@endsection

