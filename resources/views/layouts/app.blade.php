<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="{{ __('Fundora is an international real estate investment intermediary brand that connects investors with high-quality property opportunities around the world. Our mission is to help clients achieve sustainable value growth through smart real estate investments in Europe (Spain, Northern Cyprus), Asia (Indonesia, Vietnam, Cambodia).') }}">
    <meta name="keywords" content="fundora, fundora global, fundoraglobal">

    @hasSection('pageTitle')
        <title>@yield('pageTitle') - {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif

    <link rel="icon" href="{{ asset('images/fundora-logo.jpg') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (config('app.env') == 'production' && is_file('build/manifest.json'))
        <link href="{{ asset('build/assets/app-C0aUFJx3.css') }}" rel="stylesheet">
    @else
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    @stack('styles')
</head>

<body class="min-h-screen min-w-100 bg-secondary-color pt-20">
    @auth
        @include('layouts.partials.settings_button')
    @endauth
    @include('layouts.partials.header')
    @include('layouts.partials.session_messages')
    @yield('content')
    @include('layouts.partials.footer')

    @if (config('app.env') == 'production' && is_file('build/manifest.json'))
        <script src="{{ asset('build/assets/app-Bf4POITK.js') }}"></script>
    @endif

    @stack('scripts')
</body>

</html>
