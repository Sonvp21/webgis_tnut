<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{ asset('homepage/images/tnut-logo.png') }}" type="image/x-icon" />
    <link rel="icon" href="{{ asset('homepage/images/tnut-logo.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="app-url" content="{{ config('app.url') }}">
    <title>{{ config('app.name', 'Map TNUT') }}</title>
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/map/map.js'])
    @livewireStyles
    @stack('styles')

</head>

<body class="font-sans antialiased">
    <div class="flex h-screen flex-col">
        <x-website.menu />
        <main class="flex-grow">
            {{ $slot }}
        </main>
    </div>
    @livewireScripts
    @stack('scripts_bottom')
</body>

</html>

