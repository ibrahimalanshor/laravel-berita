@extends('layouts.profile')

@section('profile-content')
<section class="border border-neutral-300 rounded-md p-4 space-y-4">
    <h1 class="font-bold text-neutral-900 text-lg">Status Langganan</h1>

    @if (!$user->subscription)
        <div>
            <p class="text-neutral-500">Belum ada langganan. <a href="{{ route('subscribe.index') }}" class="text-red-700 font-medium underline">Tambah Langganan</a>.</p>
        </div>
    @else
        <div class="bg-neutral-100 p-4 rounded-md flex flex-col gap-4">
            <div class="flex flex-col gap-4 sm:flex-row sm:justify-between sm:items-center">
                <div>
                    <h2 class="font-bold text-lg text-neutral-900">{{ $user->subscription->package_name }}</h2>
                    <div class="text-sm flex items-center gap-2 text-neutral-700">
                        <p >{{ $user->subscription->premium ? 'Premium' : 'Gratis' }}</p>
                        <p class="text-neutral-300">|</p>
                        <p>Aktif sampai 19 Mei 2026</p>
                    </div>
                </div>
                <p class="text-red-700 font-bold text-xl sm:text-2xl">{{ number_format($user->subscription->package_price) }}/bulan</p>
            </div>

            <x-subscription-package.benefit-list :package="$user->subscription->package" />
        </div>
    @endif
</section>
@endsection