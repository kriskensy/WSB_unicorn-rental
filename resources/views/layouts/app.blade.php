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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex flex-col min-h-screen font-sans antialiased">

<!--navbar -->
@include('layouts.navigation')

<!-- main content-->
<div
    class="relative flex-1 flex flex-col bg-cover bg-no-repeat bg-top"
    style="
            background-image: url('{{ asset('images/img_homepage.png') }}');
            background-position: top center;
            padding-top: 4.5rem;
        "
>
    <!--overlay-->
    <div class="absolute inset-0 w-full h-full bg-black bg-opacity-50 z-10 pointer-events-none"></div>

    @isset($header)
        <header class="relative z-20 bg-white dark:bg-gray-800 shadow bg-opacity-80 dark:bg-opacity-80">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

    <main class="relative z-20 flex-1 flex flex-col items-center justify-center">
        @yield('content')
    </main>

    <x-footer />
</div>

</body>
</html>
