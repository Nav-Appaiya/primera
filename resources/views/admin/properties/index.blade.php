@extends('layouts.app')

@section('titel', 'Nieuw product')

@section('sidebar')
    @parent
@endsection

@section('content')

    <div class="container">
        <div class="row">
            @if(session()->has('status'))
                <div class="alert alert-info col-md-10 col-md-offset-1">
                    {{	session()->get('status') }}
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Nieuw Property toevoegen <a class="btn btn-primary btn-xs pull-right" href="{{route('admin_property_create')}}">nieuwe Property</a></div>
                    <div class="panel-body" >
                        <table class="table table-striped">
                            <thead>
                                <td>Naam</td>
                                <td>Acties</td>
                            </thead>
                            <tbody>
                            @foreach ($properties as $property)
                                <tr>
                                    <td>{{$property->name}}</td>

                                    <td class="btn-block">
                                        <a href="/admin/property/destroy/{{ $property->id}}"
                                           onclick="confirm('Weet je zeker dat je deze property wilt verwijderen?')">
                                            <button class="btn btn-success btn-block">Verwijderen</button>
                                        </a>
                                        <div style="margin-top: 10px"></div>
                                        <a href="/admin/property/{{$property->id}}/edit" style="display: block">
                                            <button class="btn btn-block btn-warning">Aanpassen</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @include('errors.message')

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
