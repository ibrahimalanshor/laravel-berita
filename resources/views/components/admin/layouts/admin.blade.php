@extends('admin.layouts.base')

@section('content')
    <div>
        <x-admin.sidebar />

        <main>
            @yield('main')
        </main>
    </div>
@endsection