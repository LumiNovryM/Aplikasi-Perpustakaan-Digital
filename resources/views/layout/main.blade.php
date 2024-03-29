<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700">

    {{-- Navbar --}}
    @include('components.header')

    @yield('content')

    {{-- Footer --}}
    @include('components.footer')

</body>

</html>
