<html>
    <head>
        <title>Primera e-Sigarets - @yield('titel')</title>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="/css/all.css">
    </head>
    <body>
        @section('sidebar')

<div class="top">
    <div class="container-fluid">
      <div class="col-md-6 col-sm-6 col-xs-7">
        Op werkdagen voor 19:00 besteld, morgen in huis.
      </div>
      <div class="col-md-6 col-sm-6 col-xs-5 al-right">
    @if(Auth::check() == false)
        <a href="{{ route('login') }}">Mijn account</a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="{{ route('register') }}">Nog geen klant?</a>
    @else
        <a href="/logout"> {{ Auth::user()->voornaam}} Uitloggen</a>
    @endif
      </div>
    </div>
  </div>
  <header class="head">
    <div class="container-fluid">
      <div class="col-md-4 col-sm-3 col-xs-4">
        <div class="logo">
          <img src="http://esiggie.nl/wp-content/uploads/2014/12/Esiggie-logo.png">
        </div>
      </div>
      <div class="col-md-8 col-sm-9 col-xs-8">
        <ul>
          <li>
            <a href="{{ URL::route('homepage') }}">Homepage</a>
        </li>
          <li><a href="">categorieën</a></li>
          <li style="margin-left: 30px">
              <a href="{{ route('login') }}"><i style="font-size: 20px" class="fa fa-user" aria-hidden="true"></i></a>
          </li>
          <li>
            <a href="{{ URL::route('cart') }}"><i style="font-size: 20px" class="fa fa-shopping-bag" aria-hidden="true"></i>
            <span style="margin-top: -10px; margin-left: -8px" class="badge">0</span></a>
          </li>
        </ul>
      </div>
    </div>
  </header>


                    @show
                    <div class="container-fluid" style="margin-top: 25px; margin-bottom: 50px">
                        @yield('content')
                    </div>
                    
                    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
                    <script src="{{ URL::asset('assets/js/script.js') }}"></script>
                    @yield('scripts')
                </body>
            </html>