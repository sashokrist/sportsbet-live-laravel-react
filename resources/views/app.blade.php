<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sports App</title>
    @viteReactRefresh
    @vite(['resources/js/app.jsx'])
</head>
<body class="antialiased">
    <div id="app"></div>
     @stack('scripts')
</body>
</html>
