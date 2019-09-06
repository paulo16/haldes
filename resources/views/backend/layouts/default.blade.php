<!DOCTYPE html>
<html>
<head>
    @yield('head')
    <link href="{{ asset('assets/backend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/backend/css/core.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/backend/css/components.css')}} " rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/backend/css/icons.css')}} " rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/backend/css/pages.css')}} " rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/backend/css/responsive.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/backend/css/sweetalert.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/backend/css/dropify.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/backend/css/bootstrap-datetimepicker.css')}}" rel="stylesheet" type="text/css"/>


    <script src="{{asset('assets/backend/js/modernizr.min.js')}}"></script>

</head>

<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
@include('backend.layouts.topbar')
<!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->
@include('backend.layouts.leftsidebar')
<!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">

                        @yield('title_content')

                    </div>
                </div>

                @yield('content')

            </div> <!-- container -->

        </div> <!-- content -->

        <footer class="footer">
            © 2019. tous droits réservés .
        </footer>

    </div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->

<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="{{asset('assets/backend/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/backend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/backend/js/detect.js')}}"></script>
<script src="{{asset('assets/backend/js/fastclick.js')}}"></script>
<script src="{{asset('assets/backend/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('assets/backend/js/jquery.blockUI.js')}}"></script>
<script src="{{asset('assets/backend/js/waves.js')}}"></script>
<script src="{{asset('assets/backend/js/wow.min.js')}}"></script>
<script src="{{asset('assets/backend/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('assets/backend/js/jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('assets/backend/js/sweetalert.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
<script src="{{asset('assets/backend/js/dropify.min.js') }}"></script>
<script src="{{asset('assets/backend/js/bootstrap-datetimepicker.js') }}"></script>

@yield('js')

<script src="{{asset('assets/backend/js/jquery.core.js')}}"></script>
<script src="{{asset('assets/backend/js/jquery.app.js')}}"></script>

</body>
</html>