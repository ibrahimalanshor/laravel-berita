<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? setting('name') }}</title>

        @isset($description)
            <meta name="description" content="{{ $description }}">
        @endisset

        <meta name="author" content="{{ $author ?? setting('name') }}">
        <meta name="robots" content="{{ $robots ?? 'index, follow' }}">

        <meta property="og:type" content="article">
        <meta property="og:title" content="{{ $title ?? setting('name') }}">
        <meta property="og:description" content="{{ $description ?? '' }}">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:image" content="{{ $banner ?? setting('banner_url') }}">
        <meta property="og:site_name" content="{{ setting('name') }}">

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $title ?? setting('name') }}">
        <meta name="twitter:description" content="{{ $description ?? '' }}">
        <meta name="twitter:image" content="{{ $banner ?? setting('banner_url') }}">
        
        <link rel="canonical" href="{{ url()->current() }}">

        <link rel="icon" type="image/png" sizes="16x16" href="{{ setting('icon_url') }}">

        @isset($structuredData)
            {!! generateStructuredData($structuredData) !!}
        @endisset

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
    </head>
    <body>
        <div class="fixed inset-0 bg-black/50 hidden z-20" id="app-overlay"></div>
        
        <div class="flex flex-col justify-between min-h-screen">
            <div>
                <x-includes.navbar />

                <main class="pb-16">
                    @yield('content')
                </main>
            </div>

            <x-includes.footer />
        </div>

        @livewireScripts

        <script>
            window.addEventListener('load', function () {
                @if (session('message'))
                    Swal.fire({
                        title: '{{ session('message') }}',
                        icon: 'success',
                        confirmButtonText: 'Tutup'
                    })
                @endif
            })
        </script>

        @stack('scripts')
    </body>
</html>
