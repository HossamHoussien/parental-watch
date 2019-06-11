<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Authentication</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Login" name="description" />
    <meta content="" name="author" />
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    @stack('css')
</head>

<body class="@yield('bodyClasses')">

    @yield('content')

    @stack('js')
</body>

</html>
