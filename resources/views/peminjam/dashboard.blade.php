<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="canonical" href="https://https://demo.themesberg.com/landwind/" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PustakaPlus</title>

    {{-- Favicon --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('asset/images/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('asset/images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('asset/images/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('asset/site.webmanifest') }}">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    {{-- TailwindCSS --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    {{-- Header --}}
    @include('layout.landing.header')

    {{-- Jumbotron --}}
    @include('layout.landing.jumbotron')

    {{-- Description --}}
    @include('layout.landing.desc')

    {{-- List Buku --}}
    @include('layout.landing.list-buku')

    {{-- Footer --}}
    @include('layout.landing.footer')
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
</body>

</html>
