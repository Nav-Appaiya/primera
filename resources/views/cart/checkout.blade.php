@extends('layouts.master')

@section('titel', 'Primera shop')
@section('seotags', 'seotags')

@section('content')
    
    <div class="container wrapper">
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
    
        <div class="row cart-body">
            
            <form class="form-horizontal" method="POST" action="{{ URL::route('checkout') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Jouw bestelling <div class="pull-right"><small><a class="afix-1" href="{{ url('cart') }}">Terug naar je winkelwagentje</a></small></div>
                        </div>
                        <div class="panel-body">
{{--                            {{dd(session('cart.items'))}}--}}
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
                                        {{----}}
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

                            <div class="panel-body">
                                <div class="text-center pull-right">
                                    <h4>Totaal bedrag: <span>&euro;</span> {{ session('cart.price') }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">Je persoonlijke gegevens invullen</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <h5>Waar kunnen we je bestelling naartoe sturen?</h5>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-xs-12">
                                    <strong>Voornaam: <span style="color: red;"> * </span></strong>
                                    <input type="text" name="first_name" class="form-control" value="{{ $user->voornaam }}
                                            " required="required"/>
                                </div>
                                <div class="span1"></div>
                                <div class="col-md-6 col-xs-12">
                                    <strong>Achternaam: <span style="color: red;"> * </span></strong>
                                    <input type="text" name="last_name" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8">
                                    <strong>Straat: <span style="color: red;"> * </span></strong>
                                    <input type="text" name="street" class="form-control" value="{{ $user->adres or 'Straat' }}" />
                                </div>
                                <div class="col-md-4">
                                    <strong>Huisnummer: <span style="color: red;"> * </span></strong>
                                    <input type="text" name="street_number" class="form-control" value="{{ $user->adres or 'Straat' }}" />
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-xs-12">
                                    <strong>Postcode: <span style="color: red;"> * </span></strong>
                                    <input type="text" name="postcode" class="form-control" value="{{ $user->postcode or '1234 AB' }}" />
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <strong>Plaats: <span style="color: red;"> * </span></strong>
                                    <input type="text" name="plaats" class="form-control" value="{{ $user->woonplaats or 'Amsterdam' }}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Geboortedatum: <span style="color: red;"> * </span></strong></div>
                                <div class="col-md-12">
                                    <input type="date" name="birthdate" value="{{ $user->geboortedatum or '1992-01-24' }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Telefoonnummer (vast): </strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="phone_home" class="form-control" value="{{ $user->telThuis or '0101231232' }}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Telefoonnummer (mobiel): <span style="color: red;"> * </span></strong></div>
                                <div class="col-md-12"><input type="text" name="phone_mobile" class="form-control" value="{{ $user->telMobiel or '0101231232' }}" /></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Emailadres: <span style="color: red;"> * </span></strong></div>
                                <div class="col-md-12"><input type="text" name="email" class="form-control" value="{{ $user->email }}" /></div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="submit" value="Afrekenen met iDeal" class="btn 
                                    btn-success 
                                    pull-right">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
        <div class="row cart-footer">

        </div>
    </div>
@endsection

