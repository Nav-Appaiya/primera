@extends('layouts.master')

@section('titel', 'Primera shop')
@section('seotags', 'seotags')

@section('content')
    {!! Form::model($user, array('route' => 'cart.checkout.check', 'method' => 'PATCH')) !!}

        <div class="container wrapper">
            @include('layouts.checkout-step')

            <div class="row cart-head">
                <h3 class="text-center">Betaalgegevens invullen</h3>
            </div>

            <div class="col-lg-12 cart-body">
                <div class="row">

                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12 ">
                            <div class="panel panel-info">
                                <div class="panel-heading">Je persoonlijke gegevens invullen</div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <h5>Waar kunnen we je bestelling naartoe sturen?</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12">

                                        <h2>PERSOONLIJKE GEGEVENS</h2>

                                        <div class="row">

                                            @if(!Auth::check())
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
                                                {!! Form::text('voornaam', NULL, ['class' => 'form-control']) !!}
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('voornaam') }}</strong>
                                                </span>
                                            </div>
                                            <div class="form-group col-lg-6 {{$errors->has('achternaam') ? 'has-error' : ''}}">
                                                {!! Form::label('achternaam', 'achternaam *') !!}
                                                {!! Form::text('achternaam', NULL, array('class' => 'form-control')) !!}
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
                                                {!! Form::text('adres', NULL, array('class' => 'form-control')) !!}
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('adres') }}</strong>
                                                </span>
                                            </div>
                                            <div class="form-group col-lg-3 {{$errors->has('huisnummer') ? 'has-error' : ''}}">
                                                {!! Form::label('huisnummer', 'huis nr. *') !!}
                                                {!! Form::text('huisnummer', NULL, array('class' => 'form-control')) !!}
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('huisnummer') }}</strong>
                                                </span>
                                            </div>
                                            <div class="form-group col-lg-4 {{$errors->has('postcode') ? 'has-error' : ''}}">
                                                {!! Form::label('postcode', 'postcode *') !!}
                                                {!! Form::text('postcode', NULL, array('class' => 'form-control')) !!}
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('postcode') }}</strong>
                                                </span>
                                            </div>
                                            <div class="form-group col-lg-8 {{$errors->has('woonplaats') ? 'has-error' : ''}}">
                                                {!! Form::label('woonplaats', 'woonplaats *') !!}
                                                {!! Form::text('woonplaats', NULL, array('class' => 'form-control')) !!}
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('woonplaats') }}</strong>
                                                </span>
                                            </div>
                                            <div class="form-group col-lg-6 {{$errors->has('telMobiel') ? 'has-error' : ''}}">
                                                {!! Form::label('telMobiel', 'telMobiel') !!}
                                                {!! Form::text('telMobiel', NULL, array('class' => 'form-control')) !!}
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('telMobiel') }}</strong>
                                                </span>
                                            </div>
                                            <div class="form-group col-lg-6 {{$errors->has('telThuis') ? 'has-error' : ''}}">
                                                {!! Form::label('telThuis', 'telThuis') !!}
                                                {!! Form::text('telThuis', NULL, array('class' => 'form-control')) !!}
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('telThuis') }}</strong>
                                                </span>
                                            </div>
                                        </div>

                                        <small>Alle velden met een (*) zijn verplicht. </small><br>

                                        <a href="{{route('user.show')}}" class="btn">persoons gegevens wijzigen</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12 ">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        Jouw bestelling <div class="pull-right"><small><a class="afix-1" href="{{ url('cart') }}">Terug naar je winkelwagentje</a></small></div>
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
                                                <div class="form-group {{$errors->has('telThuis') ? 'has-error' : ''}}">
                                                    {!! Form::label('payment_method', 'betaalmethode') !!}
                                                    {{Form::select('payment_method', collect($methods)->pluck('id', 'id'), '')}}
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('telMobiel') }}</strong>
                                                    </span>
                                                </div>
                                                <h4>Totaal bedrag: <span>&euro;</span> {{Cart::total()}}</h4>

                                                {{ Form::submit('Bestelling afronden', ['class' => 'btn btn-primary']) }}

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12 ">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        Levering <div class="pull-right"><small><a class="afix-1" href="{{ route('cart') }}">Terug naar je winkelwagentje</a></small></div>
                                    </div>
                                    <div class="panel-body">
                                        <span class="help-block form-group has-error col-lg-12">
                                            <strong style="color: #a94442">{{ $errors->first('levering') }}</strong>
                                        </span>

                                        <div class="well col-lg-5">
                                            <div class="form-group">
                                                {{--<label for="a">Answer A</label>--}}
                                                <input type="radio" name="levering" value="verzenden">
                                            </div>
                                            Verzenden met
                                            PostNL<br>
                                            <small>+ €{{Cart::total() >= env('FREE_SHIPPING_FORM') ? env('PACKAGE_GET_PRICE') : env('PACKAGE_POST_PRICE')  }}</small>
                                            <img width="100" src="http://cdn.prod.else4.nl/uploads/2016/02/PostNL-Logo.jpg">
                                            <hr>
                                        </div>
                                        <div class="col-lg-2"></div>
                                        <div class="well col-lg-5">
                                            <input type="radio" name="levering" value="ophalen">
                                            Ophalen in Eindhoven <br>
                                            <small>+ €0.00</small>
                                            <hr/>

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

