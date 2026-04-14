@extends('layouts.home')

@section('content')
<x-base.container>
    <section class="py-6 space-y-6">
        <div class="space-y-1">
            <h1 class="font-bold text-3xl text-neutral-900">Berlangganan Lararita</h1>
            <p class="text-neutral-700">Dengan berlangganan lararita anda akan mendapatkan manfaat-manfaat seperti notifikasi artikel terbaru, akses ke artikel premium, bebas iklan, dsb.</p>
        </div>
        <hr class="border-neutral-200">
        <div class="space-y-4">
            <h2 class="font-bold text-xl text-neutral-900">Pilih Paket Langganan</h2>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                @foreach ($packages as $package)
                    <article class="border border-neutral-200 rounded-md p-4 space-y-4">
                        <div class="space-y-2">
                            <h3 class="font-bold text-lg text-neutral-900">{{ $package->name }}</h3>
                            <p class="text-lg text-red-700 font-bold lg:text-xl">Rp {{ number_format($package->price) }}/bulan</p>
                            <p class="text-neutral-700 text-sm">Manfaat yang didapatkan:</p>
                            <ul class="space-y-1">
                                <li @class(['flex items-center gap-2', 'line-through opacity-50' => !$package->newsletter])>
                                    <span class="{{ $package->newsletter ? 'icon-[tabler--check] text-green-700' : 'icon-[tabler--x] text-red-700' }}"></span>
                                    <p class="text-neutral-900">Notifikasi email artikel terbaru</p>
                                </li>
                                <li @class(['flex items-center gap-2', 'line-through opacity-50' => !$package->no_ads])>
                                    <span class="{{ $package->no_ads ? 'icon-[tabler--check] text-green-700' : 'icon-[tabler--x] text-red-700' }}"></span>
                                    <p class="text-neutral-900">Bebas Iklan</p>
                                </li>
                                <li @class(['flex items-center gap-2', 'line-through opacity-50' => !$package->premium_articles])>
                                    <span class="{{ $package->premium_articles ? 'icon-[tabler--check] text-green-700' : 'icon-[tabler--x] text-red-700' }}"></span>
                                    <p class="text-neutral-900">Akses ke artikel premium sepuasnya</p>
                                </li>
                            </ul>
                        </div>
                        <x-base.button tag-name="a" href="{{ route('subscribe.checkout', ['package' => $package->slug]) }}" :color="$package->featured ? 'primary' : 'bordered'" class="w-full">Mulai Berlangganan</x-base.button>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
</x-base.container>
@endsection