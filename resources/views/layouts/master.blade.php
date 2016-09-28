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

<header>
    <div class="usr-inf">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <p class="text-left">
                        Besteld voor 6 uur volgende dag in huis
                    </p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <p class="text-right">
                         @if(Auth::check())
                             <label class="pull-right">Welkom, {{Auth::user()->name}}.</label>
                         @else
                             <a class="pull-right" href="{{route('register')}}">Registeren</a>
                            <small class="pull-right">&nbsp; | &nbsp;</small>
                            <a class="pull-right" href="{{route('login')}}">Inloggen</a>
                         @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="head">

            <div class="bv-logo">
                <img src="http://esiggie.nl/wp-content/uploads/2014/12/Esiggie-logo.png" height="30px">
            </div>

            <div class="cart-button">
                <div class="">
                    <div class="dropdown">
                        <a href="{{ route('cart') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <a href="{{ route('cart') }}">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <span style="margin-top: 17px; margin-left: -4px; position: absolute;" class="badge">
                        {{ Session::has('cart') ? Session::get('cart')['qty'] : 0 }}
                                </span>
                            </a>
                        </a>
                    <div class="dropdown-menu dropdown-to-right">
                        <center>
                            <h3>Winkelwagen</h3>
                        </center>
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td>John</td>
                                        <td>Doe</td>
                                        <td>john@example.com</td>
                                    </tr>
                                    <tr>
                                        <td>Mary</td>
                                        <td>Moe</td>
                                        <td>mary@example.com</td>
                                    </tr>
                                    <tr>
                                        <td>July</td>
                                        <td>Dooley</td>
                                        <td>july@example.com</td>
                                    </tr>
                                </tbody>
                            </table>
                        <center>
                            <button style="margin: 0;" type="button" class="btn btn-default">Bekijken</button>
                            <button style="margin: 0;" type="button" class="btn btn-default">Afrekenen</button>
                        </center>
                        </div>
                    </div>
                </div>
            </div>
            <div class="search-button">
                <i class="fa fa-search" aria-hidden="true"></i>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="#">Homepage</a></li>
                    @foreach($main_categories->where('category_id', 0) as $category)
                        <li class="dropdown">
                            <a href="{{ route('category.show', [str_replace(' ','-', $category->title), $category->id])  }}">{{ $category->title }}<span class="caret"></span></a>
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
    </div>
</header>
    {{--@section('sidebar')--}}
       

    {{--@show--}}
<section class="bread-crumb">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="#">Homepage</a></li>
            <li><a href="#">Cartomizers</a></li>
            <li class="active">Product #1</li>
        </ol>
    </div>
</section>

@yield('content')




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