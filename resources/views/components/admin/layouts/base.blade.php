<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? setting('name') }}</title>

        <link rel="icon" type="image/png" sizes="16x16" href="{{ setting('icon_url') }}">

        @vite(['resources/css/admin.css', 'resources/js/admin.js'])

        @livewireStyles
    </head>
    <body>
        @yield('content')

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
