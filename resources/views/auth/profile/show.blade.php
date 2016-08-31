@extends('layouts.master')

@section('titel', 'Primera shop')
@section('seotags', 'seotags')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container">


        @if(Auth::check())
            <div class="row">
                <h3 class="text-center">Goedenmiddag,  {{ $user->voornaam }} {{ $user->achternaam }}!</h3>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{ $user->voornaam }} {{ $user->achternaam }}</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class=" col-md-12 col-lg-12">
                                    <table class="table table-user-information">
                                        <tbody>
                                        <tr>
                                            <td>E-mail</td>
                                            <td>{{ $user->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Username</td>
                                            <td>{{ $user->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Wachtwoord</td>
                                            <td>*******</td>
                                        </tr>
                                    </table>
                                    <br>
                                    <table class="table table-user-information">

                                        <tr>
                                            <td>Voornaam</td>
                                            <td>{{ $user->voornaam }}</td>
                                        </tr>
                                        <tr>
                                            <td>Achternaam</td>
                                            <td>{{ $user->achternaam }}</td>
                                        </tr>
                                        <tr>
                                            <td>Geboortedatum</td>
                                            <td>{{ $user->geboortedatum }}</td>
                                        </tr>
                                        <tr>
                                        <tr>
                                            <td>Straat</td>
                                            <td>{{ $user->adres }}</td>
                                        </tr>
                                        <tr>
                                            <td>Postcode</td>
                                            <td>{{ $user->postcode }}</td>
                                        </tr>
                                        <tr>
                                            <td>Plaats</td>
                                            <td>{{ $user->woonplaats }}</td>
                                        </tr>
                                        <td>Phone Number</td>
                                        <td>{{ $user->telThuis }}(vast)<br><br>{{ $user->telMobiel }}(mobiel)
                                        </td>

                                        </tr>

                                        </tbody>
                                    </table>

                                    {{--<a href="{{ route('cart') }}" class="btn btn-primary">Mijn winkelwagen</a>--}}
                                    <a href="{{ route('user.edit') }}" class="btn btn-primary">Account Wijzigen</a>
                                    {{--<a href="{{ route('checkout') }}" class="btn btn-primary">Direct afrekenen</a>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif()
    </div>
@endsection

