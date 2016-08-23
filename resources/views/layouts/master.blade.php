<html>
    <head>
        <title>Primera e-Sigarets - @yield('titel')</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="/css/all.css">
    </head>
    <body>
        @section('sidebar')
        <nav class="navbar navbar-default  navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">eSigarett.nl</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                            <li><a href="{{ URL::route('about') }}">Over ons</a></li>
                            <li><a href="{{ URL::route('contact') }}">Contact</a></li>
                        @if(Auth::check() == false)
                            <li><a href="{{ route('login') }}">Inloggen</a></li>
                            <li><a href="{{ route('register') }}">Registreren</a></li>
                            <li><a href="/cart">Winkelwagen ({{ count(Session::get('cart.items')) }})<span class="fa fa-shopping-cart"></span></a></li>
                        @else
                            <li><a href="/cart">Winkelwagen <span class="fa fa-shopping-cart"></span></a></li>
                            <li><a href="/logout"> {{ Auth::user()->voornaam}} uitloggen</a></li>
                        @endif
                    </ul>
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="{{ URL::route('homepage') }}">Home <span
                        class="sr-only">(current)</span></a></li>

                        @foreach($main_categories as $category)
                            <li class="dropdown">
                                <a href="/home" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                   aria-expanded="false">{{$category->name}} <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    @foreach($category->children as $child)
                                        <li><a href="{{route('category_detail', str_replace(' ', '-', $child->name))}}">{{ $child->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach

                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
                    @show
                    <div class="container" style="margin-top: 75px">
                        @yield('content')
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