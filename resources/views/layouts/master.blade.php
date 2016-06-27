

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
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">eSigarett.nl</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    @if(!Auth::user())
                        <li><a href="/auth/login">Inloggen</a></li>
                        <li><a href="/auth/register">Registreren</a></li>
                    @else
                        <li><a href="/order">Mijn bestellingen <span class="fa fa-briefcase"></span></a></li>
                        <li><a href="/cart">Winkelwagen <span class="fa fa-shopping-cart"></span></a></li>
                            <li><a href="/auth/logout">{{ Auth::user()->name }}, Uitloggen {{ Auth::user()->name}}</a></li>
                    @endif
                </ul>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{ URL::route('homepage') }}">Home <span class="sr-only">(current)</span></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categorieen <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            @foreach($categories as $cat)
                                <li><a href="{{ URL::route('category_detail', $cat->id ) }}">{{ $cat->title }}</a></li>
                            @endforeach

                        </ul>
                    </li>
                    @foreach( $pages as $page)
                        <li><a href="/pages/{{ strtolower($page->name) }}">{{ $page->name }}</a></li>
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
@yield('scripts')
</body>
</html>

