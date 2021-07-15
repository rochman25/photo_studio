<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $personalisasi[0]['P001']['value'] }}</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('user_assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('user_assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('user_assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user_assets/vendor/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('user_assets/vendor/boxicons/css/boxicons.css') }}" rel="stylesheet">
    <link href="{{ asset('user_assets/vendor/owl.carousel/assets/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('user_assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
    <link href="{{ asset('user_assets/vendor/aos/aos.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('user_assets/css/style.css') }}" rel="stylesheet">
    <style>
        /* .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
        } */
    </style>
    @stack('user_styles')
    <!-- =======================================================
  * Template Name: Regna - v2.1.0
  * Template URL: https://bootstrapmade.com/regna-bootstrap-onepage-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    @include('partials/user-header')

    @yield('user_pages')

    @include('partials/user-footer')

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('user_assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('user_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('user_assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('user_assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('user_assets/vendor/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('user_assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('user_assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('user_assets/vendor/superfish/superfish.min.js') }}"></script>
    <script src="{{ asset('user_assets/vendor/hoverIntent/hoverIntent.js') }}"></script>
    <script src="{{ asset('user_assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('user_assets/vendor/venobox/venobox.min.js') }}"></script>
    <script src="{{ asset('user_assets/vendor/aos/aos.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('user_assets/js/main.js') }}"></script>
    @stack('user_scripts')
</body>

</html>
