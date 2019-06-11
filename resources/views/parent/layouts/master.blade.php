<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Parents Dashboard</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/parent/style.css') }}">

    @stack('css')
</head>

<body>

    @include('parent.partials.navbar')
    {{-- @include('parent.partials.header') --}}

    @yield('content')

    <script src="{{ asset('js/app.js') }}"></script>
    @stack('js')
</body>

</html>
