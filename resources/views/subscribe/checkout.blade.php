@extends('layouts.home')

@section('content')
<x-base.container>
    <section>
        <h1>Checkout Berlangganan Paket {{ $package->name }}</h1>
        <p>Konfirmasi berlangganan paket {{ $package->name }} dengan melakukan pembayaran melalui metode yang tersedia.</p>

        <div>
            <h2>Total Harga: {{ number_format($package->price) }}</h2>
        </div>

        <form>
            <h2>Email</h2>
            <p>Masukkan email Anda untuk menerima notifikasi dan informasi terkait langganan Anda.</p>
            <x-base.input type="email" name="email" placeholder="Email Anda" class="w-full" />
            <x-base.button color="primary" class="w-full">
                <p>Bayar Sekarang</p>
            </x-base.button>
        </form>
    </section>
</x-base.container>
@endsection