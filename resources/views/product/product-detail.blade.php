<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Product Detail</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Tailwind CSS v4 -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="antialiased">
        <div id="app">
            <header-component></header-component>
            <!-- Vue component for product detail -->
            <product-detail :product-id="{{ $productId ?? 1 }}"></product-detail>
            <footer-component></footer-component>
        </div>

        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
