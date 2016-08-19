<html>
    <head>
        <title>Primera e-Sigarets - @yield('titel')</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link href='http://fonts.googleapis.com/css?family=Lato:100,400,700,900' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="/css/all.css">
    </head>
    <body>
    <div class="top">
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="text-align: left">Op werkdagen besteld voor 22:00, morgen in huis. Gratis retourneren</div>
                <div class="col-md-6" style="text-align: right">Inloggen &nbsp; &nbsp; &nbsp; &nbsp; Nieuwe klant</div>
            </div>
        </div>
    </div>
    <header>
        <div class="container">
        <div class="row">
            <div class="header-logo col-xs-12 col-md-4">
            <input type="text" placeholder="Zoeken" style="float: left"><i  style="float: left; margin-top: 17px; margin-left: -25px;" class="glyphicon glyphicon-search"></i>
            </div>
            <div class="col-xs-12 col-md-4" style="text-align: center">
                                <img src="http://esiggie.nl/wp-content/uploads/2014/12/Esiggie-logo.png" height="50px">
            </div>
            <div class="col-md-4">
                        @if(Auth::check() == false)
            <div class="shopping-cart blue">
                Winkelwagen
                    <span class="number">{{ count(Session::get('cart.items')) }}</span>
                        @endif
            </div>
            </div>
        </div>
        </div>
    </header>
        <div class="navigation"></div>

                    @show
                    <div class="container">
                    </div>
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
                    <style>
                    html {
                    position: relative;
                    min-height: 100%;
                    }
                    body {
                    margin-bottom: 60px;
                    }
                    .footer {
                    position: absolute;
                    bottom: 0;
                    width: 100%;
                    height: 60px;
                    background-color: #f5f5f5;
                    }
                    footer .text-muted {
                    margin: 20px 0;
                    }
                    </style>
                    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
                    <script src="{{ URL::asset('assets/js/script.js') }}"></script>
                    @yield('scripts')
                </body>
            </html>