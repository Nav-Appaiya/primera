@extends('layouts.master')

@section('titel', 'Primera shop')
@section('seotags', 'seotags')

@section('content')
    {!! Form::model($user, array('route' => 'cart.checkout.check', 'method' => 'PATCH', 'files' => true )) !!}

        <div class="container wrapper">
            @include('layouts.checkout-step')

            <div class="row cart-head">
                <h3 class="text-center">Betaalgegevens invullen</h3>
                <p>
                    <br>
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <p>Controleer het formulier of je alle velden hebt ingevuld: </p>
                            <br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </p>
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

                                        @include('errors.message')

                                        <h2>PERSOONLIJKE GEGEVENS</h2>

                                        <div class="row">
                                            <div class="form-group col-lg-3">
                                                {!! Form::label('voorletters', 'voorletters *') !!}
                                                {!! Form::text('voorletters', NULL, array('class' => 'form-control')) !!}
                                            </div>

                                            <div class="form-group col-lg-6">
                                                {!! Form::label('achternaam', 'achternaam *') !!}
                                                {!! Form::text('achternaam', NULL, array('class' => 'form-control')) !!}
                                            </div>

                                            <div class="form-group col-lg-6">
                                                {!! Form::label('voornaam', 'voornaam *') !!}
                                                {!! Form::text('voornaam', NULL, array('class' => 'form-control')) !!}
                                            </div>
                                            <div class="form-group col-lg-5">
                                                {!! Form::label('geboortedatum', 'geboortedatum *') !!}
                                                {!! Form::date('geboortedatum', NULL, array('class' => 'form-control')) !!}
                                            </div>
                                            <div class="form-group col-lg-9">
                                                {!! Form::label('adres', 'adres *') !!}
                                                {!! Form::text('adres', NULL, array('class' => 'form-control')) !!}
                                            </div>
                                            <div class="form-group col-lg-3">
                                                {!! Form::label('huisnummer', 'huis nr. *') !!}
                                                {!! Form::text('huisnummer', NULL, array('class' => 'form-control')) !!}
                                            </div>
                                            <div class="form-group col-lg-4">
                                                {!! Form::label('postcode', 'postcode *') !!}
                                                {!! Form::text('postcode', NULL, array('class' => 'form-control')) !!}
                                            </div>
                                            <div class="form-group col-lg-8">
                                                {!! Form::label('woonplaats', 'woonplaats *') !!}
                                                {!! Form::text('woonplaats', NULL, array('class' => 'form-control')) !!}
                                            </div>
                                            <div class="form-group col-lg-6">
                                                {!! Form::label('telMobiel', 'telMobiel') !!}
                                                {!! Form::text('telMobiel', NULL, array('class' => 'form-control')) !!}
                                            </div>
                                            <div class="form-group col-lg-6">
                                                {!! Form::label('telThuis', 'telThuis') !!}
                                                {!! Form::text('telThuis', NULL, array('class' => 'form-control')) !!}
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
                                        {{--{{dd(session('cart.items'))}}--}}
                                        @if(session()->has('cart'))
                                            @foreach(session('cart.items') as $i)
                                                <div class="form-group">
                                                    <div class="col-sm-3 col-xs-3">
                                                        @if( null !== $i['item']->product()->first()->productimages->first() )
                                                            <img src="/images/product/{{ $i['item']->product()->first()->productimages()->first()->imagePath }}"
                                                                 class="img-responsive"
                                                                 width="100px" alt="{{isset($i['item']->product()->first()->productimages()->first()->rel) ? $i['item']->product()->first()->productimages()->first()->rel : "Image-rel-missing" }}">

                                                        @else
                                                            <img src="/uploads/img/default.jpg" alt="default-img" width="100px">
                                                        @endif

                                                    </div>
                                                    <div class="col-sm-6 col-xs-6">
                                                        <div class="col-xs-12">{{ $i['item']->product()->first()->name }}</div>
                                                        <div class="col-xs-12"><small>Aantal:<span>{{ $i['qty'] }}</span></small></div>
                                                    </div>
                                                    <div class="col-sm-3 col-xs-3 text-right">
                                                        <h6><span>&euro;</span>{{ $i['item']->product()->first()->price }}</h6>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif

                                        <div class="panel-body">
                                            <div class="text-center pull-right">
                                                <h4>Totaal bedrag: <span>&euro;</span> {{ session('cart.price') }}</h4>


                                                {{ Form::submit('Bestelling afronden', ['class' => 'btn btn-primary']) }}

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12 ">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        Levering <div class="pull-right"><small><a class="afix-1" href="{{ url('cart') }}">Terug naar je winkelwagentje</a></small></div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="well col-lg-6">
                                            <input type="radio" name="levering" value="verzenden" onclick="verzendkosten(this.value)">
                                            Verzenden met
                                            PostNL<br>
                                            <small>+ €{{env('PACKAGE_POST_PRICE')}}</small>
                                            <img width="100" src="http://cdn.prod.else4.nl/uploads/2016/02/PostNL-Logo.jpg">
                                            <hr>
                                        </div>

                                        <div class="well col-lg-6">
                                            <input type="radio" name="levering" value="ophalen" onclick="verzendkosten(this.value)">
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

