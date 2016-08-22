<html>
    <head>
        <title>Primera e-Sigarets - @yield('titel')</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="/css/all.css">
    </head>
    <body>
        <header class="head">
            <div class="top-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 al-left">
                            Op werkdagen voor 22:00 besteld, morgen in huis.
                        </div>
                        <div class="col-md-6 col-sm-6 al-right">
                            <a class="r-20" data-toggle="modal" data-target="#account">Mijn account</a>
                            <a class="r-20" href="">Geen account ?</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="middle-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-2">
                            <div class="search">
                                <i class="fa fa-search font-25"></i>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-8 al-center">
                            <img src="http://esigaret24.nl/wp-content/uploads/2015/11/damp-e-sigaret-webshop.jpg">
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-2 al-right">
                            <div class="shopping-cart">
                            @if(Auth::check() == false)
                                <i class="fa fa-shopping-bag font-25"></i>
                                <span style="margin-top: -20px; margin-left: -8px;" class="badge">{{ count(Session::get('cart.items')) }}</span>
                            @else
                                <i class="fa fa-shopping-bag font-25"></i>
                                <span style="margin-top: -20px; margin-left: -8px;" class="badge">{{ count(Session::get('cart.items')) }}</span>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navigation-bar">
                <div class="container">
                    <ul class="navigation-drop">
                        <li><a href="{{ URL::route('about') }}">Over ons</a></li>
                        <li><a href="{{ URL::route('about') }}">Over ons</a></li>
                        <li><a href="{{ URL::route('about') }}">Over ons</a></li>
                    </ul>
                </div>
            </div>
        </header>

                    @show
                    <div class="container" style="margin-top: 40px">
                        @yield('content')
                    </div>


<div id="account" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
      <h2 class="align-center" style="margin-top: 20px">Mijn account</h2>
<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>
                                <a class="btn btn-primary" href="/redirect">

                                        <i class="fa fa-btn fa-sign-in"></i>
                                    Facebook Login

                                </a>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>
                    </form>
      </div>
    </div>

  </div>
</div>

                    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
                    <script src="{{ URL::asset('assets/js/script.js') }}"></script>
                    @yield('scripts')
                </body>
            </html>