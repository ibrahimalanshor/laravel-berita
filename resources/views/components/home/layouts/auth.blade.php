<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? setting('name') }}</title>

        @if (isset($description))
            <meta name="description" content="{{ $description }}">
        @endif

        <meta name="robots" content="noindex, nofollow">

        <link rel="icon" type="image/png" sizes="16x16" href="{{ setting('icon_url') }}">

        @vite(['resources/css/home.css', 'resources/js/home.js'])

        @livewireStyles
    </head>
    <body>
        <nav class="bg-neutral-900 h-14 lg:h-15 flex items-center justify-center fixed top-0 left-0 w-full">
            <a href="{{ route('home') }}">
                <x-home.includes.logo class="max-h-6" alt="{{ setting('name') }}" />
            </a>
        </nav>
        @yield('content')

        @livewireScripts

        @stack('scripts')
    </body>
</html>
