@extends('layouts.home')

@section('content')
<x-base.container>
    <section class="py-6 max-w-prose space-y-6 sm:py-8 lg:py-10">
        <div class="space-y-2">
            <h1 class="font-bold text-3xl text-neutral-900">Checkout Berlangganan Paket {{ $package->name }}</h1>
            <p class="text-neutral-700">Konfirmasi berlangganan paket {{ $package->name }} dengan melakukan pembayaran melalui metode yang tersedia.</p>
        </div>

        <form class="flex flex-col gap-4 items-center justify-between border p-4 border-neutral-200 rounded-lg sm:flex-row">
            <p class="font-bold text-red-600 text-2xl">Total Harga: {{ number_format($package->price) }}</p>
            <x-base.button color="primary" icon="{{ $package->price === 0 ? 'icon-[tabler--check]' : 'icon-[tabler--credit-card-filled]' }}" type="submit">
                {{ $package->price === 0 ? 'Berlangganan Gratis' : 'Lanjutkan Pembayaran' }}
            </x-base.button>
        </form>
    </section>
</x-base.container>
@endsection