<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Maxmoll Orders Test | @yield('title', 'Home')</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous">

    @section('headerScripts')
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @show

</head>
<body>

@include('components.nav')

<div class="container">
    @yield('content')
</div>

@section('footerScripts')
    <script src="{{ asset('js/app.js') }}"></script>
@show

</body>
</html>
