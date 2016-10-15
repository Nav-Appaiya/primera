<!DOCTYPE html>
<html>
    <head>
        <title>Primera e-Sigarets - @yield('titel')</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="language" content="NL">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="copyright" content="Mediaverse">
        <meta name="googlebot" content="noodp">
        <meta name="language" content="nederland">
        <meta name="application-name" content="Primera Shop" />

        <meta name="description" content="tekst">
        <meta name="robots" content="noodp">
        <meta name="revisit-after" content="1 days">

        <!-- for Facebook -->
        <meta property="og:title" content="" />
        <meta property="og:type" content="article" />
        <meta property="og:image" content="" />
        <meta property="og:url" content="" />
        <meta property="og:description" content="" />

        <meta property="article:section" content="product name" />
        <meta property="article:published_time" content="date time" />
        <meta property="article:modified_time" content="" />

        <!-- for Twitter -->
        <meta name="twitter:card" content="" />
        <meta name="twitter:title" content="" />
        <meta name="twitter:description" content="" />
        <meta name="twitter:image" content="" />

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
                            @if(Session::has('cart'))
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <th>Afbeelding</th>
                                            <th>Naam</th>
                                            <th>Aantal</th>
                                            <th>Prijs</th>
                                        </tr>
                                        @foreach($cart_items->items as $product)
                                            <tr>
                                                <td><img class="img-responsive" src="/images/product/{{$product['item']->product->productimages->first()->imagePath}}"></td>
                                                <td>{{$product['item']->product->name}} {{$product['item']->detail ? '- '.$product['item']->detail->value : ''}}</td>
                                                <td>{{$product['qty']}} x</td>
                                                <td>€ {{number_format($product['price'], 2)}}</td>
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

<section class="brands">
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
</section>


<footer>
    <div class="container">
        <center>
            <ul class="list-group">
                <li><a href="{{route('voorwaarde')}}">Algemene voorwaarden</a></li>
                <li><a href="{{route('cookies')}}">Cookies</a></li>
                <li><a href="{{route('policy')}}">Privacy policy</a></li>
                <li><a href="{{route('contact')}}">Contact</a></li>
                <li><a href="{{route('retour')}}">Retourneren</a></li>
                {{--<li><a href="{{route('retour')}}">faq</a></li>--}}
                <li><a href="{{route('about')}}">Over ons</a></li>
                <li><a href="{{route('verzending')}}">Verzending</a></li>
                <li><a href="{{route('sitemap')}}">sitemap</a></li>
                <li><a href="{{route('garantie')}}">Garantie</a></li>
            </ul>
            <p>
                <img src="https://www.nix18.nl/media/images/logo.png">
                <img src="https://www.ideal.nl/img/statisch/iDEAL-Payoff-2-groot.gif">
            </p>
        </center>
    </div>
 </footer>

    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    {{--<script type="text/javascript" src="http://localhost:8080/assets/slick.js"></script>--}}
   
    <!-- Begin Cookie Consent plugin by Silktide - http://silktide.com/cookieconsent -->
    <script type="text/javascript">
        window.cookieconsent_options = {
            "message":"This website uses cookies to ensure you get the best experience on our website",
            "dismiss":"Got it!",
            "learnMore":"More info",
            "link":null,
            "theme":"light-top"
        };
    </script>

    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.10/cookieconsent.min.js"></script>
    <!-- End Cookie Consent plugin -->

    {{--<script src="{{ URL::asset('assets/js/slick.js') }}"></script>--}}
    @stack('script')
    <script src="{{ URL::asset('assets/js/script.js') }}"></script>


    </body>
</html>