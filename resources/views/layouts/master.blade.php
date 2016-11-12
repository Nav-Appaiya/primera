<!DOCTYPE html>
<html>
    <head>
        <title>Primera e-Sigarets - @yield('titel')</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="refresh" content="3600">
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

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="/css/all.css">

        <style type="text/css">
            .slick-slider {
                margin-bottom: 15px;
                margin-top: 15px;
            }
        </style>

        @stack('css')
    </head>
<body>
    <header>
        <div class="-head-top">
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
                                <a class="white">Welkom</a>,
                                <a href="{{ route('user.show') }}">{{Auth::user()->name}}</a>
                                <a href="{{route('logout')}}" class="white">Uitloggen</a>
                            @else
                                <a class="pull-right white" href="{{route('register')}}">Registeren</a>
                                <small class="pull-right">&nbsp; | &nbsp;</small>
                                <a class="pull-right white" href="{{route('login')}}">Inloggen</a>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="hidde">
            <div class="-head-inf">
                <div class="container">
                    <div class="row">
                      <div class="col-lg-8 col-md-8 col-sm-10 col-xs-10">
                            <a href="{{route('homepage')}}"><img src="http://antoinecroes.nl/E-sigaret-logo.png" height="50px" style="margin-top: 20px;"></a>
                        </div>
                        <div class="col-lg-4 col-md-4 hidden-xs hidden-sm">

                            <div class="input-group" style="width: 100%; !important; padding-top: 25px;">
                                {{--<input  style="width: 100%; margin-top: 28px" type="text" class="form-control" placeholder="">--}}

                                <style>
                                    .twitter-typeahead{
                                        width: 100%;
                                        /*margin-bottom: -30px;*/
                                    }

                                    .tt-dataset-search-input{
                                        margin-top: -20px;
                                        width: 350px;
                                    }
                                    .-head-inf{
                                        line-height: 0px !important;
                                    }
                                </style>

                                {{--<div class="form-group">--}}
                                <form class="typeahead form-group" role="search">
                                    <input type="search" name="q" class="form-control search-input" placeholder="Zoek op producten" autocomplete="off">
                                </form>
                                {{--</div>--}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="-head-nav">
                        <nav class="navbar navbar-default navbar-static-top">
                              <div class="container">
                                <div class="navbar-header">
                                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                  </button>
                                </div>
                                <div id="navbar" class="navbar-collapse collapse">
                                  <ul class="nav navbar-nav">
                                    <li><a href="{{route('homepage')}}"><i class="fa fa-home" aria-hidden="true"></i></a></li>

                                @foreach($main_categories->where('category_id', 0) as $category)
                                    @if(count($category->children) != 0)
                                        <li class="dropdown">
                                            <a href="{{ route('category.show', [str_replace(' ','-', $category->title), $category->id])  }}">{{ $category->title }}<span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                @foreach($category->children()->orderBy('title', 'ASC')->get() as $child)
                                                    <li class="">
                                                        <a href="{{ route('product.index', [str_replace(' ', '-', $category->title), str_replace(' ', '-', $child->title), $child->id ]) }}">{{$child->title}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endif
                                @endforeach
                                  </ul>
                                </div><!--/.nav-collapse -->
                              </div>
                            </nav>
                        
                    </div>
                </div>
            </div>
        </div>
    </header>

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

<footer>
    <div id="-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4">
                    <label class="-footer-label">Service</label>
                    <ul class="-footer-list">
                        <li><a href="{{route('voorwaarde')}}">Algemene voorwaarden</a></li>
                        <li><a href="{{route('garantie')}}">Garantie</a></li>
                        <li><a href="{{route('policy')}}">Privacy policy & Cookiebeleid</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-4">
                    <label class="-footer-label">Verzending</label>
                    <ul class="-footer-list">
                        <li><a href="{{route('verzending')}}">Verzenden & Ontangen</a></li>
                        <li><a href="{{route('retour')}}">Retourneren</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-4">
                    <label class="-footer-label">Bedrijf</label>
                    <ul class="-footer-list">
                        <li><a href="{{route('sitemap')}}">sitemap</a></li>
                        <li><a href="{{route('about')}}">Over ons</a></li>
                        <li><a href="{{route('contact')}}">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    
                </div>
            </div>
        </div>
    </div>
    <div id="-subfooter">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <img src="https://www.nix18.nl/media/images/logo.png" height="20px">
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"></div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-right">
                    <img src="https://www.ideal.nl/img/statisch/iDEAL-groot.gif" height="20px">
                </div>
            </div>
        </div>
    </div>
</footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins and Typeahead) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- Typeahead.js Bundle -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>

    <script>

        jQuery(document).ready(function($) {
            // Set the Options for "Bloodhound" suggestion engine
            var engine = new Bloodhound({
                remote: {
                    url: '/find?q=%QUERY%',
                    wildcard: '%QUERY%'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });

            console.log(engine);

            $(".search-input").typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            }, {
                source: engine.ttAdapter(),

                // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
                name: 'search-input',

                // the key from the array we want to display (name,id,email,etc...)
                templates: {
                    empty: [
                        '<div class="list-group search-results-dropdown" style="margin-top: 20px; color: #231f20;"> <div class="list-group-item">Er zijn geen producten gevonden...</div>  </div>'
                    ],
                    header: [
                        '<div class="list-group search-results-dropdown">'
                    ],
                    suggestion: function (data) {
                        return '<a href="/' + data.name.replace(/ /g,"-") + '/p-' + data.id + '" class="list-group-item" style="height: 50px; line-height: 25px">' + data.name + '<label class="pull-right">€ ' + data.price + '</label></a>'
                    }
                }
            });
        });
    </script>
    <script type="text/javascript">
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-86923618-1', 'auto');
        ga('send', 'pageview');

    </script>

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

    <style type="text/css">

        .back-to-top {
            background: none;
            margin: 0;
            position: fixed;
            bottom: 50px;
            right: 50px;
            width: 80px;
            height: 80px;
            z-index: 100;
            display: none;
            text-decoration: none;
            color: #ffffff;
            /*background-color: #333;*/
            /*opacity: 0.2;*/
        }
        .back-to-top i {
            font-size: 80px;
            color: #333;
            opacity: 0.1;
        }
        .back-to-top i:hover {
            color: #333;
            opacity: 0.3;
        }

    </style>

    <script type="text/javascript">
        jQuery(document).ready(function() {

            var offset = 250;
            var duration = 300;

            jQuery(window).scroll(function() {
                if (jQuery(this).scrollTop() > offset) {
                    jQuery('.back-to-top').fadeIn(duration);
                } else {
                    jQuery('.back-to-top').fadeOut(duration);
                }
            });

            jQuery('.back-to-top').click(function(event) {
                event.preventDefault();
                jQuery('html, body').animate({scrollTop: 0}, duration);
                return false;
            })

        });

    </script>
    </body>
</html>