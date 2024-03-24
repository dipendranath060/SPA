<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title')</title>
	<meta name="description" content="@yield('meta_description')">
	<meta name="og_image" property="og:image" content="@yield('image')" />
	<meta name="twitter:card" content="@yield('image')">
	<meta name="twitter:title" content="Spa">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-4.1.2/bootstrap.min.css') }}">
	<link href="{{ asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/jquery-datepicker/jquery-ui.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/css/frontstyle.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main_styles.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/about.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/blog.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/contact.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/services.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main_responsive.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/about_responsive.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/services_responsive.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/blog_responsive.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/contact_responsive.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/image-comparison-slider-master/style.css') }}">
	<link rel="icon" href="{{ asset('assets/images/logo.png') }}" />
</head>

<body>
    @include('layouts.inc.front-navbar')

    @yield('content')

    @include('layouts.inc.footer')

    <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/css/bootstrap-4.1.2/popper.js') }}"></script>
    <script src="{{ asset('assets/css/bootstrap-4.1.2/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/easing/easing.js') }}"></script>
    <script src="{{ asset('plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
    <script src="{{ asset('assets/js/frontscript.js') }}"></script>
    <script src="{{ asset('plugins/parallax-js-master/parallax.min.js') }}"></script>

    @yield('scripts')
  </body>
</body>