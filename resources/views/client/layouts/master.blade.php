<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        @yield('title')
        <link href="{{ asset("/fontend/css/bootstrap.min.css") }}" rel="stylesheet">
        <link href="{{ asset("/fontend/css/font-awesome.min.css") }}" rel="stylesheet">
        <link href="{{ asset("/fontend/css/prettyPhoto.css") }}" rel="stylesheet">
        <link href="{{ asset("/fontend/css/price-range.css") }}" rel="stylesheet">
        <link href="{{ asset("/fontend/css/animate.css") }}" rel="stylesheet">
        <link href="{{ asset("/fontend/css/main.css") }}" rel="stylesheet">
        @yield('css')
    </head>
    <body>
        @include('client.components.header')

        @yield('content')
        @include('client.components.footer')
        <script src="{{ asset("/fontend/js/jquery.js") }}"></script>
        <script src="{{ asset("/fontend/js/bootstrap.min.js") }}"></script>
        <script src="{{ asset("/fontend/js/jquery.scrollUp.min.js") }}"></script>
        <script src="{{ asset("/fontend/js/price-range.js") }}"></script>
        <script src="{{ asset("/fontend/js/jquery.prettyPhoto.js") }}"></script>
        <script src="{{ asset("/fontend/js/main.js") }}"></script>
        @yield('js')
    </body>
</html>
