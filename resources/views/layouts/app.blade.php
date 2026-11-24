<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WiseKrime - @yield('title')</title>

    <!-- Общие стили -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">

    <!-- Стили конкретной страницы -->
    @stack('styles')
</head>
<body>

<x-header />

<main>
    @yield('content')
</main>

<x-footer />

@stack('scripts')

</body>
</html>
