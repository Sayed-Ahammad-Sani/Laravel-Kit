<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    <style>
        .app-container {
            display: none;
        }
    </style>
    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    {{-- <div id="pre-loader">
        <img src="{{asset('img/pre-loader.gif')}}" />
    </div> --}}
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">

        {{-- header --}}
        @include('layouts.back_end.partials.header')

        <div class="app-main">

            {{-- sidebar --}}
            @include('layouts.back_end.partials.side_bar')

            <div class="app-main__outer">
                <div class="app-main__inner">
                    @yield('dashboard-inner-content')
                </div>

                {{-- footer --}}
                @include('layouts.back_end.partials.footer')

            </div>
            <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>

        <!-- Page Content -->
        {{-- <main>
            {{ $slot }}
        </main> --}}
    </div>

    @stack('modals')
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/demo.js')}}"></script>
    <script src="{{asset('js/scrollbar.js')}}"></script>
    <script src="{{asset('js/chart_js.js')}}"></script>
    <style>
        .app-header__logo .logo-src {
            height: 23px;
            width: 97px;
            background: url(https://ahammadit.com/wp-content/uploads/2022/11/ahammad-it-logo.png);
            background-size: contain;
            background-repeat: no-repeat;
        }
    </style>
    @livewireScripts
</body>

</html>