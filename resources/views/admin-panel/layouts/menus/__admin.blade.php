<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{route('admin_dashboard_index')}}">Admin Panel Esigareteindhoven</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">

        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                {{--<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>--}}
                {{--</li>--}}
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->/Users/nav/PhpstormProjects/primera/resources/views/admin-panel/layouts/menus/__admin.blade.php
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav in" id="side-menu">
                {{--<li class="sidebar-search">--}}
                    {{--<div class="input-group custom-search-form">--}}
                        {{--<input type="text" class="form-control" placeholder="Search...">--}}
                        {{--<span class="input-group-btn">--}}
                                {{--<button class="btn btn-default" type="button">--}}
                                    {{--<i class="fa fa-search"></i>--}}
                                {{--</button>--}}
                            {{--</span>--}}
                    {{--</div>--}}
                    {{--<!-- /input-group -->--}}
                {{--</li>--}}
                <li>
                    <a href="{{route('admin_dashboard_index')}}" class="{{ Request::is('admin') ? 'active' : null }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a href="{{route('admin_property_index')}}" class="{{ Request::is('admin/detail*') ? 'active' : null }}"><i class="fa fa-asterisk fa-fw"></i> Details</a>
                </li>
                <li>
                    <a href="{{route('admin_category_index')}}" class="{{ Request::is('admin/categories*') ? 'active' : null }}"><i class="fa fa-th-list fa-fw"></i> Categorieen</a>
                </li>
                <li>
                    <a href="{{route('admin_product_index')}}" class="{{ Request::is('admin/product*') ? 'active' : null }}"><i class="fa fa-archive fa-fw"></i> Producten</a>
                </li>
                <li>
                    <a href="{{route('admin_user_index')}}" class="{{ Request::is('admin/users*') ? 'active' : null }}"><i class="fa fa-users fa-fw"></i> Users</a>
                </li>
                <li>
                    <a href="{{route('admin_order_index')}}" class="{{ Request::is('admin/orders*') ? 'active' : null }}"><i class="fa fa-shopping-cart fa-fw"></i> Orders</a>
                </li>
                <li>
                    <a href="{{route('admin_review_index')}}" class="{{ Request::is('admin/reviews*') ? 'active' : null }}"><i class="fa fa-comments fa-fw"></i> Reviews</a>
                </li>

            </ul>
        </div>
        <!-- /.sidebar-collapse -->


    </div>
    <!-- /.navbar-static-side -->
</nav>
