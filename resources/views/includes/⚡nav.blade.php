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
        <button id="open-mobile-menu" class="flex items-center" aria-label="Buka Menu Navigasi">
            <span class="icon-[tabler--menu-2] size-5"></span>
        </button>

        <a href="">
            <img src="{{ asset('logo.png') }}" alt="{{ $title ?? config('app.name') }}" class="size-12 shrink-0">
        </a>

        <button class="flex items-center">
            <span class="icon-[tabler--search] size-5"></span>
        </button>

        <div class="fixed top-0 left-0 w-64 h-screen bg-white text-neutral-900 p-4 space-y-4 hidden z-20" id="nav-menu">
            <button id="close-mobile-menu" class="flex items-center ml-auto" aria-label="Tutup Menu Navigasi">
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

        <div class="hidden flex gap-4">
            <livewire:base::input size="sm" color="custom" type="search" name="Pencarian Berita" id="top-search" placeholder="Pencarian" class="bg-neutral-800 border-neutral-800 focus:border-neutral-400" />

            <button class="">Berlangganan</button>
            <button>Masuk</button>
        </div>
    </livewire:base::container>
</nav>

<script>
    const appOverlay = document.querySelector('#app-overlay')
    const navMenu = document.querySelector('#nav-menu')

    document.querySelector('#open-mobile-menu')
        .addEventListener('click', () => {
            appOverlay.classList.remove('hidden')
            appOverlay.classList.add('animate-fade-in')

            navMenu.classList.remove('hidden')
            navMenu.classList.add('animate-slide-in')

            setTimeout(() => {
                appOverlay.classList.remove('animate-fade-in')
                navMenu.classList.remove('animate-slide-in')

                document.addEventListener('click', checkClickOutsideNavMenu)
            }, 1000);
        })

    document.querySelector('#close-mobile-menu')
        .addEventListener('click', () => {
            closeNavMenu()
        })

    function checkClickOutsideNavMenu(e) {
        if (!navMenu.contains(e.target)) {
            closeNavMenu()
        }
    }
    function closeNavMenu() {
        appOverlay.classList.add('animate-fade-out')
        navMenu.classList.add('animate-slide-out')

        setTimeout(() => {
            appOverlay.classList.add('hidden')
            navMenu.classList.add('hidden')
            appOverlay.classList.remove('animate-fade-out')
            navMenu.classList.remove('animate-slide-out')
        }, 1000);

        document.removeEventListener('click', checkClickOutsideNavMenu)
    }
</script>