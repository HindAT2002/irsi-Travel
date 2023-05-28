<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>IRSI-Travels @yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link  href="{{ asset('img/R.png') }}" rel="icon">
  <link  href="{{ asset('img/R.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link  href="{{ asset('https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900') }}" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link  href="{{ asset('vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link  href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link  href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link  href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link  href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link  href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link  href="{{ asset('css/app.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: eBusiness - v4.9.1
  * Template URL: https://bootstrapmade.com/ebusiness-bootstrap-corporate-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    @include('include.navbar')
<div class="content">
    @yield('content')
</div>
    @include('include.footer')


  <!-- Vendor JS Files -->
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/glightbox/js/glightbox.min.js"></script>
  <script src="vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="vendor/swiper/swiper-bundle.min.js"></script>
  <script src="vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="js/main.js"></script>

</body>

</html>