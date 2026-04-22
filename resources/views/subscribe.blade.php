@extends('layouts.home')

@section('content')
<x-base.container>
    <section class="py-6 space-y-6 sm:py-8 lg:py-10">
        <div class="space-y-2">
            <h1 class="font-bold text-3xl text-neutral-900">Berlangganan Lararita Premium</h1>
            <p class="text-neutral-700">Dengan berlangganan lararita anda akan mendapatkan manfaat-manfaat seperti notifikasi artikel terbaru, akses ke artikel premium, bebas iklan, dsb.</p>
        </div>

        <div class="grid gap-4 sm:grid-cols-3">
            @php
                $featureIcons = [
                    'newsletter' => 'icon-[tabler--mail]',
                    'no_ads' => 'icon-[tabler--ad-off]',
                    'premium_articles' => 'icon-[tabler--news]'
                ];   
            @endphp
            @foreach ($features as $feature => $detail)
                <div class="bg-neutral-100 rounded-md p-4 space-y-2">
                    <span class="{{ $featureIcons[$feature] }} size-6 text-red-700"></span>
                    <div class="space-y-1">
                        <h2 class="font-bold text-lg text-neutral-900">{{ $detail['title'] }}</h2>
                        <p class="text-neutral-600">{{ $detail['description'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <form class="space-y-4" method="POST" action="{{ route('subscribe.checkout') }}">
            @csrf
            <h2 class="font-bold text-xl text-neutral-900">Pilih Paket Langganan</h2>
            <x-subscribe.checkout />
            <div class="flex justify-end">
                <x-base.button :disabled="$hasSubscription" color="primary" icon="icon-[tabler--arrow-right]" icon-pos="right" class="w-full sm:w-auto">
                    {{ $hasSubscription ? 'Sudah Berlangganan' : 'Berlangganan' }}
                </x-base.button>
            </div>
        </form>
    </section>
</x-base.container>
@endsection