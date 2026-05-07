@extends('layouts.auth')

@section('content')
<main class="min-h-screen flex flex-col items-center justify-center bg-neutral-50 px-4">
    <div class="max-w-sm flex flex-col items-center justify-center">
        <div class="space-y-4 flex flex-col border w-full border-neutral-300 p-4 bg-white rounded-md mb-4">
            @if ($intentedToCheckout)
                <x-base.alert color="warning" icon="icon-[tabler--alert-triangle-filled]">
                    Anda harus masuk untuk melanjutkan ke checkout.
                </x-base.alert>
            @endif
            <div class="space-y-1">
                <h1 class="font-bold text-xl text-neutral-900">Masuk atau Daftar</h1>
                <p class="text-neutral-700">Gunakan layanan di bawah ini untuk masuk ke {{ setting('name') }}.</p>
            </div>
            <x-base.button tag-name="a" href="{{ route('auth.google') }}" color="primary" icon="icon-[tabler--brand-google-filled]">Lanjutkan dengan Google</x-base.button>
        </div>
        <a href="{{ route('home') }}" class="text-sm text-neutral-700">Kembali ke beranda</a>
    </div>
</main>
@endsection