<nav class="bg-neutral-900 h-14 text-white lg:h-15 sticky top-0 z-10">
    <x-base.container class="h-full flex items-center justify-between">
        <h1 class="sr-only">{{ $title ?? config('app.name') }}</h1>
        <button class="open-nav-menu flex items-center sm:hidden" aria-label="Buka Menu Navigasi" data-toggle="drawer" data-target="#nav-menu">
            <span class="icon-[tabler--menu-2] size-5"></span>
        </button>

        <div class="flex items-center gap-4">
            <button class="open-nav-menu hidden sm:flex sm:items-center lg:hidden" aria-label="Buka Menu Navigasi" data-toggle="dropdown" data-target="#nav-menu">
                <span class="icon-[tabler--menu-2] size-5"></span>
            </button>
            <a href="{{ route('home') }}">
                <x-includes.logo class="max-h-6" />
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

            <x-base.button icon="icon-[tabler--brand-google-filled]" tag-name="a" color="bordered" class="w-full sm:hidden" href="{{ route('login') }}">
                <p>Masuk</p>
            </x-base.button>

            <x-base.button icon="icon-[tabler--bell-ringing-filled]" tag-name="a" color="primary" class="w-full sm:hidden" href="{{ route('subscribe') }}">
                <p>Berlangganan</p>
            </x-base.button>

            <hr class="border-neutral-300 sm:hidden">

            <div class="flex flex-col gap-2 font-medium lg:flex-row lg:gap-6">
                @foreach ($menus as $menu)
                    <a href="{{ $menu->url }}" class="lg:hover:text-neutral-400">{{ $menu->name }}</a>
                @endforeach
            </div>

            <hr class="border-neutral-300 sm:hidden">

            <p class="text-sm text-neutral-700 sm:hidden">Dengan berlangganan ke {{ $title ?? config('app.name') }}, Anda akan mendapatkan notifikasi langsung ke email Anda ketika ada artikel baru dari kami.</p>
        </div>

        <div id="nav-action" class="absolute top-14 bg-neutral-900 left-0 p-4 w-full hidden sm:static sm:p-0 sm:bg-transparent sm:w-auto sm:flex sm:gap-2">
            <form action="{{ route('search') }}">
                <x-base.input
                    size="custom"
                    color="custom"
                    type="search"
                    name="q"
                    id="top-search" 
                    placeholder="Pencarian"
                    class="w-full bg-white text-neutral-900 border-neutral-900 h-10 px-3 rounded-lg focus:border-neutral-900 sm:h-9 sm:rounded-md sm:bg-neutral-800 sm:text-white sm:border-neutral-800 sm:focus:border-neutral-400"
                />
            </form>

            <x-base.button icon="icon-[tabler--bell-ringing-filled]" tag-name="a" color="primary" class="hidden sm:flex items-center" size="sm" :ignoreDisplay="true" href="{{ route('subscribe') }}">
                <p>Berlangganan</p>
            </x-base.button>

            <x-base.button icon="icon-[tabler--brand-google-filled]" tag-name="a" color="light" class="hidden sm:flex items-center" size="sm" :ignoreDisplay="true" href="{{ route('login') }}">
                <p>Masuk</p>
            </x-base.button>
        </div>
    </x-base.container>
</nav>

@if ($displayTag)
    <div class="border-b border-neutral-200">
        <x-base.container :paddless="true">
            <div class="flex gap-2 py-3 overflow-x-auto">
                <div class="w-2 shrink-0"></div>
                @foreach ($tags as $tag)
                    <x-tag.link :tag="$tag" />
                @endforeach
                <div class="w-2 shrink-0"></div>
            </div>
        </x-base.container>
    </div>
@endif