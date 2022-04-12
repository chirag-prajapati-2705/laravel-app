<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://d19vzq90twjlae.cloudfront.net/leaflet-0.7/leaflet.css" />
        <title>{{ config('app.name','Laravel')  }}</title>
        <!-- Fonts -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        <script src="https://d19vzq90twjlae.cloudfront.net/leaflet-0.7/leaflet.js"></script>
    </head>
    <body>
        <div id="app">
            <router-view></router-view>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
