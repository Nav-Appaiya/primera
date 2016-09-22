<!DOCTYPE html>
<html>
<head>
  <title>Primera e-Sigarets - @yield('titel')</title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="/css/all.css">
</head>
<body>
        @section('sidebar')
<header>
  <div id="header">
      <div class="cart">
        <a href="" data-toggle="modal" data-target="#myModal"><i class="fa fa-user" aria-hidden="true"></i></a>
      </div>
      <div class="usr">
        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
        <span style="margin-top: 30px; margin-left: -8px; position: absolute;" class="badge">0</span>
      </div>
        <div class="logo">
          <img src="http://esiggie.nl/wp-content/uploads/2014/12/Esiggie-logo.png">
        </div>
        <ul>
          <li><a href="/">Homepage</a></li>

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
</header>

<div id="sidebar">
  <h3>Prijs</h3>
  <input type="text" style="width: 47.5%; margin-bottom: 10px; margin-right: 5%; float: left" placeholder="€ 0">
  <input type="text" style="width: 47.5%; margin-bottom: 10px;" placeholder="€ 120">

  <h3>Merk</h3>

  <select style="margin-bottom: 10px;" multiple>
    <option>Some nice</option>
    <option>Looking Options</option>
    <option>Zijn hier te</option>
    <option>Vinden op deze</option>
    <option>pagina grote</option>
    <option>Test 1234</option>
    <option>Ik heb honger</option>
    <option>Amersfoort</option>
  </select>

  <h3>Materiaal</h3>

  <select multiple>
    <option>Some nice</option>
    <option>Looking Options</option>
    <option>Zijn hier te</option>
    <option>Vinden op deze</option>
    <option>pagina grote</option>
    <option>Test 1234</option>
    <option>Ik heb honger</option>
    <option>Amersfoort</option>
  </select>

  <button>Filter</button>

</div>
@show
<div id="content">
  <div class="container-fluid" style="width: 100%">
  <div class="content">
            @yield('content')
    </div>
    </div>
  <footer></footer>
</div>

<!-- Modals -->

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
   <div class="card">
    <center><h3>Account stuff</h3></center>

   </div>

  </div>
</div>

        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="{{ URL::asset('assets/js/script.js') }}"></script>
        @yield('scripts')

</body>
</html>