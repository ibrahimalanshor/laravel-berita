<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? config('app.name') }}</title>

        @if (isset($description))
            <meta name="description" content="{{ $description }}">
        @endif

        <link rel="icon" type="image/png" sizes="16x16" href="{{ setting('icon_url') }}">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
    </head>
    <body>
        <nav class="bg-neutral-900 h-14 lg:h-15 flex items-center justify-center fixed top-0 left-0 w-full">
            <x-includes.logo class="max-h-6" />
        </nav>
        @yield('content')

        @livewireScripts

        @stack('scripts')
    </body>
</html>
