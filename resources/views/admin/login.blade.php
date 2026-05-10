@extends('admin.layouts.base')

@section('content')
    <div class="bg-neutral-50 text-neutral-900 min-h-screen flex flex-col items-center justify-center px-4">
        <nav class="bg-neutral-900 h-14 lg:h-15 flex items-center justify-center fixed top-0 left-0 w-full">
            <a href="{{ route('home') }}">
                <img src="{{ setting('logo_url') }}" class="h-6" alt="{{ setting('name') }}" />
            </a>
        </nav>
        <form class="bg-white shadow shadow-neutral-300 w-full rounded-md p-5 max-w-md flex flex-col gap-4">
            <div class="space-y-1">
                <h1 class="font-bold text-xl">Login ke Sistem</h1>
                <p class="text-neutral-600">Masukkan email dan password akun anda.</p>
            </div>

            <x-admin.base.form-item label="Email" id="login_email">
                <x-admin.base.input placeholder="Masukkan email" name="email" type="email" id="login_email" required />
            </x-admin.base.form-item>
            <x-admin.base.form-item label="Password" id="login_password">
                <x-admin.base.input placeholder="Masukkan password" name="password" type="password" id="login_password" required />
            </x-admin.base.form-item>

            <x-admin.base.button class="w-full">Login</x-admin.base.button>
        </form>
    </div>
@endsection