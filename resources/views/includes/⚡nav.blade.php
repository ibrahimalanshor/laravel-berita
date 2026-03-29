<?php

use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component
{
    #[Computed]
    public function menus()
    {
        return [
            'News',
            'Bisnis',
            'Ekonomi',
            'Olahraga',
            'Pendidikan'
        ];
    }
};
?>

<nav class="bg-neutral-900 h-14 text-white">
    <livewire:base::container class="h-full flex items-center justify-between">
        <h1 class="sr-only">{{ $title ?? config('app.name') }}</h1>
        <button id="open-mobile-nav" class="flex items-center" aria-label="Buka Menu Navigasi" data-toggle="drawer" data-target="#nav-menu">
            <span class="icon-[tabler--menu-2] size-5"></span>
        </button>

        <a href="">
            <img src="{{ asset('logo.png') }}" alt="{{ $title ?? config('app.name') }}" class="size-12 shrink-0">
        </a>

        <button class="flex items-center" data-toggle="grid" data-target="#nav-action">
            <span class="icon-[tabler--search] size-5"></span>
        </button>

        <div class="fixed top-0 left-0 w-64 h-screen bg-white text-neutral-900 p-4 space-y-4 hidden z-20" id="nav-menu" data-click-outside-close="drawer" data-ignore="#open-mobile-nav">
            <button class="flex items-center ml-auto" aria-label="Tutup Menu Navigasi" data-toggle="drawer" data-target="#nav-menu">
                <span class="icon-[tabler--x] size-5"></span>
            </button>

            <livewire:base::button icon="icon-[tabler--brand-google-filled]">
                <p>Masuk dengan Google</p>
            </livewire:base::button>

            <livewire:base::button icon="icon-[tabler--bell-ringing-filled]" color="primary">
                <p>Berlangganan</p>
            </livewire:base::button>

            <hr class="border-neutral-200">

            <div class="flex flex-col gap-2">
                @foreach ($this->menus as $menu)
                    <a href="">{{ $menu }}</a>
                @endforeach
            </div>

            <hr class="border-neutral-200">

            <p class="text-sm text-neutral-700">Dengan berlangganan ke {{ $title ?? config('app.name') }}, Anda akan mendapatkan notifikasi langsung ke email Anda ketika ada artikel baru dari kami.</p>
        </div>

        <div id="nav-action" class="absolute top-14 bg-neutral-900 left-0 p-4 w-full hidden">
            <livewire:base::input
                size="custom"
                color="custom"
                type="search"
                name="Pencarian Berita"
                id="top-search" 
                placeholder="Pencarian"
                class="bg-white text-neutral-900 border-neutral-900 h-10 px-3 rounded-lg focus:border-neutral-900 bg-neutral-800 border-neutral-800 focus:border-neutral-400"
            />

            <button class="hidden">Berlangganan</button>
            <button class="hidden">Masuk</button>
        </div>
    </livewire:base::container>
</nav>