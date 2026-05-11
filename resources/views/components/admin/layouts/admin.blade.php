@extends('admin.layouts.base')

@section('content')
    <div class="fixed inset-0 bg-black/50 hidden z-20" id="app-overlay"></div>
    <div class="min-h-screen bg-neutral-100">
        <x-admin.sidebar />

        <main class="lg:ml-72">
            <x-admin.navbar />

            @yield('main')
        </main>
    </div>
@endsection