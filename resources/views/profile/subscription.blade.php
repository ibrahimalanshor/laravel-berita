@extends('layouts.profile')

@section('profile-content')
<section class="border border-neutral-300 rounded-md p-4 space-y-4">
    <h1 class="font-bold text-neutral-900 text-lg">Status Langganan</h1>

    @if (!$user->subscription)
        <div>
            <p class="text-neutral-500">Belum ada langganan. <a href="{{ route('subscribe.index') }}" class="text-red-700 font-medium underline">Tambah Langganan</a>.</p>
        </div>
    @else
        <div class="bg-neutral-100 p-4 rounded-md flex flex-col gap-4 mb-4 sm:mb-0">
            <div class="flex flex-col gap-4 sm:flex-row sm:justify-between sm:items-center">
                <div>
                    <h2 class="font-bold text-lg text-neutral-900">Premium {{ $user->subscription->period === 'month' ? 'Bulanan' : 'Tahunan' }}</h2>
                    <p class="text-neutral-700 text-sm">Aktif sampai {{ $user->subscription->end_at ? formatDate($user->subscription->end_at, 'd F Y') : 'selamanya' }}</p>
                </div>
                <p class="text-red-700 font-bold text-xl sm:text-2xl">{{ number_format($user->subscription->package_price) }}/bulan</p>
            </div>
        </div>
    @endif
</section>

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
                <p class="font-bold text-red-700">{{ number_format($subscription->package_price) }}/bulan</p>
            </div>
        @endforeach
    </div>
</section>
@endsection