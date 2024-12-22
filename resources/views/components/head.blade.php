<!DOCTYPE html>
<html
  lang="{{ str_replace('_', '-', app()->getLocale()) }}"
  dir="{{(App::isLocale('ar') ? 'rtl' : 'ltr')}}"
>
  <head>
    <meta charset="utf-8">
    <title>Git Startup | @yield('title')</title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="author" content="Git Startup">
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicon/logo.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon/logo.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon/logo.png') }}">
    <link rel="manifest" href="{{ asset('assets/favicon/site.webmanifest') }}">
    <link rel="mask-icon" color="#6366f1" href="{{ asset('assets/favicon/safari-pinned-tab.svg') }}">
    <meta name="msapplication-TileColor" content="#080032">
    <meta name="theme-color" content="white">
    <!-- Page loading scripts-->
    <script>
      let mode = window.localStorage.getItem('mode'),
          root = document.getElementsByTagName('html')[0];
      if (mode !== undefined && mode === 'dark') {
      root.classList.add('dark-mode');
      } else {
      root.classList.remove('dark-mode');
      }
    </script>
    <script>
      (function () {
        window.onload = function () {
          const preloader = document.querySelector('.page-loading');
          preloader.classList.remove('active');
          setTimeout(function () {
            preloader.remove();
          }, 1500);
        };
      })();
    </script>
    <!-- Import Google Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    <!-- Vendor styles-->
    <link rel="stylesheet" media="screen" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}"/>
    <link rel="stylesheet" media="screen" href="{{ asset('assets/vendor/aos/dist/aos.css') }}"/>
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="{{ asset('assets/css/theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  </head>

  <body>