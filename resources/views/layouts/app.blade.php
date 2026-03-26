<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? config('app.name') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
    </head>
    <body>
        <nav>
            <a href="">
                <img src="{{ asset('logo.png') }}" alt="">
            </a>

            <input type="search" name="Pencarian Berita" id="top-search" placeholder="Pencarian">

            <button>Berlangganan</button>
            <button>Masuk</button>
        </nav>

        <livewire:includes::navtag />

        {{ $slot }}

        @livewireScripts
    </body>
</html>
