<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>{{ $title }}</title>

        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{ asset('venue-522') }}/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('venue-522') }}/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="{{ asset('venue-522') }}/css/fontAwesome.css">
        <link rel="stylesheet" href="{{ asset('venue-522') }}/css/hero-slider.css">
        <link rel="stylesheet" href="{{ asset('venue-522') }}/css/owl-carousel.css">
        <link rel="stylesheet" href="{{ asset('venue-522') }}/css/datepicker.css">
        <link rel="stylesheet" href="{{ asset('venue-522') }}/css/templatemo-style.css">

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">

        <script src="{{ asset('venue-522') }}/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
<!--
	Venue Template
	http://www.templatemo.com/tm-522-venue
-->
    </head>

<body>

    <div class="wrap">

        @include('partials.headerHome')

    </div>

    @yield('content')

    <div class="sub-footer">
        <p>Copyright &copy; 2022 {{ config('app.name') }}</p>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="{{ asset('venue-522') }}/js/vendor/bootstrap.min.js"></script>

    <script src="{{ asset('venue-522') }}/js/datepicker.js"></script>
    <script src="{{ asset('venue-522') }}/js/plugins.js"></script>
    <script src="{{ asset('venue-522') }}/js/main.js"></script>
</body>
</html>
