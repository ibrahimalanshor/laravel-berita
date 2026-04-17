@extends('layouts.home')

@section('content')
<x-base.container class="py-6 grid gap-4 items-start md:grid-cols-3 md:py-8 lg:py-10">
    <aside class="border border-neutral-300 p-2 rounded-md flex flex-col space-y-1">
        @php
            $menus = [
                [
                    'name' => 'Profil',
                    'url' => route('profile.index'),
                    'icon' => 'tabler--user',
                    'route' => 'profile.index'
                ],
                [
                    'name' => 'Artikel Baca Nanti',
                    'url' => route('profile.bookmark'),
                    'icon' => 'tabler--bookmark',
                    'route' => 'profile.bookmark'
                ],
                [
                    'name' => 'Artikel Favorit',
                    'url' => route('profile.favourite'),
                    'icon' => 'tabler--heart',
                    'route' => 'profile.favourite'
                ],
                [
                    'name' => 'Langganan',
                    'url' => 'profile.subscribe',
                    'icon' => 'tabler--bell-ringing',
                    'route' => 'profile.subscribe'
                ],
                [
                    'name' => 'Keluar',
                    'url' => 'logout',
                    'icon' => 'tabler--logout',
                    'route' => null
                ]
            ]
        @endphp

        @foreach ($menus as $menu)
            <a href="{{ $menu['url'] }}" @class([
                'hover:bg-neutral-100 text-neutral-700 flex items-center gap-2 px-3 py-2 rounded-md',
                'bg-neutral-100 font-medium' => $current_route === $menu['route']
            ])>
                <span class="icon-[{{ $menu['icon'] }}] size-4"></span>
                {{ $menu['name'] }}
            </a>
        @endforeach
    </aside>

    <div class="md:col-span-2">
        @yield('profile-content')
    </div>
</x-base.container>
@endsection