<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') </title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('public') }}/admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('public') }}/admin/css/adminlte.min.css">
    <link rel="stylesheet" href="{{ asset('public') }}/admin/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="{{ asset('public') }}/admin/css/daterangepicker.min.css">
    <link rel="stylesheet" href="{{ asset('public') }}/admin/css/dbadmin.css">
    <link rel="stylesheet" href="{{ asset('public') }}/admin/css/login_signup.css">
    <link rel="stylesheet" href="{{ asset('public') }}/admin/css/styles.css">
    <link rel="stylesheet" href="{{ asset('public') }}/admin/css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @stack('css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('public') }}/admin/img/AestheticPOS.png" alt="AestheticPOS" height="auto" width="25%">
    </div>
    @include('admin.includes.navbar')
    @include('admin.includes.sidebar')


    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <!-- mainbody start-->
                <div class="main_container" id="main">
                    @yield('content')
                </div>
                <!-- mainbodoy end -->
            </div>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('public') }}/admin/js/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('public') }}/admin/js/jquery-ui.min.js"></script>
    <script src="{{ asset('public') }}/admin/js/popper.min.js"></script>
    <script src="{{ asset('public') }}/admin/js/bootstrap.min.js"></script>
    <script src="{{ asset('public') }}/admin/js/sidebar-collaps.js"></script>
    <script src="{{ asset('public') }}/admin/js/chart.min.js"></script>
    <script src="{{ asset('public') }}/admin/js/jquery.sparkline.min.js"></script>
    <script src="{{ asset('public') }}/admin/js/jquery.knob.min.js"></script>
    <script src="{{ asset('public') }}/admin/js/daterangepicker.min.js"></script>
    <script src="{{ asset('public') }}/admin/js/OverlayScrollbars.min.js"></script>
    <script src="{{ asset('public') }}/admin/js/80d729fa6f.js"></script>
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/dataloader/dataloader.min.js"></script>
    <script src="{{ asset('public') }}/admin/js/adminlte.js"></script>
    <script src="{{ asset('public') }}/admin/js/demo.js"></script>
    <script src="{{ asset('public') }}/admin/js/dashboard.js"></script>

    <script src="{{ asset('public') }}/admin/js/main.js"></script>

    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>

    <script>
        AmCharts.loadFile("https://s3-us-west-2.amazonaws.com/s.cdpn.io/t-160/22300.csv", {}, function (response) {
            /**
             * Parse CSV
             */
            var data = AmCharts.parseCSV(response, {
                "useColumnNames": true
            });

            /**
             * Create the chart
             */
            var chart = AmCharts.makeChart("chartdiv", {
                "type": "serial",
                "theme": "light",
                "dataProvider": data,
                "valueAxes": [{
                    "gridColor": "#FFFFFF",
                    "gridAlpha": 0.2,
                    "dashLength": 0
                }],
                "gridAboveGraphs": true,
                "startDuration": 1,
                "graphs": [{
                    "balloonText": "[[category]]: <b>[[value]]</b>",
                    "fillAlphas": 0.8,
                    "lineAlpha": 0.2,
                    "type": "column",
                    "valueField": "visits"
                }],
                "chartCursor": {
                    "categoryBalloonEnabled": false,
                    "cursorAlpha": 0,
                    "zoomable": false
                },
                "categoryField": "country",
                "categoryAxis": {
                    "gridPosition": "start",
                    "gridAlpha": 0,
                    "tickPosition": "start",
                    "tickLength": 20
                }
            });

        });

    </script>
    <script src="{{ asset('public/admin/plugins/sweetalert/sweetalert.min.js') }}"></script>
    <script>
        $(document).on("click", "#delete", function (e) {
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                    title: "Are you Want to delete?",
                    text: "Once Delete, This will be Permanently Delete!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                    } else {
                        swal("Safe Data!");
                    }
                });
        });

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    {!! Toastr::message() !!}
    <script>
        @if($errors - > any())
        @foreach($errors - > all() as $error)
        toastr.error('{{ $error }}', 'Error', {
            closeButton: true,
            progressBar: true,
        });
        @endforeach
        @endif

    </script>
    <script>
        if ($(".menu-show ul li a").hasClass('active')) {
            $(".active .nav-treeview").addClass("d-block");
        } else {
            $(".active .nav-treeview").removeClass("d-block");
        }

    </script>

    @stack('js')

</body>

</html>
