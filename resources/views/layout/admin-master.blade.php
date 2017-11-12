<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin area</title>
    <link rel="stylesheet" href="{{URL::to('src/css/admin.css')}}" type="text/css">
    @yield('style')
</head>
<body>
@include('includes.admin-header')

    @yield('content')

</body>
</html>