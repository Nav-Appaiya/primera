<!DOCTYPE html>
<html>
    <head>
        <title>Primera e-Sigarets - @yield('titel')</title>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="/css/all.css">
        @stack('css')
    </head>
    <body>
            {{--@section('sidebar')--}}
        <header>
          <div class="container">
            <div id="header">
              <div class="cart">
                <a href="" data-toggle="modal" data-target="#myModal"><i class="fa fa-user" aria-hidden="true"></i></a>
              </div>
              <div class="usr">
                  <a href="{{ route('cart') }}">
                      <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                    <span style="margin-top: 18px; margin-left: -8px; position: absolute;" class="badge">
                        {{ Session::has('cart') ? Session::get('cart')['qty'] : 0 }}
                    </span>
                  </a>
              </div>
              <div class="srch">
                <a href="" data-toggle="modal" data-target="#myModal"><i class="fa fa-search" aria-hidden="true"></i></a>
              </div>
                <div class="logo">
                  <img src="http://esiggie.nl/wp-content/uploads/2014/12/Esiggie-logo.png">
                </div>
                <ul>
                  <li><a href="/">Home</a></li>
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
                </ul>
            </div>
          </div>
        </header>

    {{--@show--}}
        <div class="container"  style="margin-top: 25px; background: white; border: 1px solid #D5D4D4;">
            @yield('content')
        </div>

        <footer id="footer">
            <div class="container">
                <div class="col-lg-12">
                    a
                    <ul>
                        <li>aa</li>
                    </ul>
                </div>
            </div>
        </footer>



    {{--<div id="myModal" class="modal fade" role="dialog">--}}
      {{--<div class="modal-dialog">--}}

        {{--<!-- Modal content-->--}}
       {{--<div class="card">--}}
        {{--<center><h3>Account stuff</h3></center>--}}

       {{--</div>--}}

      {{--</div>--}}
    {{--</div>--}}

        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        @stack('script')

        <script src="{{ URL::asset('assets/js/script.js') }}"></script>

    </body>
</html>