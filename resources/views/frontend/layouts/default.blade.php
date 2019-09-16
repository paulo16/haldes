<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<!-- Mirrored from myboodesign.com/pasific/shortcode-headings.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Aug 2019 09:56:05 GMT -->

<head>

    @yield('head')
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta charset="utf-8">
    <meta name="author" content="Haldes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('assets/frontend/img/favicon.ico')}}">
    <link rel="apple-touch-icon" href="{{ asset('assets/frontend/img/apple-touch-icon.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/frontend/img/apple-touch-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/frontend/img/apple-touch-icon-114x114.png')}}">
    <!-- Load Core CSS 
        =====================================-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/core/bootstrap-3.3.7.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/core/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/demo.css') }}">
    <!-- Load Main CSS 
        =====================================-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/main/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/main/setting.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/main/hover.css') }}">
    <!-- Load Magnific Popup CSS 
        =====================================-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/magnific/magic.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/magnific/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/magnific/magnific-popup-zoom-gallery.css') }}">
    <link href="{{asset('assets/frontend/css/sweetalert.css')}}" rel="stylesheet" type="text/css" />
    <!-- Load OWL Carousel CSS 
        =====================================-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl-carousel/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl-carousel/owl.transitions.css') }}">
    <!-- Load Color CSS - Please uncomment to apply the color.
        =====================================      
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/color/blue.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/color/brown.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/color/cyan.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/color/dark.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/color/green.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/color/orange.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/color/purple.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/color/pink.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/color/red.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/color/yellow.css') }}">-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/color/pasific.css') }}">
    <!-- Load Fontbase Icons - Please Uncomment to use linea icons
        =====================================       
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/icon/linea-arrows-10.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/icon/linea-basic-10.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/icon/linea-basic-elaboration-10.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/icon/linea-ecommerce-10.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/icon/linea-music-10.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/icon/linea-software-10.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/icon/linea-weather-10.css') }}">-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/icon/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/icon/et-line-font.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style_perso.css') }}">
    <!-- Load JS
        HTML5 shim and Respond.js') }} for IE8 support of HTML5 elements and media queries
        WARNING: Respond.js') }} doesn't work if you view the page via file://
        =====================================-->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js') }}"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js') }}"></script>
        <![endif]-->
</head>

<body id="topPage" data-spy="scroll" data-target=".navbar" data-offset="100">
    <!-- Page Loader
        ===================================== -->
    @include('frontend.layouts.preload')
    <a href="#page-top" class="go-to-top" style="display: none;">
        <i class="fa fa-long-arrow-up"></i>
    </a>
    <!-- Navigation Area
        ===================================== -->
    @include('frontend.layouts.nav')
    <!-- Search Modal Dialog Box
        ===================================== -->
    <!-- Subheader Area
        ===================================== -->
    @yield('header')
    <!-- Heading Styles
        ===================================== -->

    @yield('content')

    <!-- Footer Area
        =====================================-->
    @include('frontend.layouts.footer')
    <!-- JQuery Core
        =====================================-->
    <script src="{{asset('assets/frontend/js/core/jquery.min.js') }}"></script>
    <script src="{{asset('assets/frontend/js/core/bootstrap-3.3.7.min.js') }}"></script>
    <!-- JQuery Main
        =====================================-->
    <script src="{{asset('assets/frontend/js/main/jquery.appear.js') }}"></script>
    <script src="{{asset('assets/frontend/js/main/isotope.pkgd.min.js') }}"></script>
    <script src="{{asset('assets/frontend/js/main/parallax.min.js') }}"></script>
    <script src="{{asset('assets/frontend/js/main/jquery.countTo.js') }}"></script>
    <script src="{{asset('assets/frontend/js/main/owl.carousel.min.js') }}"></script>
    <script src="{{asset('assets/frontend/js/main/jquery.sticky.js') }}"></script>
    <script src="{{asset('assets/frontend/js/main/ion.rangeSlider.min.js') }}"></script>
    <script src="{{asset('assets/frontend/js/main/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{asset('assets/frontend/js/sweetalert.min.js') }}"></script>
    @yield('js')
    <script src="{{asset('assets/frontend/js/main/main.js') }}"></script>
    <script>
        $(document).ready(function () {

            ////////// Click sur créer demande //////////
           $(".creerdemande").click(function (e) {

                e.preventDefault();

                var swal_ot = {
                        title: "{{Lang::get('contenu.profil.sure')}}",
                        text: "{{Lang::get('contenu.profil.subtext_sure')}}",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonText: "{{Lang::get('contenu.profil.confirm_btn')}}",
                        cancelButtonText: "{{Lang::get('contenu.profil.cancel_btn')}}",
                        closeOnConfirm: false
                    };
                var swal_ot2 = {
                        title: "{{Lang::get('contenu.profil.infodemande')}}",
                        text: "{{Lang::get('contenu.profil.sub_infodemande')}}",
                        type: "info",
                        showCancelButton: true,
                        confirmButtonText: "{{Lang::get('contenu.profil.confirm_btn_lu')}}",
                        cancelButtonText: "{{Lang::get('contenu.profil.cancel_btn')}}",
                        closeOnConfirm: false
                    };

               
                    $.ajax({
                        url:"{{route('demandes.lastdemandemois')}}",
                        type: 'GET',
                        data: {_token: '{{ csrf_token() }}'},
                    }).done(function (result) {
                        //var rep= JSON.stringify(reponse);
                        console.log(result);
                        if (result.reponse == "impossible") {
                            swal("{{Lang::get('contenu.profil.impossible')}}", "{{Lang::get('contenu.profil.sub_impossible')}}", "warning");

                        } else {
                            swal(swal_ot, function () {

                                swal(swal_ot2, function () {
                                    location="{{route('demande.create')}}" 
                                });
                            });

                        }
                        

                    }).error(function () {
                        swal("{{Lang::get('contenu.admin.oops')}}", "{{Lang::get('contenu.admin.problem_server')}}", "error");
                    });
             

            });
        });
    </script>
</body>

</html>