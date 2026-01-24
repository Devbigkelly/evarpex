<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-pwa="true">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <meta name="description" content="@yield('meta_description', get_setting('meta_description'))" />
    <meta name="keywords" content="@yield('meta_keywords', get_setting('meta_keywords'))">
    <title>@yield('meta_title', get_setting('website_name') . ' | ' . get_setting('site_motto'))</title>

    <!-- Webmanifest + Favicon / App icons -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="manifest" href="manifest.json">
    <!-- Favicon -->
    @php
        $site_icon = uploaded_asset(get_setting('site_icon'));
    @endphp
    <link rel="icon" href="{{ $site_icon }}">
    <link rel="apple-touch-icon" href="{{ $site_icon }}">

     <link rel="stylesheet" href="{{ asset('asset/icons/cartzilla-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/vendor/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/theme.min.css') }}">

</head>


<!-- Body -->

<body>


 @yield('content')

  

 
<script src="{{ asset('asset/js/theme.min.js') }}"></script>


</body>

</html>