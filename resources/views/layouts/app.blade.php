<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/js/app.js'])
    <script type="text/javascript"> 
        document.documentElement.style.opacity = 0;
        window.onload = ()=>{ document.documentElement.style.opacity = 1; };
    </script>
</head>

<body>
    <div id="app">
        <routes-provider>
            <auth-provider csrf="{{ csrf_token() }}" :user='@json(Auth::user())'>
                <nav-bar></nav-bar>
                <main class="py-4">
                    @yield('content')
                </main>
            </auth-provider>
        </routes-provider>
    </div>
</body>

</html>
