<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap Core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/3.3.7+1/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link href="http://cdn.oesmith.co.uk/morris-0.5.1.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <style type="text/css">
        {{--interfereert met producten pagina tooltip--}}
        /*label {*/
            /*float: left;*/
            /*margin-right: 35px;*/
        /*}*/
        /*#DataTables_Table_0_filter{*/
            /*float: left;*/

        /*}*/
        /*#DataTables_Table_0_length{*/
            /*float: left;*/

        /*}*/
        /*.thumbnail{*/
            /*background-color: #F8F8F8;*/
        /*}*/
        /*.dataTables_length{*/
            /*float: left;*/
        /*}*/
        /*.dataTables_filter{*/
            /*float: right;*/
            /*!*text-align: right;*!*/
            /*width: 100px;*/
        /*}*/
        /*.dataTables_filter > input{*/
            /*display: inline-block;*/
        /*}*/
        /*.dataTables_length select{*/
            /*color: #000;*/
            /*!*width: 100%;*!*/
            /*border-radius: 3px;*/
            /*border: 1px #ddd solid;*/
            /*border-bottom: 2px #ddd solid;*/
            /*height: 35px;*/
            /*margin-bottom: 25px;*/
        /*}*/

        /*input[type=search] {*/
            /*width: 100%;*/
            /*border-radius: 3px;*/
            /*border: 1px #ddd solid;*/
            /*border-bottom: 2px #ddd solid;*/
            /*height: 35px;*/
            /*margin-bottom: 25px;*/
        /*}*/

        /*.paginate_button{*/
            /*border: 1px #ddd solid;*/
            /*line-height: 35px;*/
            /*padding: 0 4px;*/
            /*height: 35px;*/
            /*border-radius: 4px;*/
        /*}*/
        /*.next {*/
            /*float: right;*/
        /*}*/

        /*.paging_simple_numbers*/


    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    @include('admin-panel.layouts.menus.__admin')

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        @yield('title')
                    </h1>
                    @yield('breadcrumb')

                    @include('errors.message')

                </div>
            </div>
            <!-- /.row -->
            @yield('content')
        </div>
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.js"></script>
    {{--<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>--}}

    @stack('scripts')
    {{--@yield('javascript')--}}

    <script type="text/javascript">
        $(document).ready(function($) {
            $(".table-row").click(function() {
                window.document.location = $(this).data("href");
            });
        });
    </script>

    <script>

        $(document).ready(function(){

            $('.table').dataTable( {
                language: {
                    url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Dutch.json",
                    sLengthMenu: "_MENU_ Show",
                    search: "_INPUT_"
//                    searchPlaceholder: "Zoeken...",

                }
            } );
        });

    </script>

    <script type="text/javascript">

        $(document).ready(function () {

            window.setTimeout(function() {
                $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
                    $(this).remove();
                });
            }, 5000);
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function($) {
            $( "#datepicker" ).datepicker();
        });
    </script>

</body>

</html>
