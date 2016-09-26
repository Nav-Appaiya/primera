<!DOCTYPE html>
<html>
    <head>
        <title>Primera e-Sigarets - @yield('titel')</title>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="/css/all.css">

        {{--<style>--}}
            {{--ul.dropdown-cart{--}}
                {{--min-width:250px;--}}
            {{--}--}}
            {{--ul.dropdown-cart li .item{--}}
                {{--display:block;--}}
                {{--padding:3px 10px;--}}
                {{--margin: 3px 0;--}}
            {{--}--}}
            {{--ul.dropdown-cart li .item:hover{--}}
                {{--background-color:#f3f3f3;--}}
            {{--}--}}
            {{--ul.dropdown-cart li .item:after{--}}
                {{--visibility: hidden;--}}
                {{--display: block;--}}
                {{--font-size: 0;--}}
                {{--content: " ";--}}
                {{--clear: both;--}}
                {{--height: 0;--}}
            {{--}--}}

            {{--ul.dropdown-cart li .item-left{--}}
                {{--float:left;--}}
            {{--}--}}
            {{--ul.dropdown-cart li .item-left img,--}}
            {{--ul.dropdown-cart li .item-left span.item-info{--}}
                {{--float:left;--}}
            {{--}--}}
            {{--ul.dropdown-cart li .item-left span.item-info{--}}
                {{--margin-left:10px;--}}
            {{--}--}}
            {{--ul.dropdown-cart li .item-left span.item-info span{--}}
                {{--display:block;--}}
            {{--}--}}
            {{--ul.dropdown-cart li .item-right{--}}
                {{--float:right;--}}
            {{--}--}}
            {{--ul.dropdown-cart li .item-right button{--}}
                {{--margin-top:14px;--}}
            {{--}--}}
        {{--</style>--}}
        {{--<ul class="nav navbar-nav navbar-right">--}}
            {{--<li class="dropdown">--}}
                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="glyphicon glyphicon-shopping-cart"></span> 7 - Items<span class="caret"></span></a>--}}
                {{--<ul class="dropdown-menu dropdown-cart" role="menu">--}}
                    {{--<li>--}}
                  {{--<span class="item">--}}
                    {{--<span class="item-left">--}}
                        {{--<img src="http://lorempixel.com/50/50/" alt="" />--}}
                        {{--<span class="item-info">--}}
                            {{--<span>Item name</span>--}}
                            {{--<span>23$</span>--}}
                        {{--</span>--}}
                    {{--</span>--}}
                    {{--<span class="item-right">--}}
                        {{--<button class="btn btn-xs btn-danger pull-right">x</button>--}}
                    {{--</span>--}}
                {{--</span>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                  {{--<span class="item">--}}
                    {{--<span class="item-left">--}}
                        {{--<img src="http://lorempixel.com/50/50/" alt="" />--}}
                        {{--<span class="item-info">--}}
                            {{--<span>Item name</span>--}}
                            {{--<span>23$</span>--}}
                        {{--</span>--}}
                    {{--</span>--}}
                    {{--<span class="item-right">--}}
                        {{--<button class="btn btn-xs btn-danger pull-right">x</button>--}}
                    {{--</span>--}}
                {{--</span>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                  {{--<span class="item">--}}
                    {{--<span class="item-left">--}}
                        {{--<img src="http://lorempixel.com/50/50/" alt="" />--}}
                        {{--<span class="item-info">--}}
                            {{--<span>Item name</span>--}}
                            {{--<span>23$</span>--}}
                        {{--</span>--}}
                    {{--</span>--}}
                    {{--<span class="item-right">--}}
                        {{--<button class="btn btn-xs btn-danger pull-right">x</button>--}}
                    {{--</span>--}}
                {{--</span>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                  {{--<span class="item">--}}
                    {{--<span class="item-left">--}}
                        {{--<img src="http://lorempixel.com/50/50/" alt="" />--}}
                        {{--<span class="item-info">--}}
                            {{--<span>Item name</span>--}}
                            {{--<span>23$</span>--}}
                        {{--</span>--}}
                    {{--</span>--}}
                    {{--<span class="item-right">--}}
                        {{--<button class="btn btn-xs btn-danger pull-right">x</button>--}}
                    {{--</span>--}}
                {{--</span>--}}
                    {{--</li>--}}
                    {{--<li class="divider"></li>--}}
                    {{--<li><a class="text-center" href="">View Cart</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
        {{--</ul>--}}

        @stack('css')
    </head>
    <body>

            {{--@section('sidebar')--}}
        <header>
          <div class="container">
             <!-- <div class="row">
                  {{--{{Auth::check()}}--}}
                  @if(!Auth::check())
                    <a href="{{route('login')}}">inloggen</a>
                    <a href="{{route('register')}}">registeren</a>
                  @else
                    <label>Welkom {{Auth::user()->name}}</label>
                  @endif
              </div>-->
            <div id="header">
              <div class="cart">
                <a href="" data-toggle="modal" data-target="#myModal"><i class="fa fa-user" aria-hidden="true"></i></a>
              </div>
              <div class="usr">
                  <a href="{{ route('cart') }}">
                      <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                    <span style="margin-top: 20px; margin-left: -8px; position: absolute;" class="badge">
                        {{ Session::has('cart') ? Session::get('cart')['qty'] : 0 }}
                    </span>
                  </a>
              </div>
                <div>

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
        <div class="container padding">
          <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ route('homepage') }}">Homepage</a></li>
                <li><a href="{{ route('homepage') }}">Homepage</a></li>
            </ol>
          </div>
        </div>
      <section class="content">
        <div class="container">
            @yield('content')
        </div>
      </section>

        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <center>
                        <ul class="list-group">
                            <li><a href="">Algemene voorwaarden</a></li>
                            <li><a href="">Cookies</a></li>
                            <li><a href="">Privacy policy</a></li>
                            <li><a href="">Contact</a></li>
                            <li><a href="">Retourneren</a></li>
                            <li><a href="">Garantie</a></li>
                        </ul>
                        </center>
                    </div>
                </div>
            </div>
        </footer>

    <!-- Modals -->

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