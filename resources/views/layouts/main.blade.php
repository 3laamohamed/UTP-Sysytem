{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}

{{--<head>--}}
{{--  <meta charset="UTF-8">--}}
{{--  <meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
{{--  <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--  <title>Home</title>--}}
{{--  @if(isset($about->logo))--}}
{{--  <link rel="icon" href="{{URL::asset('Admin/About/' . $about->logo)}}" type="image/x-icon" />--}}
{{--  @endif--}}
{{--  <!-- CSS only -->--}}
{{--  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"--}}
{{--    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">--}}

{{--  <link rel="stylesheet" href="{{ asset('global/css/lightgallery-bundle.min.css')}}">--}}
{{--  <link rel="stylesheet" href="{{ asset('global/css/all.min.css')}}">--}}
{{--  <link rel="stylesheet" href="{{ asset('global/css/owl.carousel.min.css')}}">--}}
{{--  <link rel="stylesheet" href="{{ asset('global/css/style.css')}}">--}}

{{--  <!-- JavaScript Bundle with Popper -->--}}
{{--    <script src="{{ asset('js/app.js') }}"></script>--}}
{{--    <script src="{{ asset('global/js/jquery-3.5.1.min.js') }}"></script>--}}
{{--    <script src="{{ asset('global/js/owl.carousel.min.js') }}"></script>--}}
{{--    <script src="{{ asset('global/js/lightgallery.min.js') }}"></script>--}}

{{--    <script src="{{ asset('global/js/sweetalert2@10.js') }}"></script>--}}
{{--</head>--}}
{{--<body>--}}
<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>
        @php
          if(isset($title))
          {
          echo 'UTP | ' . $title;
          }
          else{
          echo 'UTP | System';
          }
        @endphp</title>
      <!-- Bootstrap v5.2.0 -->
      <link rel="stylesheet" href="{{asset('global/css/bootstrap.min.css')}}">
      <!-- FontAwesome v6.2.0 -->
      <link rel="stylesheet" href="{{asset('global/css/fontawesome.min.css')}}">
      <!-- Owl Carousel v2.3.4 -->
      <link rel="stylesheet" href="{{asset('global/css/owl.carousel.min.css')}}">
      <!-- Main Style -->
      <link rel="stylesheet" href="{{asset('global/css/style.css')}}">
      <!-- Jquery v3.5.1 -->
      <script src="{{asset('global/js/jquery-3.5.1.min.js')}}"></script>
      <!-- Bootstrap v5.2.0 -->
      <script src="{{asset('global/js/bootstrap.bundle.min.js')}}"></script>
      <!-- Owl Carousel v2.3.4 -->
      <script src="{{asset('global/js/owl.carousel.min.js')}}"></script>
      <!-- isotope v3.0.6 -->
      <script src="{{asset('global/js/isotope.pkgd.min.js')}}"></script>
    </head>
    <body>
      @include('layouts.nav')
      @yield('content')
      @include('layouts.footer')
      <!-- Main Script -->
      <script src="{{asset('global/js/main.js')}}"></script>
    </body>
</html>
