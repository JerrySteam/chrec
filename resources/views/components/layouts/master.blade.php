<!DOCTYPE html>
<html lang="en">

  <head>
      <meta charset="utf-8">
      <title>CHREC | {{ $title}} </title>
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <meta content="CHREC, ethical approval, IRB, Covenant University" name="keywords">
      <meta content="CHREC website and ethical approval application portal" name="description">
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <!-- Favicon -->
      <link href="{{ asset('@assets/img/favicon.png') }}" rel="icon">

      <!-- CSS Libraries and custom styles -->
      <x-layouts.styles />
  </head>

  <body>
    <!-- Topbar Start -->
    <x-layouts.topbar />
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <x-layouts.navbar :menutitle="strtolower($menutitle)" />
    <!-- Navbar End -->

    {{$slot}}

    <!-- Footer Start -->
    <x-layouts.footer />
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <!-- JavaScript Libraries -->
    <x-layouts.scripts />
  </body>
</html>