<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? config('app.name') }}</title>

        <link rel="icon" type="image/png" sizes="16x16" href="{{ setting('icon_url') }}">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
    </head>
    <body>
        <div class="fixed inset-0 bg-black/50 hidden z-10" id="app-overlay"></div>
        
        <x-includes.navbar />

        <div class="pb-4">
            @yield('content')
        </div>

        <x-includes.footer />

        @livewireScripts

        @stack('scripts')
    </body>
</html>
