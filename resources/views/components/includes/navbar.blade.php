<nav class="bg-neutral-900 h-14 text-white lg:h-15 sticky top-0 z-10">
    <x-base.container class="h-full flex items-center justify-between">
        @if (request()->route()->named('home'))
            <h1 class="sr-only">{{ $title ?? config('app.name') }}</h1>
        @endif
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
            <div class="flex items-center @if (auth()->check()) justify-between @else justify-end @endif sm:hidden">
                @auth
                    @php
                        $user = auth()->user()
                    @endphp

                    <img src="{{ $user->avatar_url ?? asset('avatar.svg') }}" alt="{{ $user->name }}" class="size-7 rounded-full">
                @endauth
                <button class="flex items-center" aria-label="Tutup Menu Navigasi" data-toggle="drawer" data-target="#nav-menu">
                    <span class="icon-[tabler--x] size-5"></span>
                </button>
            </div>

            @guest
                <x-base.button icon="icon-[tabler--brand-google-filled]" tag-name="a" color="bordered" class="w-full sm:hidden" href="{{ route('auth.google') }}">
                    <p>Masuk</p>
                </x-base.button>
            @endguest

            <x-base.button icon="icon-[tabler--bell-ringing-filled]" tag-name="a" color="primary" class="w-full sm:hidden" href="{{ route('subscribe.index') }}">
                <p>Berlangganan</p>
            </x-base.button>

            @auth
                <hr class="border-neutral-300 sm:hidden">

                <div class="flex flex-col gap-2 font-medium sm:hidden">
                    @foreach ($userMenus as $menu => $url)
                        <a href="{{ $url }}" class="lg:hover:text-neutral-400">{{ $menu }}</a>
                    @endforeach
                </div>
            @endauth

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

            <x-base.button icon="icon-[tabler--bell-ringing-filled]" tag-name="a" color="primary" class="hidden sm:flex items-center" size="sm" :ignoreDisplay="true" href="{{ route('subscribe.index') }}">
                <p>Berlangganan</p>
            </x-base.button>

            @if (!auth()->check())
                <x-base.button icon="icon-[tabler--brand-google-filled]" tag-name="a" color="light" class="hidden sm:flex items-center" size="sm" :ignoreDisplay="true" href="{{ route('auth.google') }}">
                    <p>Masuk</p>
                </x-base.button>
            @else
                <div class="hidden sm:flex items-center relative">
                    <button class="open-user-navbar-dropdown flex items-center cursor-pointer" aria-label="Buka Profil" data-toggle="dropdown" data-target="#user-navbar-dropdown">
                        @php
                            $user = auth()->user()
                        @endphp

                        <img src="{{ $user->avatar_url ?? asset('avatar.svg') }}" alt="{{ $user->name }}" class="size-8 rounded-full">
                    </button>

                    <div
                        id="user-navbar-dropdown"
                        class="hidden absolute bg-white top-11 right-0 shadow rounded-md text-neutral-700 py-1 min-w-40"
                        data-click-outside-close="dropdown"
                        data-ignore=".open-user-navbar-dropdown"
                    >
                        @php
                            $menuIcon = [
                                'Profil' => 'icon-[tabler--user]',
                                'Baca Nanti' => 'icon-[tabler--bookmark]',
                                'Artikel Favorit' => 'icon-[tabler--heart]',
                                'Logout' => 'icon-[tabler--logout]'
                            ]
                        @endphp
                        @foreach ($userMenus as $menu => $url)
                            <a href="{{ $url }}" class="block px-2 py-1 whitespace-nowrap flex items-center gap-2 hover:bg-neutral-100 {{ $menu === 'Logout' ? 'border-t border-neutral-200' : '' }}">
                                <span class="{{ $menuIcon[$menu] }} size-4"></span>
                                {{ $menu }}
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
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