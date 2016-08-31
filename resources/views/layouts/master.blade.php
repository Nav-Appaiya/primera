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
            <a href="{{ route('login') }}">Mijn account</a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="{{ route('register') }}">Nog geen klant?</a>
        @else
            Welkom terug Mr. {{ Auth::user()->achternaam}}, <a href="/logout">Uitloggen</a>
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
                        <a href="{{ route('category.show', str_replace(' ', '-', $category->title))  }}">{{ $category->title }}<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            @foreach($category->children as $child)
                                <li class=""><a href="/{{ url('courses/'.str_replace(' ', '-', $child->name).'') }}">{{$child->title}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach

              <li style="margin-left: 30px">
                  <a href="{{ route('user.show') }}"><i style="font-size: 20px" class="fa fa-user" aria-hidden="true"></i></a>
              </li>
              <li>
                <a href="{{ URL::route('cart') }}"><i style="font-size: 20px" class="fa fa-shopping-bag" aria-hidden="true"></i>
                <span style="margin-top: -10px; margin-left: -8px" class="badge">0</span></a>
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

        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="{{ URL::asset('assets/js/script.js') }}"></script>
        @yield('scripts')
    </body>
</html>