<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{URL::to('src/css/main.css')}}" type="text/css">
    @yield('style')
</head>
<body>
    @include('includes.header')

    <div class="main">
         @yield('content')
    </div>

    @include('includes.footer')
</body>
</html>