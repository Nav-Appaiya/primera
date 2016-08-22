<html>
    <head>
        <title>Primera e-Sigarets - @yield('titel')</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="/css/all.css">
    </head>
    <body>
        
<div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 align-left">
                        Op werkdagen voor 22:00 uur besteld, morgen in huis.
                    </div>
                    <div class="col-md-6 col-sm-6 align-right">
                        <a class="account-inf" data-toggle="modal" data-target="#myModal" href="">Mijn Account</a>
                        <a class="account-inf" href="">Nog geen klant?</a>
                    </div>
                </div>
            </div>
        </div>
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-2">
                        <i style="font-size: 25px; margin-top: 17.5px" class="fa fa-search" aria-hidden="true"></i>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-8 align-center">
        <img src="http://esigaret24.nl/wp-content/uploads/2015/11/damp-e-sigaret-webshop.jpg">
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-2">
  @if(Auth::check() == false)
                        <div style="float: right;">
                            <i style="font-size: 25px; margin-top: 17.5px" class="fa fa-shopping-bag" aria-hidden="true"></i><span style="margin-top: -20px; margin-left: -8px;" class="badge">{{ count(Session::get('cart.items')) }}</span>
                        </div>
                        @else
                        <div style="float: right;">
                            <i style="font-size: 25px; margin-top: 17.5px" class="fa fa-shopping-bag" aria-hidden="true"></i><span style="margin-top: -20px; margin-left: -8px;" class="badge">{{ count(Session::get('cart.items')) }}</span>
                        </div>
                        
                        @endif
                    </div>
                </div>
            </div>
        </header>  
        <div class="navigation">
            <div class="container">
                <ul>
                    <li>Homepagina</li>
                    <li>categorieën</li>
                    <li>Over ons</li>
                    <li>Contact</li>
                </ul>
            </div>
        </div>    

                    @show
                    <div class="container" style="margin-top: 40px">
                        @yield('content')
                    </div>
<div class="container">
    
</div>

<div id="myModal" class="modal fade" role="dialog">
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