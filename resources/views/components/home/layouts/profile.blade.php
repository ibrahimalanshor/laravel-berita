@extends('home.layouts.home')

@section('content')
<x-home.base.container class="py-6 grid gap-4 items-start md:grid-cols-3 md:py-8 lg:grid-cols-7 lg:py-10">
    <aside class="border border-neutral-300 p-2 rounded-md flex flex-col space-y-1 lg:col-span-2">
        @php
            $menus = [
                [
                    'name' => 'Profil',
                    'url' => route('profile.index'),
                    'icon' => 'icon-[tabler--user]',
                    'route' => 'profile.index'
                ],
                [
                    'name' => 'Notifikasi',
                    'url' => route('profile.notification'),
                    'icon' => 'icon-[tabler--bell-ringing]',
                    'route' => 'profile.notification'
                ],
                [
                    'name' => 'Artikel Baca Nanti',
                    'url' => route('profile.bookmark'),
                    'icon' => 'icon-[tabler--bookmark]',
                    'route' => 'profile.bookmark'
                ],
                [
                    'name' => 'Artikel Favorit',
                    'url' => route('profile.favourite'),
                    'icon' => 'icon-[tabler--heart]',
                    'route' => 'profile.favourite'
                ],
                [
                    'name' => 'Langganan',
                    'url' => route('profile.subscription'),
                    'icon' => 'icon-[tabler--credit-card]',
                    'route' => 'profile.subscription'
                ],
                [
                    'name' => 'Keluar',
                    'url' => 'logout',
                    'icon' => 'icon-[tabler--logout]',
                    'route' => null
                ]
            ]
        @endphp

        @foreach ($menus as $menu)
            @if ($menu['name'] === 'Keluar')
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="hover:bg-neutral-100 text-neutral-700 flex items-center gap-2 px-3 py-2 rounded-md w-full cursor-pointer">
                        <span class="{{ $menu['icon'] }} size-4"></span>
                        {{ $menu['name'] }}
                    </button>
                </form>
            @else
                <a href="{{ $menu['url'] }}" @class([
                    'hover:bg-neutral-100 text-neutral-700 flex items-center gap-2 px-3 py-2 rounded-md',
                    'bg-neutral-100 font-medium' => $current_route === $menu['route']
                ])>
                    <span class="{{ $menu['icon'] }} size-4"></span>
                    {{ $menu['name'] }}
                </a>
            @endif
        @endforeach
    </aside>

    <div class="md:col-span-2 lg:col-span-5 space-y-4">
        @yield('profile-content')
    </div>
</x-base.container>
@endsection