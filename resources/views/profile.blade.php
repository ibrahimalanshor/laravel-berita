@extends('layouts.home')

@section('content')
<x-base.container class="py-6 grid gap-4 items-start md:grid-cols-3 md:py-8 lg:py-10">
    <aside class="border border-neutral-300 p-2 rounded-md flex flex-col space-y-1">
        <a href="" @class([
            'hover:bg-neutral-100 text-neutral-700 flex items-center gap-2 px-3 py-2 rounded-md',
            'bg-neutral-100 font-medium' => $current_route === 'profile.index'
        ])>
            <span class="icon-[tabler--user] size-4"></span>
            Profil
        </a>
        <a href="" @class([
            'hover:bg-neutral-100 text-neutral-700 flex items-center gap-2 px-3 py-2 rounded-md',
            'bg-neutral-100 font-medium' => $current_route === 'bookmark'
        ])>
            <span class="icon-[tabler--bookmark] size-4"></span>
            Artikel Baca Nanti
        </a>
        <a href="" @class([
            'hover:bg-neutral-100 text-neutral-700 flex items-center gap-2 px-3 py-2 rounded-md',
            'bg-neutral-100 font-medium' => $current_route === 'favourite'
        ])>
            <span class="icon-[tabler--heart] size-4"></span>
            Artikel Favorit
        </a>
        <a href="" @class([
            'hover:bg-neutral-100 text-neutral-700 flex items-center gap-2 px-3 py-2 rounded-md',
            'bg-neutral-100 font-medium' => $current_route === 'subscribe'
        ])>
            <span class="icon-[tabler--bell-ringing] size-4"></span>
            Langganan
        </a>
        <a href="" @class([
            'hover:bg-neutral-100 text-neutral-700 flex items-center gap-2 px-3 py-2 rounded-md',
        ])>
            <span class="icon-[tabler--logout] size-4"></span>
            Keluar
        </a>
    </aside>

    <section class="border border-neutral-300 rounded-md p-4 space-y-4 md:col-span-2">
        <h1 class="font-bold text-neutral-900 text-lg">Profil</h1>
        <div class="flex items-center gap-3">
            <img src="{{ $user->avatar_url }}" alt="{{ $user->name }}" class="size-12 rounded-full shrink-0">
            <div>
                <p class="font-medium text-neutral-900">{{ $user->name }}</p>
                <p class="text-neutral-700">{{ $user->email }}</p>
            </div>
        </div>
        <p class="text-sm text-neutral-500">Bergabung pada {{ formatDate($user->created_at, 'd F Y') }}</p>
    </section>
</x-base.container>
@endsection