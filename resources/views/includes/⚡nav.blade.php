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

<nav class="bg-neutral-900 h-14 text-white lg:h-15 sticky top-0 z-10">
    <livewire:base::container class="h-full flex items-center justify-between">
        <h1 class="sr-only">{{ $title ?? config('app.name') }}</h1>
        <button class="open-nav-menu flex items-center sm:hidden" aria-label="Buka Menu Navigasi" data-toggle="drawer" data-target="#nav-menu">
            <span class="icon-[tabler--menu-2] size-5"></span>
        </button>

        <div class="flex items-center gap-4">
            <button class="open-nav-menu hidden sm:flex sm:items-center lg:hidden" aria-label="Buka Menu Navigasi" data-toggle="dropdown" data-target="#nav-menu">
                <span class="icon-[tabler--menu-2] size-5"></span>
            </button>
            <a href="">
                <img src="{{ asset('logo.png') }}" alt="{{ $title ?? config('app.name') }}" class="size-12 shrink-0">
            </a>
        </div>

        <button class="flex items-center sm:hidden" data-toggle="grid" aria-label="Buka Pencarian" data-target="#nav-action">
            <span class="icon-[tabler--search] size-5"></span>
        </button>

        <div class="
            fixed top-0 left-0 w-64 h-screen bg-white text-neutral-900 p-4 space-y-4 hidden z-20
            sm:absolute sm:top-16 sm:rounded-md sm:left-4 sm:h-auto sm:border sm:border-neutral-300 sm:shadow-lg sm:shadow-black/50 sm:space-y-0
            lg:static lg:flex lg:top-0 lg:left-0 lg:w-auto lg:bg-transparent lg:text-white lg:border-0 lg:shadow-none
        " id="nav-menu" data-click-outside-close="drawer" data-ignore=".open-nav-menu">
            <button class="flex items-center ml-auto sm:hidden" aria-label="Tutup Menu Navigasi" data-toggle="drawer" data-target="#nav-menu">
                <span class="icon-[tabler--x] size-5"></span>
            </button>

            <livewire:base::button icon="icon-[tabler--brand-google-filled]" color="bordered" class="w-full sm:hidden">
                <p>Masuk dengan Google</p>
            </livewire:base::button>

            <livewire:base::button icon="icon-[tabler--bell-ringing-filled]" color="primary" class="w-full sm:hidden">
                <p>Berlangganan</p>
            </livewire:base::button>

            <hr class="border-neutral-300 sm:hidden">

            <div class="flex flex-col gap-2 font-medium lg:flex-row lg:gap-6">
                @foreach ($this->menus as $menu)
                    <a href="" class="lg:hover:text-neutral-400">{{ $menu }}</a>
                @endforeach
            </div>

            <hr class="border-neutral-300 sm:hidden">

            <p class="text-sm text-neutral-700 sm:hidden">Dengan berlangganan ke {{ $title ?? config('app.name') }}, Anda akan mendapatkan notifikasi langsung ke email Anda ketika ada artikel baru dari kami.</p>
        </div>

        <div id="nav-action" class="absolute top-14 bg-neutral-900 left-0 p-4 w-full hidden sm:static sm:p-0 sm:bg-transparent sm:w-auto sm:flex sm:gap-2">
            <livewire:base::input
                size="custom"
                color="custom"
                type="search"
                name="Pencarian Berita"
                id="top-search" 
                placeholder="Pencarian"
                class="bg-white text-neutral-900 border-neutral-900 h-10 px-3 rounded-lg focus:border-neutral-900 sm:h-9 sm:rounded-md sm:bg-neutral-800 sm:border-neutral-800 sm:focus:border-neutral-400"
            />

            <livewire:base::button icon="icon-[tabler--bell-ringing-filled]" color="primary" class="hidden sm:flex items-center" size="sm" :ignoreDisplay="true">
                <p>Berlangganan</p>
            </livewire:base::button>

            <livewire:base::button icon="icon-[tabler--brand-google-filled]" color="light" class="hidden sm:flex items-center" size="sm" :ignoreDisplay="true">
                <p>Masuk</p>
            </livewire:base::button>
        </div>
    </livewire:base::container>
</nav>