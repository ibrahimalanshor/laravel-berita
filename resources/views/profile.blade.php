@extends('layouts.home')

@section('content')
<x-base.container class="py-6">
    <aside class="border border-neutral-300 p-2 rounded-md flex flex-col">
        <a href="" @class([
            'hover:bg-neutral-100 text-neutral-700 flex items-center gap-2 px-3 py-2 rounded-md',
            'bg-neutral-100 font-medium' => $current_route === 'profile'
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

    <section>
        <h1>Profil</h1>

        <div>
            <img src="{{ $user->avatar_url }}" alt="{{ $user->name }}">
            <div>
                <p>{{ $user->name }}</p>
                <p>{{ $user->email }}</p>
                <p>Bergabung pada {{ $user->created_at }}</p>
            </div>
        </div>
    </section>
</x-base.container>
@endsection