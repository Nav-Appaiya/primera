

@extends('layouts.master')

@section('titel', 'Primera shop')
@section('seotags', 'seotags')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container">

        <div class="row">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner">

                    <div class="item active" style="max-height: 400px; height: 100%;">
                        <img src="{{ asset('/uploads/img/esigaret5.jpg') }}">
                        <div class="carousel-caption">
                            <h2><span style="background-color: #2980b9;">Welkom bij esigarett.nl!</span></h2>
                            <p><a href="/producten" class="btn btn-success">Bekijk onze producten</a></p>
                        </div>
                    </div><!-- End Item -->

                    <div class="item" style="max-height: 400px; height: 100%;">
                        <img src="{{ asset('/uploads/img/esigaret6.jpg') }}">
                        <div class="carousel-caption">
                            <h2><span style="background-color: #2980b9;">Onze Producten</span></h2>
                            <p>Een elektronische sigaret is een alternatief voor traditioneel roken. Er zijn e-sigaretten* met en zonder nicotine. De e-sigaret bevat een vloeibare vulling die wordt verdampt door middel van opwarming. De vloeistof wordt opgewarmd door een verwarmingselement met behulp van een batterij.

                            </p>
                        </div>
                    </div><!-- End Item -->

                    <div class="item" style="max-height: 400px; height: 100%;">
                        <img src="{{ asset('/uploads/img/esigaret7.jpg') }}">
                        <div class="carousel-caption">
                            <h2><span style="background-color: #2980b9;">Onze bezorgdienst</span></h2>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. <a href="http://sevenx.de/demo/bootstrap-carousel/" target="_blank" class="label label-danger">Bootstrap 3 - Carousel Collection</a></p>
                        </div>
                    </div><!-- End Item -->

                    <div class="item" style="max-height: 400px; height: 100%;">
                        <img src="{{ asset('/uploads/img/esigaret5.jpg') }}">
                        <div class="carousel-caption">
                            <h2><span style="background-color: #2980b9;">Contact</span></h2>

                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                        </div>
                    </div><!-- End Item -->

                </div><!-- End Carousel Inner -->


                <ul class="nav nav-pills nav-justified">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"><a href="#">eSigarett.nl<small>Lees meer over ons!</small></a></li>
                    <li data-target="#myCarousel" data-slide-to="1"><a href="#">Producten<small>Ruim assortiment van producten!</small></a></li>
                    <li data-target="#myCarousel" data-slide-to="2"><a href="#">Bezorgen<small>Binnen 3 dagen thuisbezorgd!</small></a></li>
                    <li data-target="#myCarousel" data-slide-to="3"><a href="#">Contact<small>Natuurlijk kunt u ons ook bezoeken!</small></a></li>
                </ul>


            </div><!-- End Carousel -->

            <style>
                body { padding-top: 20px; }
                #myCarousel .nav a small {
                    display:block;
                }
                #myCarousel .nav {
                    background:#eee;
                }
                #myCarousel .nav a {
                    border-radius:0px;
                }
            </style>
        </div>

        <br>
        <br>

        <div class="row">
            <div class="col-md-12">
            @foreach ($products as $product)
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail" >
                            <img src="{{$product->imageurl}}" class="img-responsive">
                            <div class="caption">
                                <div class="row">
                                    <div class="col-md-6 col-xs-6">
                                        <h4>{{$product->name}}</h4>
                                    </div>
                                    <div class="col-md-6 col-xs-6 price">
                                        <h3 class="pull-right"><label>&euro;{{number_format($product->price, 2, '.', ',')}}</label></h3>
                                    </div>
                                </div>
                                <p>{{$product->description}}</p>
                                <div class="row center-block">
                                    <div class="btn-group cart">
                                        <a href="{{ URL::route('product_detail', $product->id) }}" class="btn btn-info btn-product">
                                            Meer weten <span class="fa fa-question-circle"></span>
                                        </a>
                                    </div>
                                    <div class="btn-group wishlist">
                                        <a href="{{ URL::route('product_add', $product) }}" class="btn btn-success btn-product cart-add" onclick="addCart(event, {{ $product }});">
                                            In winkelwagen<span class="fa fa-shopping-cart"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready( function() {
            $('#myCarousel').carousel({
                interval:   4000
            });

            var clickEvent = false;
            $('#myCarousel').on('click', '.nav a', function() {
                clickEvent = true;
                $('.nav li').removeClass('active');
                $(this).parent().addClass('active');
            }).on('slid.bs.carousel', function(e) {
                if(!clickEvent) {
                    var count = $('.nav').children().length -1;
                    var current = $('.nav li.active');
                    current.removeClass('active').next().addClass('active');
                    var id = parseInt(current.data('slide-to'));
                    if(count == id) {
                        $('.nav li').first().addClass('active');
                    }
                }
                clickEvent = false;
            });
        });
    </script>
@endsection