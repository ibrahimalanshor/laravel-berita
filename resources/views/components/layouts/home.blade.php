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
        <div class="fixed inset-0 bg-black/50 hidden z-20" id="app-overlay"></div>
        
        <x-includes.navbar />

        <main class="pb-4">
            @yield('content')
        </main>

        <x-includes.footer />

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
