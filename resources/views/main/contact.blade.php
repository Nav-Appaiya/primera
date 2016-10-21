

@extends('layouts.master')

@section('titel', 'Primera shop')
@section('seotags', 'seotags')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container">

        <div class="row">

            <div class="col-lg-12">
                <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script>
                <div style='overflow:hidden;height:300px;width:100%;'>
                    <div id='gmap_canvas' style='height:300px;width:100%;'>

                    </div>
                    <div>
                        <small>
                            <a href="http://embedgooglemaps.com">google maps code</a>
                        </small>
                    </div>
                    <div>
                        <small>
                            <a href="https://www.zorgverzekeringvergelijken2017.nl/">Altijd up to date</a></small>
                    </div>
                    <style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
                </div>
                <script type='text/javascript'>function init_map(){
                        var myOptions = {
                            zoom:14,
                            center:new google.maps.LatLng(51.44164199999999,5.469722499999989),
                            mapTypeId: google.maps.MapTypeId.ROADMAP};
                        map = new google.maps.Map(document.getElementById('gmap_canvas'),
                                myOptions);
                        marker = new google.maps.Marker({
                            map: map,position: new google.maps.LatLng(51.44164199999999,5.469722499999989)
                        });
                        infowindow = new google.maps.InfoWindow({
                            content:'<strong>Esigareteindhoven</strong><br>eindhoven, Nederland<br>'
                        });
                        google.maps.event.addListener(marker, 'click', function(){
                            infowindow.open(map,marker);
                        });
                        infowindow.open(map,marker);
                    }google.maps.event.addDomListener(window, 'load', init_map);
                </script>
                <hr>
            </div>

            <div class="col-md-6">
                <h3>Contact met ons opnemen</h3><hr>

                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @if(Session::has('message'))
                    <div class="alert alert-info">
                        {{Session::get('message')}}
                    </div>
                @endif

                {!! Form::open(array('route' => 'contact_store', 'class' => 'form')) !!}

                <div class="form-group">
                    {!! Form::label('Naam') !!}
                    {!! Form::text('name', null,
                        array('required',
                              'class'=>'form-control',
                              'placeholder'=>'Volledige naam')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Email-adres') !!}
                    {!! Form::text('email', null,
                        array('required',
                              'class'=>'form-control',
                              'placeholder'=>'john@doe.nl')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Bericht') !!}
                    {!! Form::textarea('message', null,
                        array('required',
                              'class'=>'form-control',
                              'placeholder'=>'Je bericht, vraag of opmerking aan ons.')) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Formulier verzenden',
                      array('class'=>'btn btn-primary')) !!}
                </div>
                {!! Form::close() !!}

            </div>

            <div class="col-lg-6">
                <h3>Bedrijfsgegevens</h3><hr>
                <h3>Adres</h3><hr>



            </div>

        </div>
    </div>
@endsection

