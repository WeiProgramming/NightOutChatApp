<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>@yield('title')</title>
        
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <script src="{{mix('js/app.js')}}"></script>   
    </head>
    <body class="internal-layout-default">
        @yield('content')
    </body>
</html>