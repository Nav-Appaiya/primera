<html>
    <head>
        <title>Primera e-Sigarets - @yield('titel')</title>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="/css/all.css">
    </head>
    <body>
        @section('sidebar')
  <header class="head">
    <div class="head-service">
        <div class="container-fluid">
          <div class="col-md-6 col-sm-6 col-xs-7">
            Op werkdagen voor 19:00 besteld, morgen in huis.
          </div>
          <div class="col-md-6 col-sm-6 col-xs-5 al-right">
        @if(Auth::check() == false)
            <a href="" data-toggle="modal" data-target="#myModal">Mijn account</a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="{{ route('register') }}">Nog geen klant?</a>
        @else
            Welkom terug {{ Auth::user()->name}}, <a href="/logout">Uitloggen</a>
        @endif
          </div>
        </div>
      </div>

      <div class="head-bar">
        <div class="container-fluid">
          <div class="col-md-4 col-sm-3 col-xs-4">
            <div class="logo">
              <a href="/"><img src="http://esiggie.nl/wp-content/uploads/2014/12/Esiggie-logo.png"></a>
            </div>
          </div>
          <div class="col-md-8 col-sm-9 col-xs-8">
            <ul>
              <li>
                <a href="{{ URL::route('homepage') }}">Homepage</a>
            </li>

                @foreach($main_categories->where('category_id', 0) as $category)
                    <li class="deeper parent dropdown">
                        <a href="{{ route('category.show', [str_replace(' ', '-', $category->title), $category->id])  }}">{{ $category->title }}<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            @foreach($category->children as $child)
                                <li class="">
                                    <a href="{{ route('product.index', [str_replace(' ', '-', $category->title), str_replace(' ', '-', $child->title), $child->id ]) }}">{{$child->title}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach

              <li style="margin-left: 30px">
                  <a href="{{ route('user.show') }}"><i style="font-size: 18px" class="fa fa-user" aria-hidden="true"></i></a>
              </li>
              <li>
<<<<<<< HEAD
                <a href="{{ URL::route('cart') }}"><i style="font-size: 18px" class="fa fa-shopping-bag" aria-hidden="true"></i>
                <span style="margin-top: -10px; margin-left: -8px" class="badge">0</span></a>
=======
                <a href="{{ URL::route('cart') }}"><i style="font-size: 20px" class="fa fa-shopping-bag" aria-hidden="true"></i>
                <span style="margin-top: -10px; margin-left: -8px" class="badge">{{ count(\Illuminate\Support\Facades\Session::get('cart.items')) }}</span></a>
>>>>>>> 1748bb2dbf4424a9f558aef4345f0582f46e6de3
              </li>
            </ul>
          </div>
        </div>
        </div>
      </header>


        @show
        <div class="container-fluid" style="margin-top: 25px; margin-bottom: 50px">
            @yield('content')
        </div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
        <div class="content">
          
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
                    </form>

        </div>
  </div>
</div>

        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="{{ URL::asset('assets/js/script.js') }}"></script>
        @yield('scripts')
    </body>
</html>