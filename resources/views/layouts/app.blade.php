<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- SEO Meta Tags from Configuration -->
    <title>{{ config_get('seo_title', site_name()) }}</title>
    <meta name="description" content="{{ config_get('seo_description', 'Welcome to ' . site_name()) }}">

    <!-- Favicon -->
    @if(config_get('favicon'))
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/' . config_get('favicon')) }}">
    @endif

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="{{ config_get('seo_title', site_name()) }}">
    <meta property="og:description" content="{{ config_get('seo_description') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    @if(site_logo())
    <meta property="og:image" content="{{ site_logo() }}">
    @endif

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <!-- Header Component -->
    @include('components.site-header')

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer Component -->
    @include('components.site-footer')
</body>
</html>
