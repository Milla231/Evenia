<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Evenia</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets_site/img/favicon.png')}}">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('assets_site/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets_site/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets_site/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets_site/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets_site/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets_site/css/gijgo.css')}}">
    <link rel="stylesheet" href="{{asset('assets_site/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets_site/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets_site/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets_site/css/slicknav.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">


    <link rel="stylesheet" href="{{asset('assets_site/css/style.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('assets_site/css/responsive.css')}}"> -->
</head>

<body>


    <!-- header-start -->
    @include('pages.site.partials.header')
    <!-- header-end -->

     @yield('content')


 

   
    <!-- footer_start  -->
    @include('pages.site.partials.footer')
    <!-- footer_end  -->

    <!-- JS here -->
    !-- JS here -->
    <script src="{{('assets_site/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <script src="{{('assets_site/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{('assets_site/js/popper.min.js')}}"></script>
    <script src="{{('assets_site/js/bootstrap.min.js')}}"></script>
    <script src="{{('assets_site/js/owl.carousel.min.js')}}"></script>
    <script src="{{('assets_site/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{('assets_site/js/ajax-form.js')}}"></script>
    <script src="{{('assets_site/js/waypoints.min.js')}}"></script>
    <script src="{{('assets_site/js/jquery.counterup.min.js')}}"></script>
    <script src="{{('assets_site/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{('assets_site/js/scrollIt.js')}}"></script>
    <script src="{{('assets_site/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{('assets_site/js/wow.min.js')}}"></script>
    <script src="{{('assets_site/js/gijgo.min.js')}}"></script>
    <script src="{{('assets_site/js/nice-select.min.js')}}"></script>
    <script src="{{('assets_site/js/jquery.slicknav.min.js')}}"></script>
    <script src="{{('assets_site/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{('assets_site/js/tilt.jquery.js')}}"></script>
    <script src="{{('assets_site/js/plugins.js')}}"></script>



    <!--contact js-->
    <script src="{{('assets_site/js/contact.js')}}"></script>
    <script src="{{('assets_site/js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{('assets_site/js/jquery.form.js')}}"></script>
    <script src="{{('assets_site/js/jquery.validate.min.js')}}"></script>
    <script src="{{('assets_site/js/mail-script.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{('assets_site/js/main.js')}}"></script>
</body>

</html>