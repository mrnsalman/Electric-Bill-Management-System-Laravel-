<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="{{asset('/')}}/easier/img/favicon.png" type="image/png" />
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('/')}}/easier/css/bootstrap.css" />
    <link rel="stylesheet" href="{{asset('/')}}/easier/vendors/linericon/style.css" />
    <link rel="stylesheet" href="{{asset('/')}}/easier/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{asset('/')}}/easier/css/themify-icons.css" />
    <link rel="stylesheet" href="{{asset('/')}}/easier/css/flaticon.css" />
    <link rel="stylesheet" href="{{asset('/')}}/easier/vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="{{asset('/')}}/easier/vendors/lightbox/simpleLightbox.css" />
    <link rel="stylesheet" href="{{asset('/')}}/easier/vendors/nice-select/css/nice-select.css" />
    <link rel="stylesheet" href="{{asset('/')}}/easier/vendors/animate-css/animate.css" />
    <link rel="stylesheet" href="{{asset('/')}}/easier/vendors/jquery-ui/jquery-ui.css" />
    <!-- main css -->
    <link rel="stylesheet" href="{{asset('/')}}/easier/css/style.css" />
    <link rel="stylesheet" href="{{asset('/')}}/easier/css/responsive.css" />
</head>

<body>
<!--================Header Menu Area =================-->
@include('easier.includes.header')
<!--================Header Menu Area =================-->


@yield('content')

<!--================ start footer Area  =================-->
@include('easier.includes.footer')
<!--================ End footer Area  =================-->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('/')}}/easier/js/jquery-3.2.1.min.js"></script>
<script src="{{asset('/')}}/easier/js/popper.js"></script>
<script src="{{asset('/')}}/easier/js/bootstrap.min.js"></script>
<script src="{{asset('/')}}/easier/js/stellar.js"></script>
<script src="{{asset('/')}}/easier/vendors/lightbox/simpleLightbox.min.js"></script>
<script src="{{asset('/')}}/easier/vendors/nice-select/js/jquery.nice-select.min.js"></script>
<script src="{{asset('/')}}/easier/vendors/isotope/imagesloaded.pkgd.min.js"></script>
<script src="{{asset('/')}}/easier/vendors/isotope/isotope-min.js"></script>
<script src="{{asset('/')}}/easier/vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="{{asset('/')}}/easier/js/jquery.ajaxchimp.min.js"></script>
<script src="{{asset('/')}}/easier/vendors/counter-up/jquery.waypoints.min.js"></script>
<script src="{{asset('/')}}/easier/vendors/counter-up/jquery.counterup.js"></script>
<script src="{{asset('/')}}/easier/js/mail-script.js"></script>
<script src="{{asset('/')}}/easier/js/theme.js"></script>
</body>

</html>
