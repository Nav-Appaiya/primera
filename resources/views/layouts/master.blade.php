<!DOCTYPE html>
<html>
    <head>
        <title>Primera e-Sigarets - @yield('titel')</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="refresh" content="300">
        <meta http-equiv="language" content="NL">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="copyright" content="Mediaverse">
        <meta name="googlebot" content="noodp">
        <meta name="language" content="nederland">
        <meta name="application-name" content="Primera Shop" />
        <meta name="robots" content="noodp">
        <meta name="revisit-after" content="1 days">

        <meta name="description" content="@yield('description')">

        @stack('meta')

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="/css/all.css">

        <style type="text/css">
            .slick-slider {
                margin-bottom: 15px;
                margin-top: 15px;
            }
        </style>
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
    <div class="user-menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <p class="text-left">
                        Op werkdagen besteld voor 18:00 uur, de volgende dag in huis!
                    </p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <p class="text-right">
                        @if(Auth::check())
                            <label class="pull-right">Welkom <a href="{{ route('user.show') }}">{{Auth::user()->name}}, </a><a href="{{route('logout')}}">Uitloggen</a></label>
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
    
    <div class="hidde">
        <div class="head">
            <div class="container">
                <div class="row">
                  <div class="col-lg-8 col-md-8 col-sm-10 col-xs-10">
                        <a href="{{route('homepage')}}"><img src="http://antoinecroes.nl/E-sigaret-logo.png" height="38px"></a>
                    </div>
                    <div class="col-lg-4 col-md-4 hidden-xs hidden-sm">

                        <div class="input-group">
                            <input  style="width: 100%; margin-top: 28px" type="text" class="form-control" placeholder="Zoekopdracht">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div style="padding-left: 0px; padding-right: 0px;" class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="{{route('homepage')}}"><i class="fa fa-home" aria-hidden="true"></i></a></li>

                            @foreach($main_categories->where('category_id', 0) as $category)
                                @if(count($category->children) != 0)
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
                                @endif
                            @endforeach
                        </ul>
                        <div class="cart-button pull-right">
                            <div class="">
                                <div class="dropdown" style="height: 44px; line-height: 44px">
                                    <a href="{{ route('cart') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <a href="{{ route('cart') }}">
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                            <span style="margin-top: -30px; margin-left: -65px; position: absolute;" class="badge">
                                                € {{number_format(Cart::total(), 2)}}
                                            </span>
                                        </a>
                                    </a>
                                <div class="dropdown-menu dropdown-to-right">
                                    <center>
                                        <h3>Winkelwagen</h3>
                                    </center>
                                        @if(Cart::content())
                                            <table class="table table-striped">
                                                <tbody>
                                                    <tr>
                                                        <th>Afbeelding</th>
                                                        <th>Naam</th>
                                                        <th>Aantal</th>
                                                        <th>Prijs</th>
                                                    </tr>
                                                    @foreach(Cart::content() as $product)
                                                        <tr>
                                                            {{--{{$product}}--}}
                                                            <td><img class="img-responsive" src="/images/product/{{$product->options[0]->product->productimages->first()->imagePath}}"></td>
                                                            <td>{{$product->options[0]->product->name}}
                                                                {{--{{$product->item->detail ? '- '.$product->item->detail->value : ''}}--}}
                                                            </td>
                                                            <td>{{$product->qty}} x</td>
                                                            <td>€ {{number_format($product->price, 2)}}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @else
                                            <div class="col-m-12" style="width: 240px">
                                                <center>uw winkelwagen is leeg</center>
                                            </div>
                                        @endif

                                    <center>
                                        <a href="{{route('cart')}}" style="margin: 0;" type="button" class="btn btn-default">Bekijken</a>
            {{--                            <a href="{{route('')}}" style="margin: 0;" type="button" class="btn btn-default">Afrekenen</a>--}}
                                    </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!--<header>
    <div class="usr-inf">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <p class="text-left">
                        Op werkdagen besteld voor 18:00 uur, de volgende dag in huis!
                    </p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <p class="text-right">
                         @if(Auth::check())
                             <label class="pull-right">Welkom <a href="{{ route('user.show') }}">{{Auth::user()->name}}, </a><a href="{{route('logout')}}">Uitloggen</a></label>
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
                <img src="https://p37-mailws.icloud.com/wm/messagepart/Artboard%201.png?guid=messagepart%3AINBOX%2F6981-3&type=image%2Fpng&uniq=antoinehd&name=Artboard+1.png&size=55136&dsid=8451028842" height="150px">
            </div>

            <div class="cart-button">
                <div class="">
                    <div class="dropdown">
                        <a href="{{ route('cart') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <a href="{{ route('cart') }}">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <span style="margin-top: 17px; margin-left: -10px; position: absolute;" class="badge">
                                    € {{number_format(Cart::total(), 2)}}
                                </span>
                            </a>
                        </a>
                    <div class="dropdown-menu dropdown-to-right">
                        <center>
                            <h3>Winkelwagen</h3>
                        </center>
                            @if(Cart::content())
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <th>Afbeelding</th>
                                            <th>Naam</th>
                                            <th>Aantal</th>
                                            <th>Prijs</th>
                                        </tr>
                                        @foreach(Cart::content() as $product)
                                            <tr>
                                                {{--{{$product}}--}}
                                                <td><img class="img-responsive" src="/images/product/{{$product->options[0]->product->productimages->first()->imagePath}}"></td>
                                                <td>{{$product->options[0]->product->name}}
                                                    {{--{{$product->item->detail ? '- '.$product->item->detail->value : ''}}--}}
                                                </td>
                                                <td>{{$product->qty}} x</td>
                                                <td>€ {{number_format($product->price, 2)}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="col-m-12" style="width: 240px">
                                    <center>uw winkelwagen is leeg</center>
                                </div>
                            @endif

                        <center>
                            <a href="{{route('cart')}}" style="margin: 0;" type="button" class="btn btn-default">Bekijken</a>
{{--                            <a href="{{route('')}}" style="margin: 0;" type="button" class="btn btn-default">Afrekenen</a>--}}
                        </center>
                        </div>
                    </div>
                </div>
            </div>
            <div class="search-button">
                <div class="">
                    <div class="dropdown">
                        <a href="{{ route('cart') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <a href="{{ route('cart') }}">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </a>
                        </a>
                        <div class="dropdown-menu dropdown-to-right">
                            <div style="padding: 10px;">
                                <div class="form-group" style="margin-bottom: 0px;">
                                   <input style="width: 220px" placeholder="Waar zoekt u naar?" type="email" class="form-control" id="email">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="{{route('homepage')}}"><i class="fa fa-home" aria-hidden="true"></i></a></li>

                    @foreach($main_categories->where('category_id', 0) as $category)
                        @if(count($category->children) != 0)
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
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</header>-->

    {{--@show--}}

<section class="bread-crumb">
    <div class="container">
        @yield('breadcrumbs')
    </div>
</section>

<section class="content">
    <div class="container">
        @yield('content')
    </div>
</section>

<!--<section class="brands">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="slider slider-brands">
                <div>
                    <center>
                        <img class="brand" width="80%" src="http://esmoker-shop.nl/wp-content/uploads/2014/07/squape_logo_pos_dunkel_mit.png"/>
                        <img class="brand" width="80%" src="http://esmoker-shop.nl/wp-content/uploads/2014/07/squape_logo_pos_dunkel_mit.png"/>
                        <img class="brand" width="80%" src="http://esmoker-shop.nl/wp-content/uploads/2014/07/squape_logo_pos_dunkel_mit.png"/>
                    </center>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>-->


<footer>
    <div class="container">
        <div class="col-md-3 col-sm-3 col-xs-4">
            <h3>Service</h3>
                <a href="{{route('voorwaarde')}}">Algemene voorwaarden</a><br/>
                <a href="{{route('garantie')}}">Garantie</a><br/>
                <a href="{{route('policy')}}">Privacy policy & Cookiebeleid</a><br/>
                <a href="{{route('retour')}}">faq</a><br/>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-4">
            <h3>Verzenden</h3>
                <a href="{{route('verzending')}}">Verzenden & Ontangen</a><br/>
                <a href="{{route('retour')}}">Retourneren</a>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-4">
            <h3>Website</h3>
                <a href="{{route('sitemap')}}">sitemap</a><br/>
                <a href="{{route('about')}}">Over ons</a><br/>
                <a href="{{route('contact')}}">Contact</a>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12"><br/><br/>
            <div class="col-md-4 col-sm-4 col-xs-4">
                <img src="https://www.ideal.nl/img/statisch/iDEAL-groot.gif" class="img-responsive">
            </div>
            <div class="col-md-7 col-sm-7 col-xs-7">
                <img src="https://www.nix18.nl/media/images/logo.png" width="100%" style="margin-top: 4px">
            </div>
            <div class="col-md-12" style="overflow: hidden;"><br/>Website door mediaverse.nl &copy; Esigaret-</div>
        </div>
    </div>
<!--
    <div class="container">
        <center>

            <ul class="list-group">
                <li><a href="{{route('voorwaarde')}}">Algemene voorwaarden</a></li>
                <li><a href="{{route('policy')}}">Privacy policy & Cookiebeleid</a></li>
                <li><a href="{{route('contact')}}">Contact</a></li>
                {{--<li><a href="{{route('retour')}}">Retourneren</a></li>--}}
                {{--<li><a href="{{route('retour')}}">faq</a></li>--}}
                <li><a href="{{route('about')}}">Over ons</a></li>
                <li><a href="{{route('verzending')}}">Verzenden & Ontangen</a></li>
                <li><a href="{{route('sitemap')}}">sitemap</a></li>
                {{--<li><a href="{{route('garantie')}}">Garantie</a></li>--}}
            </ul>
        </center>
    </div>-->
 </footer>

    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    <script type="text/javascript">
        var mywindow = $(window);
        var mypos = mywindow.scrollTop();
        var up = false;
        var newscroll;
        mywindow.scroll(function () {
            newscroll = mywindow.scrollTop();
            if (newscroll > mypos && !up) {
                $('.hidde').stop().slideToggle();
                up = !up;
                console.log(up);
            } else if(newscroll < mypos && up) {
                $('.hidde').stop().slideToggle();
                up = !up;
            }
            mypos = newscroll;
        });
    </script>
    {{--<script type="text/javascript" src="http://localhost:8080/assets/slick.js"></script>--}}

    {{--<script src="{{ URL::asset('assets/js/slick.js') }}"></script>--}}
    @stack('script')
    <script src="{{ URL::asset('assets/js/script.js') }}"></script>


    </body>
</html>