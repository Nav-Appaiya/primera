<html>
<head>
    <title>Primera e-Sigarets - @yield('titel')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/all.css">
    <meta name="description" content="@yield('seotags')">
</head>
<body>

<!-- Start navbar container -->

<br><div class="container">
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">eSigarett.nl</a>
            </div>

            <div class="collapse navbar-collapse js-navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown mega-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Startersets <span class="caret"></span></a>
                        <ul class="dropdown-menu mega-dropdown-menu">
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Aanbiedingen</li>
                                    <div id="menCollection" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="item active">
                                                <a href="#"><img src="{{ asset('assets/img/esigarets.jpg') }}" class="img-responsive" alt="product 1"></a>
                                                <h4><small>StarterSet Zwart</small></h4>
                                                <button class="btn btn-primary" type="button">49,99 €</button> <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> In winkelmand</button>
                                            </div><!-- End Item -->
                                            <div class="item">
                                                <a href="#"><img src="{{ asset('assets/img/esigarets.jpg') }}" class="img-responsive" alt="product 2"></a>
                                                <h4><small>StarterSet Zilver</small></h4>
                                                <button class="btn btn-primary" type="button">9,99 €</button> <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Aan winkelwagen toevoegen</button>
                                            </div><!-- End Item -->
                                            <div class="item">
                                                <a href="#"><img src="{{ asset('assets/img/esigarets.jpg') }}" class="img-responsive" alt="product 3"></a>
                                                <h4><small>StarterSet Grijs</small></h4>
                                                <button class="btn btn-primary" type="button">49,99 €</button> <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> In winkelmand</button>
                                            </div><!-- End Item -->
                                        </div><!-- End Carousel Inner -->
                                        <!-- Controls -->
                                        <a class="left carousel-control" href="#menCollection" role="button" data-slide="prev">
                                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="right carousel-control" href="#menCollection" role="button" data-slide="next">
                                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div><!-- /.carousel -->
                                    <li class="divider"></li>
                                    <li><a href="#">Alle collecties bekijken<span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
                                </ul>
                            </li>
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Vapers</li>
                                    <li><a href="#">Auto Carousel</a></li>
                                    <li><a href="#">Carousel Control</a></li>
                                    <li><a href="#">Left & Right Navigation</a></li>
                                    <li><a href="#">Four Columns Grid</a></li>
                                    <li class="divider"></li>
                                    <li class="dropdown-header">Fonts</li>
                                    <li><a href="#">Glyphicon</a></li>
                                    <li><a href="#">Google Fonts</a></li>
                                </ul>
                            </li>
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">E-Liquid</li>
                                    <li><a href="#">Navbar Inverse</a></li>
                                    <li><a href="#">Pull Right Elements</a></li>
                                    <li><a href="#">Coloured Headers</a></li>
                                    <li><a href="#">Primary Buttons & Default</a></li>
                                </ul>
                            </li>
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Smokeys</li>
                                    <li><a href="#">Easy to Customize</a></li>
                                    <li><a href="#">Calls to action</a></li>
                                    <li><a href="#">Custom Fonts</a></li>
                                    <li><a href="#">Slide down on Hover</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">My account <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </li>
                    <li><a href="#">My cart (0) items</a></li>
                </ul>
            </div><!-- /.nav-collapse -->
        </nav>
    </div>


<!-- End navbar container -->

<!-- Start content container -->
<div class="container" style="margin-top: 75px">
    @yield('content')
</div>
<!-- End content container -->

<!-- Start footer -->
<footer class="footer">
    <div class="container">
        <span class="text-muted pull-left">
            Esigarett.nl - {{ date('Y') }}
        </span>
        <p class="text-muted pull-right">
            <img src="{{ asset('/assets/img/NIX18-cmyk-payoff-fc.png') }}" alt="nix18" width="75em">
        </p>
    </div>
</footer>
<!-- End footer -->

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="{{ URL::asset('assets/js/script.js') }}"></script>
@yield('scripts')
</body>
</html>

