

@extends('layouts.master')

@section('titel', 'Primera shop')
@section('seotags', 'seotags')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-12">
            	<div class="panel panel-default">
            		<div class="panel-heading">Over ons</div>
            		<div class="panel-body">
		                <p class="text-center">Lees hier over ons.</p>
                	</div>
                </div>
            </div>
        </div>
    </div>
@endsection

