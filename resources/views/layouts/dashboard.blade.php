<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <x-google-tags></x-google-tags>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body class="{{ set_body() }}">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KGZMMWX" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div id="app">
        <x-nav-top></x-nav-top>
        <x-notify-messages></x-notify-messages>
        <main class="main">
            <div class="wrapper">
                <div class="row flex">
                    <aside class="md-col-3">
                        <x-nav-sidebar></x-nav-sidebar>
                    </aside>
                    <div class="md-col-9">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
        <x-sponsors></x-sponsors>

        <x-footer></x-footer>
        <div class="scrollup">
            <div class="wrapper"><a href="#" class="scrollup__button" style="transform: translateY(0px);"></a></div>
        </div>
        <vue-progress-bar></vue-progress-bar>


    </div><!-- #app -->
</body>


</html>
