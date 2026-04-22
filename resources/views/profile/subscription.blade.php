@extends('layouts.profile')

@section('profile-content')
<section class="border border-neutral-300 rounded-md p-4 space-y-4">
    <div class="flex items-center justify-between">
        <h1 class="font-bold text-neutral-900 text-lg">Status Langganan</h1>
        @if ($user->subscription)
            @if ($user->subscription->expired)
                <span class="bg-red-100 text-red-800 text-sm font-medium px-2 py-1 rounded-md">
                    Expired
                </span>
            @else
                <span class="bg-green-100 text-green-800 text-sm font-medium px-2 py-1 rounded-md">
                    Aktif
                </span>
            @endif
        @endif
    </div>

    @if (!$user->subscription)
        <div>
            <p class="text-neutral-500">Belum ada langganan. <a href="{{ route('subscribe.index') }}" class="text-red-700 font-medium underline">Tambah Langganan</a>.</p>
        </div>
    @else
        <div class="bg-neutral-100 p-4 rounded-md flex flex-col gap-4 mb-4">
            <div class="flex flex-col gap-4 sm:flex-row sm:justify-between sm:items-center">
                <div>
                    <h2 class="font-bold text-lg text-neutral-900">Premium {{ $user->subscription->period === 'month' ? 'Bulanan' : 'Tahunan' }}</h2>
                    <p class="text-neutral-700 text-sm">Aktif sampai {{ formatDate($user->subscription->end_at, 'd F Y') }}</p>
                </div>
                <p class="text-red-700 font-bold text-xl sm:text-2xl">{{ number_format($user->subscription->price) }}/{{ $user->subscription->period === 'month' ? 'bulan' : 'tahun' }}</p>
            </div>
        </div>
    @endif
</section>

@if ($user->subscription->expired)
    <form id="perpanjang_langganan" class="border border-neutral-300 rounded-md p-4 space-y-4">
        <h2 class="font-bold text-neutral-900 text-lg">Perpanjang Langganan</h2>
        
        <x-subscribe.checkout />
        <div class="flex justify-end">
            <x-base.button color="primary" class="w-full sm:w-auto" icon="icon-[tabler--arrow-right]" icon-pos="right">Perpanjang</x-base.button>
        </div>
    </form>
@endif

@if ($subscriptions->count())
    <section class="border border-neutral-300 rounded-md p-4">
        <h2 class="font-bold text-neutral-900 text-lg">Riwayat Langganan</h2>

        <div class="divide-y divide-neutral-200">
            @foreach ($subscriptions as $subscription)
                <div class="flex flex-col gap-2 py-4 sm:flex-row sm:items-center sm:justify-between">
                    <div class="space-y-1">
                        <h3 class="font-medium text-neutral-900 flex items-center">
                            Premium {{ $subscription->period === 'month' ? 'Bulanan' : 'Tahunan' }}
                        </h3>
                        <p class="text-sm text-neutral-500">{{ formatDate($subscription->start_at, 'd F Y') }} s.d {{ $subscription->end_at ? formatDate($subscription->end_at, 'd F Y') : '-' }}</p>
                    </div>
                    <p class="font-bold text-red-700">{{ number_format($subscription->price) }}/{{ $subscription->period === 'month' ? 'bulan' : 'tahun' }}</p>
                </div>
            @endforeach
        </div>
    </section>
@endif

@endsection