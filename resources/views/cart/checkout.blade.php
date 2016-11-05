@extends('layouts.master')

@section('titel', 'Winkelwagen shop')
@section('breadcrumbs', Breadcrumbs::render('cart'))

@section('content')

    <div class="row">

        <div class="col-lg-12">
            @include('layouts.checkout-step')
            <hr>
            <center>
                <h2>Betaalgegevens invullen</h2>
            </center>
        </div>

        <style>
            .bottom-align-text {
                position: absolute;
                bottom: 40px;
                left: 20px;
            }

            .panel-default > .panel-heading{
                background-color: #E8E8E8;
            }
        </style>

        {!! Form::model($user, array('route' => 'cart.checkout.check', 'method' => 'PATCH')) !!}

            <div class="col-lg-12 cart-body">
                <div class="row">

                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12 ">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Je persoonlijke gegevens
                                    @if(Auth::check())
                                        <div class="pull-right">
                                            <small><a class="afix-1" href="{{ route('user.edit') }}">Wijzig persoonsgegevens</a></small>
                                        </div>
                                    @endif
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-12 col-xs-12">
                                        <p>Waar kunnen we je bestelling naartoe sturen?</p>
                                        <div class="row">

                                            @if(!Auth::check())
                                                <div class="col-lg-12">
                                                    <hr>
                                                    <a class="btn btn-default" href="{{route('login')}}">inloggen</a>

                                                    <a class="btn btn-primary" style="background-color: #3B5998" href="/redirect">
                                                        <i class="fa fa-facebook-official" aria-hidden="true"></i>
                                                        Facebook Login
                                                    </a>

                                                    <span>of als gast.</span>
                                                    <hr>
                                                </div>

                                                <div class="form-group col-lg-12 {{$errors->has('email') ? 'has-error' : ''}}">
                                                    {!! Form::label('email', 'email *') !!}
                                                    {!! Form::text('email', NULL, ['class' => 'form-control']) !!}
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                </div>
                                            @endif

                                            <div class="form-group col-lg-6 {{$errors->has('voornaam') ? 'has-error' : ''}}">
                                                {!! Form::label('voornaam', 'voornaam *') !!}
                                                {!! Form::text('voornaam', NULL, ['class' => 'form-control', 'placeholder' => 'Kees']) !!}
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('voornaam') }}</strong>
                                                </span>
                                            </div>
                                            <div class="form-group col-lg-6 {{$errors->has('achternaam') ? 'has-error' : ''}}">
                                                {!! Form::label('achternaam', 'achternaam *') !!}
                                                {!! Form::text('achternaam', NULL, array('class' => 'form-control' , 'placeholder' => 'Willums')) !!}
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('voornaam') }}</strong>
                                                </span>
                                            </div>
                                            <div class="form-group col-lg-5 {{$errors->has('geboortedatum') ? 'has-error' : ''}}">
                                                {!! Form::label('geboortedatum', 'geboortedatum *') !!}
                                                {!! Form::date('geboortedatum', NULL, array('class' => 'form-control')) !!}
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('geboortedatum') }}</strong>
                                                </span>
                                            </div>
                                            <div class="form-group col-lg-9 {{$errors->has('adres') ? 'has-error' : ''}}">
                                                {!! Form::label('adres', 'adres *') !!}
                                                {!! Form::text('adres', NULL, array('class' => 'form-control', 'placeholder' => 'Ouverture ')) !!}
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('adres') }}</strong>
                                                </span>
                                            </div>
                                            <div class="form-group col-lg-3 {{$errors->has('huisnummer') ? 'has-error' : ''}}">
                                                {!! Form::label('huisnummer', 'huis nr. *') !!}
                                                {!! Form::text('huisnummer', NULL, array('class' => 'form-control', 'placeholder' => '228')) !!}
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('huisnummer') }}</strong>
                                                </span>
                                            </div>
                                            <div class="form-group col-lg-4 {{$errors->has('postcode') ? 'has-error' : ''}}">
                                                {!! Form::label('postcode', 'postcode *') !!}
                                                {!! Form::text('postcode', NULL, array('class' => 'form-control' , 'placeholder' => '5629PX ')) !!}
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('postcode') }}</strong>
                                                </span>
                                            </div>
                                            <div class="form-group col-lg-8 {{$errors->has('woonplaats') ? 'has-error' : ''}}">
                                                {!! Form::label('woonplaats', 'woonplaats *') !!}
                                                {!! Form::text('woonplaats', NULL, array('class' => 'form-control' , 'placeholder' => 'Eindhoven')) !!}
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('woonplaats') }}</strong>
                                                </span>
                                            </div>
                                            <div class="form-group col-lg-6 {{$errors->has('telMobiel') ? 'has-error' : ''}}">
                                                {!! Form::label('telMobiel', 'telMobiel') !!}
                                                {!! Form::text('telMobiel', NULL, array('class' => 'form-control' , 'placeholder' => '0612345678 ')) !!}
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('telMobiel') }}</strong>
                                                </span>
                                            </div>
                                            <div class="form-group col-lg-6 {{$errors->has('telThuis') ? 'has-error' : ''}}">
                                                {!! Form::label('telThuis', 'telThuis') !!}
                                                {!! Form::text('telThuis', NULL, array('class' => 'form-control', 'placeholder' => '04012345678 ')) !!}
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('telThuis') }}</strong>
                                                </span>
                                            </div>
                                        </div>

                                        <small>Alle velden met een (*) zijn verplicht. </small><br>

                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12 ">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Jouw bestelling <div class="pull-right"><small><a class="afix-1" href="{{ route('cart') }}">Terug naar je winkelwagentje</a></small></div>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table">
                                            <tr>
                                                <th>Foto</th>
                                                <th>Naam</th>
                                                <th>Aantal</th>
                                                <th>Prijs</th>
                                            </tr>
                                            @foreach(Cart::content() as $product)
                                                <tr>
                                                    <td><img style="height: 70px;" class="img-responsive" src="/images/product/{{$product->options[0]->product->productimages->first()->imagePath}}"></td>
                                                    <td>{{$product->options[0]->product->name}} - {{$product->options[0]->detail->value }}
                                                    </td>
                                                    <td>{{$product->qty}} x</td>
                                                    <td>€ {{number_format($product->price, 2)}}</td>
                                                </tr>
                                            @endforeach
                                        </table>

                                        <div class="panel-body">
                                            <div class=" pull-right">
                                                <b style="font-size: 18px;">Totaal bedrag: &euro; {{number_format(Cart::total(), 2)}} </b><br>
                                                <small class="text-muted">Incl. 21% btw</small>
                                                <br>
                                                <br>
                                                <div class="form-group {{$errors->has('payment_method') ? 'has-error' : ''}}">
                                                    {!! Form::label('payment_method', 'Betaalwijze') !!}
                                                    {{ Form::select('payment_method', collect($methods)->pluck('id', 'id'), '')}}
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('payment_method') }}</strong>
                                                    </span>
                                                    {{ Form::submit('Bestelling afronden', ['class' => 'btn btn-primary col-lg-12', 'style' => 'background: #3270B4;']) }}
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12 ">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Verzendwijze
                                    </div>
                                    <div class="panel-body">
                                        <span class="help-block form-group has-error col-lg-12">
                                            <strong style="color: #a94442">{{ $errors->first('levering') }}</strong>
                                        </span>
{{--                                        {{Form::select('levering', ['' => '', '' => 'maak uw keuzen', 'verzenden' => 'Verzending met PostNL'], '')}}--}}

                                        <div class="well col-lg-12">
                                            <div class="form-group">
                                                <input type="radio" name="levering" value="verzenden">
                                                <label>Verzenden met PostNL</label>
                                                <img width="100" class="pull-right" style="" src="http://cdn.prod.else4.nl/uploads/2016/02/PostNL-Logo.jpg">
                                            </div>
                                            <small>+ €{{Cart::total() >= env('FREE_SHIPPING_FORM') ? env('PACKAGE_GET_PRICE') : env('PACKAGE_POST_PRICE')  }}</small>
                                        </div>

                                        <div class="well col-lg-12">
                                            <div class="form-group">
                                                <input type="radio" name="levering" value="ophalen">
                                                <label> Ophalen in Eindhoven</label>
                                            </div><br><br>
                                            <small class="bottom-align-text">+ €0.00</small>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    {{ Form::close() }}

@endsection

