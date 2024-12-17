<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @laravelPWA
    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="font-sans text-gray-900 antialiased">
    <div
        class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-tl from-green-400 via-green-600 to-green-800">
        <img src="{{ asset('images/lucena_bg.jpg') }}" class="fixed top-0 left-0 right-0 w-full opacity-15"
            alt="">
        <div>
            <a href="/">
                <x-application-logo class="w-40 h-40 fill-current text-gray-500" />
            </a>
        </div>

        <div
            class="w-full {{ request()->routeIs('register') ? 'sm:max-w-xl' : 'sm:max-w-md' }} mt-6 px-6 py-8 relative bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div>
                <h1 class="text-xl text-gray-600"><span class="text-green-700 font-semibold">SWM</span> |
                    @yield('title') </h1>
            </div>
            <div class="mt-5">
                {{ $slot }}
            </div>
        </div>
    </div>
    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>
