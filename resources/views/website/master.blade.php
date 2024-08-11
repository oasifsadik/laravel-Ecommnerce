<!doctype html>
<html class="no-js" lang="zxx">

<!-- index28:48-->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Home Version One || limupa - Digital Products Store eCommerce Bootstrap 4 Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('fontend') }}/images/favicon.png">
        <!-- Material Design Iconic Font-V2.2.0 -->
        <link rel="stylesheet" href="{{ asset('fontend/css/material-design-iconic-font.min.css') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('fontend/css/font-awesome.min.css') }}">
        <!-- Font Awesome Stars-->
        <link rel="stylesheet" href="{{ asset('fontend/css/fontawesome-stars.css') }}">
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="{{ asset('fontend/css/meanmenu.css') }}">
        <!-- owl carousel CSS -->
        <link rel="stylesheet" href="{{ asset('fontend/css/owl.carousel.min.css') }}">
        <!-- Slick Carousel CSS -->
        <link rel="stylesheet" href="{{ asset('fontend/css/slick.css') }}">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="{{ asset('fontend/css/animate.css') }}">
        <!-- Jquery-ui CSS -->
        <link rel="stylesheet" href="{{ asset('fontend/css/jquery-ui.min.css') }}">
        <!-- Venobox CSS -->
        <link rel="stylesheet" href="{{ asset('fontend/css/venobox.css') }}">
        <!-- Nice Select CSS -->
        <link rel="stylesheet" href="{{ asset('fontend/css/nice-select.css') }}">
        <!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="{{ asset('fontend/css/magnific-popup.css') }}">
        <!-- Bootstrap V4.1.3 Fremwork CSS -->
        <link rel="stylesheet" href="{{ asset('fontend/css/bootstrap.min.css') }}">
        <!-- Helper CSS -->
        <link rel="stylesheet" href="{{ asset('fontend/css/helper.css') }}">
        <!-- Main Style CSS -->
        <link rel="stylesheet" href="{{ asset('fontend/style.css') }}">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="{{ asset('fontend/css/responsive.css') }}">
        <!-- Modernizr js -->
        <script src="{{ asset('fontend/js/vendor/modernizr-2.8.3.min.js') }}"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        @yield('fontCss')
    </head>
    <body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
        <!-- Begin Body Wrapper -->
        <div class="body-wrapper">
            <!-- Begin Header Area -->

            <!-- Header Area End Here -->
            @yield('webContent')
            <!-- Quick View | Modal Area End Here -->

        </div>
        <!-- Body Wrapper End Here -->
        <!-- jQuery-V1.12.4 -->
        <script src="{{ asset('fontend') }}/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <!-- Popper js -->
        <script src="{{ asset('fontend') }}/js/vendor/popper.min.js"></script>
        <!-- Bootstrap V4.1.3 Fremwork js -->
        <script src="{{ asset('fontend') }}/js/bootstrap.min.js"></script>
        <!-- Ajax Mail js -->
        <script src="{{ asset('fontend') }}/js/ajax-mail.js"></script>
        <!-- Meanmenu js -->
        <script src="{{ asset('fontend') }}/js/jquery.meanmenu.min.js"></script>
        <!-- Wow.min js -->
        <script src="{{ asset('fontend') }}/js/wow.min.js"></script>
        <!-- Slick Carousel js -->
        <script src="{{ asset('fontend') }}/js/slick.min.js"></script>
        <!-- Owl Carousel-2 js -->
        <script src="{{ asset('fontend') }}/js/owl.carousel.min.js"></script>
        <!-- Magnific popup js -->
        <script src="{{ asset('fontend') }}/js/jquery.magnific-popup.min.js"></script>
        <!-- Isotope js -->
        <script src="{{ asset('fontend') }}/js/isotope.pkgd.min.js"></script>
        <!-- Imagesloaded js -->
        <script src="{{ asset('fontend') }}/js/imagesloaded.pkgd.min.js"></script>
        <!-- Mixitup js -->
        <script src="{{ asset('fontend') }}/js/jquery.mixitup.min.js"></script>
        <!-- Countdown -->
        <script src="{{ asset('fontend') }}/js/jquery.countdown.min.js"></script>
        <!-- Counterup -->
        <script src="{{ asset('fontend') }}/js/jquery.counterup.min.js"></script>
        <!-- Waypoints -->
        <script src="{{ asset('fontend') }}/js/waypoints.min.js"></script>
        <!-- Barrating -->
        <script src="{{ asset('fontend') }}/js/jquery.barrating.min.js"></script>
        <!-- Jquery-ui -->
        <script src="{{ asset('fontend') }}/js/jquery-ui.min.js"></script>
        <!-- Venobox -->
        <script src="{{ asset('fontend') }}/js/venobox.min.js"></script>
        <!-- Nice Select js -->
        <script src="{{ asset('fontend') }}/js/jquery.nice-select.min.js"></script>
        <!-- ScrollUp js -->
        <script src="{{ asset('fontend') }}/js/scrollUp.min.js"></script>
        <!-- Main/Activator js -->
        <script src="{{ asset('fontend') }}/js/main.js"></script>
        @yield('font-js')
        <script>
            @if(Session::has('success'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                    toastr.success("{{ session('success') }}");
            @endif

            @if(Session::has('error'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                    toastr.error("{{ session('error') }}");
            @endif

            @if(Session::has('info'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                    toastr.info("{{ session('info') }}");
            @endif

            @if(Session::has('warning'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                    toastr.warning("{{ session('warning') }}");
            @endif
        </script>
    </body>

<!-- index30:23-->
</html>
